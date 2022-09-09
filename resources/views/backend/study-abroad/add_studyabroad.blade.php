@extends('backend.layouts.app')
@section('title', 'Add Studyabroad')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="addService" action="{{route('backend.save-studyabroad')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label>Country Name</label>
                <input type="text" class="form-control @error('country_name') is-invalid @enderror" name="country_name" 
                value="{{old('country_name')}}">
                @error('country_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Subtitle</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" 
                value="{{old('subtitle')}}">
                @error('subtitle')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
                value="{{old('title')}}">
                @error('title')
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
                <label>Studyabroad Description</label>
                <textarea id="summernote" class="form-control" name="studyabroad_description"></textarea>

                @error('studyabroad_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Studyabroad Image</label>
                <input type="file" class="imageupload" name="studyabroad_image">
                @error('studyabroad_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>Header Image</label>
                <input type="file" class="imageupload" name="header_image">
                @error('header_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Related Partner</label>
                <select class="form-control @error('related_partner') is-invalid @enderror" name="related_partner" id="">
                    <option value="">Select Category</option>
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="canadastudy">Canada Study</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="uk">UK</option>
                    <option value="usa">USA</option>
                    <option value="partner">Professional Year Partners</option>
                    <option value="health">Health Insurance</option>
                    <option value="accreditation">Professional Accreditation</option>
                    <option value="scholarship">Current Scholarships</option>
                </select>
                @error('related_partner')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="studyabroad_status" value="1">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Add StudyaBroad </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
 $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 220,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            editor.ui.view.editable.element.style.height = '300px';
        } )
        .catch( error => {
            console.error( error );
        } );

    $('.imageupload').dropify();

</script>
@endsection