@extends('backend.layouts.app')
@section('title', 'List Social')
@section('content') 
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form method="post" action="{{route('backend.social_setting_update')}}">
	@csrf
	<div class="card">
		<div class="card-body">
			<div class="form-group mb-2">
				<label>Facebook Script</label>
				<textarea class="form-control" name="facebook_script">{{$social_settings[0]->settings_value}}</textarea>
			</div>
			<div class="form-check form-switch mb-2">
			  
                <input type="checkbox" class="form-check-input" id="facebookscript" name="facebook_published" value="yes" @if($social_settings[1]->settings_value == 'yes')checked @endif>
                <label class="form-check-label" for="facebookscript">Publish</label>
            </div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="form-group mb-2">
				<label>Whatsapp Script</label>
				<textarea class="form-control" name="whatsapp_script">{{$social_settings[2]->settings_value}}</textarea>
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="whatsappscript" name="whatsapp_published" value="yes" @if($social_settings[3]->settings_value == 'yes')checked @endif>
                <label class="form-check-label" for="whatsappscript">Publish</label>
            </div>
		</div>
	</div>
	<div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Social </button>
    </div>
</form> 


@endsection