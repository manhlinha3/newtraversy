<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;

class SlugController extends Controller
{
    public function index()
    {
        $slugify = new Slugify();
        // echo $slugify->slugify('Hello World!');
        $titleString = 'Đây là 1 cái title bằng tiếng việt';
        // dd($slugify->slugify($titleString));
        $url = $slugify->slugify($titleString);
        // var_dump($url);
        $urlComplete = $url.'-01';
        var_dump($urlComplete);
        // echo $slugify->slugify($titleString);
        // $slugify->slugify($titleString);
        // $url = (string)$slugify;
        // echo $slugify;
        // dd($slugify);
    }
}
