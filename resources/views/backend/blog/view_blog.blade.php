@extends('backend.layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
        <div class="form-group mb-2">
            <label>Blog Title :</label>
            {{$blog->blog_title}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Title :</label>
            {{$blog->meta_title}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Keywords :</label>
            {{$blog->meta_keywords}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Description :</label>
            {{$blog->meta_description}}
        </div>
        <div class="form-group mb-2">
            <label>Blog Category :</label>
            {{$blog->category->category_name}}
        </div>
        <div class="form-group mb-2">
            <label>Blog Image :</label>
            <div class="mt-2">
                <img src="{{asset($blog->blog_image)}}" height="80" alt="blog-image">
            </div>
        </div>
        <div class="form-group mb-2">
            <label>Blog Description :</label>
            {!!$blog->blog_description!!}
        </div>
	</div>
</div>
@endsection