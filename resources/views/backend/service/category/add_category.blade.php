@extends('backend.layouts.app')
@section('title', 'Add Service Category')
@section('content')
<div class="card">
	<div class="card-body">
		<form id="addCategory" action="{{route('backend.save-service-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group mb-2">
				<label>Category Name</label>
				<input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name"
				value="{{old('category_name')}}">
                @error('category_name')
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
				<label>Category Description</label>
				<div id="editor" style="height: 300px;"></div>
                <textarea name="category_description" style="display:none" id="hiddenArea"></textarea>

                @error('category_description')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
             <div class="form-group mb-2">
                <label>Category Header Top Image</label>
                <input type="file" class="imageupload" name="category_header_image">
                @error('category_header_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Category </button>
		    </div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
        $("#addCategory").on("submit", function() {
            $("#hiddenArea").val($(".ql-editor").html());
        })
    });

	var quill = new Quill("#editor", {
        theme: "snow",
        modules: {
            toolbar: [
                [{
                    font: []
                }, {
                    size: []
                }],
                ["bold", "italic", "underline", "strike"],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    script: "super"
                }, {
                    script: "sub"
                }],
                [{
                    header: [!1, 1, 2, 3, 4, 5, 6]
                }, "blockquote", "code-block"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }, {
                    indent: "-1"
                }, {
                    indent: "+1"
                }],
                ["direction", {
                    align: []
                }],
                ["link", "image", "video"],
                ["clean"]
            ]
        }
    })
</script>

@endsection