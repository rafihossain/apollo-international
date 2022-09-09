@extends('backend.layouts.app')
@section('title', 'Google Ads Settings')
@section('content') 

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form method="post" action="{{route('backend.google_ads_update')}}">
    @csrf
	<div class="card">
		<div class="card-body">
			<div class="form-group mb-2">
				<label>Google Ads Script</label>
				<textarea class="form-control"  name="google_analytics">{{$google_analytic[0]->settings_value}}</textarea>
                @error('google_analytics')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="facebookscript" name="google_analytics_publish" value="yes"  @if($google_analytic[1]->settings_value == 'yes')checked @endif>
                <label class="form-check-label" for="facebookscript">Publish</label>
              
            </div>
            @error('google_analytics_publish')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
		</div>
	</div>
 
	<div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Google Analytics </button>
    </div>
</form> 

@endsection