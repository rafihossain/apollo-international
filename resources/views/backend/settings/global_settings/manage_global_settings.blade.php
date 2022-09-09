@extends('backend.layouts.app')
@section('title', 'Global Settings')
@section('content') 

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form method="post" action="{{route('backend.global_settings_update')}}" enctype="multipart/form-data">
    @csrf
	<div class="card">
		<div class="card-body">
		    <div class="form-group mb-2">
                <label>Publish Country</label>
                <select class="form-control" name="country" id="changeCountry">
                    <option value="">Select Country</option>
                    <option value="1" {{ $country == 1 ? 'selected' : '' }}>Australia</option>
                    <option value="2" {{ $country == 2 ? 'selected' : '' }}>Bangladesh</option>
                    <option value="3">Nepal</option>
                    <option value="4">Malaysia</option>
                    <option value="5">India</option>
                    <option value="6">SriLanka</option>
                    <option value="7">Pakistan</option>
                    <option value="8">China</option>
                </select>
                @error('country')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			 <div class="form-group mb-2">
                <label>Header Logo</label>
				<input type="file" class="imageupload" name="header_logo" data-default-file="{{ asset('admin/image/global_settings')}}/{{$global_settings[0]->settings_value}}">
                <input type="hidden" value="{{$global_settings[0]->settings_value}}" name="old_header_logo">
                @error('header_logo')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>Footer Logo</label>
				<input type="file" class="imageupload" name="footer_logo" data-default-file="{{ asset('admin/image/global_settings')}}/{{$global_settings[1]->settings_value}}">
                <input type="hidden" value="{{$global_settings[1]->settings_value}}" name="old_footer_logo">
                @error('footer_logo')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>Footer About us</label>
				<textarea name="footer_about_us" id="" cols="30" rows="5" class="form-control">{{$global_settings[2]->settings_value}}</textarea>
                @error('footer_about_us')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>

            <div class="form-group mb-2">
                <label>Footer our service</label>
				<textarea name="footer_our_service" id="editor1" cols="30" rows="5" class="form-control">{{$global_settings[3]->settings_value}}</textarea>
                @error('footer_our_service')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>

            <div class="form-group mb-2">
                <label>Footer Quick Links</label>
				<textarea name="footer_quick_links" id="editor2" cols="30" rows="5" class="form-control">{{$global_settings[4]->settings_value}}</textarea>
                @error('footer_quick_links')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>

		</div>
	</div>
 
	<div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Global Settings </button>
    </div>
</form> 

<script>
    $('#changeCountry').on("change", function() {
        var country = $(this).val();
        window.location.href = "{{ route('backend.global_settings') }}"+"/"+country;
    });
    
      ClassicEditor.create(document.querySelector('#editor1'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(error => {
            console.error(error);
        });
        ClassicEditor.create(document.querySelector('#editor2'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(error => {
            console.error(error);
        });
        ClassicEditor.create(document.querySelector('#editor3'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection