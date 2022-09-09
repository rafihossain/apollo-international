@extends('backend.layouts.app')
@section('title', 'Edit Service')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="editService" action="{{route('backend.update-service')}}" method="POST" enctype="multipart/form-data">
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
                 
                <textarea name="service_description" id="summernote_editor" >{!!$service->service_description!!}</textarea>

                @error('service_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="form-group mb-2">
                <label>Service Header Top Image</label>
                <input type="file" class="imageupload" name="service_header_image" data-default-file="{{asset($service->service_header_image)}}">
    
                @error('service_header_image')
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
   

    $('.imageupload').dropify();
    $('#summernote_editor').summernote( );
</script>
@endsection