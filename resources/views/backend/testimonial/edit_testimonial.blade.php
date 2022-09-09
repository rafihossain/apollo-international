@extends('backend.layouts.app')
@section('title', 'Edit Testimonial')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="editTestimonial" action="{{route('backend.update-testimonial')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$testimonial->id}}">

            <div class="form-group mb-2">
                <label>User Name</label>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                value="{{$testimonial->user_name}}">
                @error('user_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>User Comments</label>
                <div id="editor" style="height: 300px;">{!! $testimonial->user_comment !!}</div>
                <textarea name="user_comment" style="display:none" id="hiddenArea"></textarea>

                @error('user_comment')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>User Image</label>
                <input type="file" class="imageupload" name="user_image" data-default-file="{{asset($testimonial->user_image)}}">

                @error('user_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <!--   <div class="form-group mb-2">-->
            <!--    <label>User Video</label>-->
            <!--    <input type="file" class="imageupload" name="user_video" data-default-file="{{ asset('admin/image/testimonial')}}/{{$testimonial->testimonial_video}}">-->

            <!--    @error('user_video')-->
            <!--    <strong class="text-danger">{{ $message }}</strong>-->
            <!--    @enderror-->
            <!--</div>-->
            <div class="form-group mb-2">
                <label>User Video Url</label>
                <input type="text" class="form-control" name="user_video_url" value="{{$testimonial->user_video_url}}">
                @error('user_video_url')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>User rating</label>
                <input type="number" min="0" max="5" class="form-control @error('user_rating') is-invalid @enderror" name="user_rating"
                value="{{$testimonial->user_rating}}">
                @error('user_rating')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="user_status"
                {{ $testimonial->user_status == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Update Testimonial </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $("#editTestimonial").on("submit", function() {
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