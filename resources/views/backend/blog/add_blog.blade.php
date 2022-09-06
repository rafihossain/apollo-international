@extends('backend.layouts.app')
@section('title', 'Add Blog')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="formBlog" action="{{route('backend.save-blog')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label>Blog Title</label>
                <input type="text" class="form-control @error('blog_title') is-invalid @enderror" name="blog_title"
                value="{{old('blog_title')}}">
                @error('blog_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Title</label>
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title"
                value="{{old('meta_title')}}">
                @error('meta_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Keywords</label>
                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                value="{{old('meta_keywords')}}">
                @error('meta_keywords')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                value="{{old('meta_description')}}">
                @error('meta_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Related Post</label>
                <select name="related_post[]" class="form-control @error('related_post') is-invalid @enderror select2-multiple"
                id="relatedPost" data-width="100%" multiple="multiple" data-placeholder="Choose ...">
                    @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}">{{ $blog->blog_title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label>Blog Category</label>

                <select name="blog_category_id" class="form-control @error('blog_category') is-invalid @enderror" id="">
                    @foreach($blogCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>

                @error('blog_category')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Blog Description</label>
                <textarea id="editor" class="form-control" name="blog_description"></textarea>

                @error('blog_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Blog Image</label>
                <input type="file" class="imageupload @error('blog_image') is-invalid @enderror" name="blog_image">
                @error('blog_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="blog_status" value="1">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Add Blog </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            editor.ui.view.editable.element.style.height = '300px';
        } )
        .catch( error => {
            console.error( error );
        } );

    $('.imageupload').dropify();
    
    $('#relatedPost').select2({
        maximumSelectionLength: 3
    });
    
</script>
@endsection