@extends('backend.layouts.app')
@section('title', 'Facebook Pixel Settings')
@section('content') 

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form method="post" action="{{route('backend.facebook_pixel_update')}}">
    @csrf
	<div class="card">
		<div class="card-body">
			<div class="form-group mb-2">
				<label>Facebook Pixel Script</label>
				<textarea class="form-control"  name="facebook_pixels">{{$facebook_pixel[0]->settings_value}}</textarea>
                @error('facebook_pixels')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="facebookscript" name="facebook_pixel_publish" value="yes"  @if($facebook_pixel[1]->settings_value == 'yes')checked @endif>
                <label class="form-check-label" for="facebookscript">Publish</label>
              
            </div>
            @error('facebook_pixel_publish')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
		</div>
	</div>
 
	<div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Google Analytics </button>
    </div>
</form> 

@endsection