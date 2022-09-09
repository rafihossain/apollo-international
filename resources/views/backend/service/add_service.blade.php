@extends('backend.layouts.app')
@section('title', 'Add Service')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="addService" action="{{route('backend.save-service')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label>Service Title</label>
                <input type="text" class="form-control @error('service_title') is-invalid @enderror" name="service_title" 
                value="{{old('service_title')}}">
                @error('service_title')
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
                <label>Meta Keyword</label>
                <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" 
                value="{{old('meta_keyword')}}">
                @error('meta_keyword')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{{old('meta_description')}}</textarea>
                @error('meta_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
				<label>Service Category</label>
                
                <select name="service_category_id" class="form-control @error('service_category_id') is-invalid @enderror" id="">
                    @foreach($serviceCategories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>

                @error('service_category_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>Service Description</label>
                <div id="editor" style="height: 300px;"></div>
                <textarea name="service_description" style="display:none" id="hiddenArea"></textarea>

                @error('service_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Service Header Top Image</label>
                <input type="file" class="imageupload" name="service_header_image">
                @error('service_header_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Service Image</label>
                <input type="file" class="imageupload" name="service_image">
                @error('service_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="service_status">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Add Service </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#addService").on("submit", function() {
            $("#hiddenArea").val($(".ql-editor").html());
        })
    });

    $('.imageupload').dropify();
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