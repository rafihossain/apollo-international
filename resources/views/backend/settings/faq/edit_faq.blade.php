@extends('backend.layouts.app')
@section('title', 'Edit Faq')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="formFaq" action="{{route('backend.update-faq')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$faq->id}}">
            <div class="form-group mb-2">
                <label>Question</label>
                <input type="text" class="form-control @error('faq_question') is-invalid @enderror" name="faq_question" 
                value="{{ $faq->faq_question }}">
                @error('faq_question')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>Answare</label>
                <div id="editor" style="height: 300px;">{!! $faq->faq_answare !!}</div>
                <textarea name="faq_answare" style="display:none" id="hiddenArea"></textarea>

                @error('faq_answare')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Publish Country</label>
                <select class="form-control form-control @error('country') is-invalid @enderror" name="country">
                    <option value="">Select Country</option>
                    <option value="0" {{$faq->country == 0 ? 'selected' : ''}}>All</option>
                    <option value="1" {{$faq->country == 1 ? 'selected' : ''}}>Australia</option>
                    <option value="2" {{$faq->country == 2 ? 'selected' : ''}}>Bangladesh</option>
                    <option value="3" {{$faq->country == 3 ? 'selected' : ''}}>Nepal</option>
                    <option value="4" {{$faq->country == 4 ? 'selected' : ''}}>Malaysia</option>
                    <option value="5" {{$faq->country == 5 ? 'selected' : ''}}>India</option>
                    <option value="6" {{$faq->country == 6 ? 'selected' : ''}}>SriLanka</option>
                    <option value="7" {{$faq->country == 7 ? 'selected' : ''}}>Pakistan</option>
                    <option value="8" {{$faq->country == 8 ? 'selected' : ''}}>China</option>
                </select>
                @error('country')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Update Faq </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#formFaq").on("submit", function() {
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