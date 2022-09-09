@extends('backend.layouts.app')
@section('title', 'Edit Studyabroad')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('backend.update-studyabroad')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$studyabroad->id}}">
            <div class="form-group mb-2">
                <label>Country Name</label>
                <input type="text" class="form-control @error('country_name') is-invalid @enderror" name="country_name" 
                value="{{$studyabroad->country_name}}">
                @error('country_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Subtitle</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" 
                value="{{$studyabroad->subtitle}}">
                @error('subtitle')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
                value="{{$studyabroad->title}}">
                @error('title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Slug</label>
                <input type="text" class="form-control @error('studyabroad_slug') is-invalid @enderror" name="studyabroad_slug" 
                value="{{$studyabroad->studyabroad_slug}}">
                @error('studyabroad_slug')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Title</label>
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" 
                value="{{$studyabroad->meta_title}}">
                @error('meta_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Keyword</label>
                <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" 
                value="{{$studyabroad->meta_keyword}}">
                @error('meta_keyword')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{{$studyabroad->meta_description}}</textarea>
                @error('meta_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Studyabroad Description</label>
                <textarea id="summernote" class="form-control" name="studyabroad_description">{!!$studyabroad->studyabroad_description!!}</textarea>

                @error('studyabroad_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Studyabroad Image</label>
                <input type="file" class="imageupload @error('studyabroad_image') is-invalid @enderror" name="studyabroad_image" data-default-file="{{asset($studyabroad->studyabroad_image)}}">

                @error('studyabroad_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>Header Image</label>
                <input type="file" class="imageupload" name="header_image" data-default-file="{{asset($studyabroad->header_image)}}">
                @error('header_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Related Partner</label>
                <select class="form-control @error('related_partner') is-invalid @enderror" name="related_partner" id="">
                    <option value="">Select Category</option>
                    <option value="australia" 
                    {{ ($studyabroad->related_partner == 'australia' ? 'selected' : '')}}>Australia</option>
                    
                    <option value="canada" 
                    {{ ($studyabroad->related_partner == 'canada' ? 'selected' : '')}}>Canada</option>
                    <option value="canadastudy" 
                    {{ ($studyabroad->related_partner == 'canadastudy' ? 'selected' : '')}}>Canada Study</option>
                    
                    <option value="malaysia" 
                    {{ ($studyabroad->related_partner == 'malaysia' ? 'selected' : '')}}>Malaysia</option>
                    <option value="uk" 
                    {{ ($studyabroad->related_partner == 'uk' ? 'selected' : '')}}>UK</option>
                    <option value="usa" 
                    {{ ($studyabroad->related_partner == 'usa' ? 'selected' : '')}}>USA</option>
                    
                    <option value="partner" 
                    {{ ($studyabroad->related_partner == 'partner' ? 'selected' : '')}}>Professional Year Partners</option>
                    <option value="health" 
                    {{ ($studyabroad->related_partner == 'health' ? 'selected' : '')}}>Health Insurance</option>
                    <option value="accreditation" 
                    {{ ($studyabroad->related_partner == 'accreditation' ? 'selected' : '')}}>Professional Accreditation</option>
                    <option value="scholarship" 
                    {{ ($studyabroad->related_partner == 'scholarship' ? 'selected' : '')}}>Current Scholarships</option>
                </select>
                @error('related_partner')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-check form-switch mb-2">
                <input type="hidden" name="studyabroad_status" value="0">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="studyabroad_status" value="1" 
                {{ $studyabroad->studyabroad_status == 1 ? 'checked' : '' }}
                >
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Update StudyaBroad </button>
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