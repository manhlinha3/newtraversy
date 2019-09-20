<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use Cocur\Slugify\Slugify;
use App\Http\Requests\CreatePostRequest;
// use Illuminate\View\Middleware\ShareErrorsFromSession;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all(); // using Eloquent laravel
        // $posts = DB::sellect('SELLECT * FROM post'); // using DB to sellect data from database 'post'
        // $posts = Post::orderBy('created_at', 'desc')->take(1)->get(); // sellect 1 ver from database
        // $posts = Post::orderBy('created_at', 'desc')->get(); // using eloquent
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); // paginate with 10 posts in a page
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required',
        //     'cover_image' => 'image|nullable|max:1999'
        // ]);
            $request->validated();
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get only file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
        else {
            $filenameToStore = 'noimage.jpg';
        }

        // return 123;
        // Create post

        // generate url from post title
        $slugify = new Slugify();
        $slug = $slugify->slugify($request->input('title'));

        $post = new Post;
        // $url = $slug.$post->id;
        // var_dump($url);
        // die();
        $post->title = $request->input('title');
        $post->url = $slug;
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        $post->url = $slug.'-'.$post->id;
        $post->save();

        // Redirect
        return redirect('/posts')->with('success', 'Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        // $post = Post::find($id);
        $post = Post::where('url', $url)->first();
        return view('posts.show')->with('post', $post);
        // var_dump($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // check user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|max:400',
            'body' => 'required'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get only file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }
    
        // return 123;
        // Create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        // Redirect
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // check user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Removed');
    }
}
