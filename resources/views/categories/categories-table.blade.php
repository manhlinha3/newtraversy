@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <table id="tree-table" class="table table-hover table-bordered">
                    <tbody>
                    <th>Categories </th>
                            @foreach($parentCategories as $category)
                                <tr data-id="{{$category->id}}" data-parent="0" data-level="1">
                                    <td data-column="name">{{$category->name}}</td>
                                </tr>
                                @if(count($category->subcategory))
                                    {{-- <span>-</span> --}}
                                    @include('categories.subCategoryView',['subcategories' => $category->subcategory, 'dataParent' => $category->id , 'dataLevel' => 1])
                                @endif      
				            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <h1>Hello Category</h1> --}}
@endsection