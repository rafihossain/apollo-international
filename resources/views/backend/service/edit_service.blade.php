@extends('backend.layouts.app')
@section('title', 'Edit Service')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="formService" action="{{route('backend.update-service')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$service->id}}">

            <div class="form-group mb-2">
                <label>Service Title</label>
                <input type="text" class="form-control @error('service_title') is-invalid @enderror" name="service_title" 
                value="{{$service->service_title}}">
                @error('service_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
				<label>Slug Url</label>
				<input type="text" class="form-control @error('service_slug') is-invalid @enderror" name="service_slug"
                value="{{$service->service_slug}}">
                @error('service_slug')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>Meta Title</label>
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" 
                value="{{$service->meta_title}}">
                @error('meta_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Keyword</label>
                <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" 
                value="{{$service->meta_keyword}}">
                @error('meta_keyword')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{{$service->meta_description}}</textarea>
                @error('meta_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
				<label>Service Category</label>
                
                <select name="service_category_id" class="form-control @error('service_category_id') is-invalid @enderror" id="">
                    @foreach($serviceCategories as $category)
                        <option value="{{ $category->id }}" 
                        {{ $category->category_name == $service->category->category_name ? 'selected' : '' }} >
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
                <div id="editor" style="height: 300px;">{!!$service->service_description!!}</div>
                <textarea name="service_description" style="display:none" id="hiddenArea"></textarea>

                @error('service_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Service Image</label>
                <input type="file" class="imageupload" name="service_image" data-default-file="{{asset($service->service_image)}}">

                @error('service_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="service_status"
                {{ $service->service_status == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Update Service </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#formService").on("submit", function() {
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