@extends('backend.layouts.app')
@section('title', 'Add Contact')
@section('content') 

<form method="post" id="addContact" action="{{route('backend.contact_save')}}" enctype="multipart/form-data">
	@csrf 
 	<div class="contactlist">	
				<div class="card">
					<div class="card-body"> 
						<div class="form-group mb-2">
							<label>Country</label>
							<input type="text" class="form-control" name="country" value="{{old('country')}}">
							@error('country')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Office</label>
							<input type="text" class="form-control" name="office" value="{{old('office')}}">
							@error('office')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Address</label>
							<textarea class="form-control" name="address" value="">{{old('address')}}</textarea>
							@error('address')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Phone</label>
							<input type="tel" class="form-control" name="phone" value="{{old('phone')}}">
							@error('phone')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Mobile</label>
							<input type="tel" class="form-control" name="mobile" value="{{old('mobile')}}">
							@error('mobile')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="{{old('email')}}">
							@error('email')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Latitude </label>
							<input type="text" class="form-control" name="latitude" value="{{old('latitude ')}}">
							@error('latitude')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Longitude</label>
							<input type="text" class="form-control" name="longitude" value="{{old('longitude')}}">
							@error('longitude')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Social Link</label>
							<div class="input-group mb-2">
								<div class="input-group-text">Facebook</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook" name="facebook" value="{{old('facebook')}}">
							</div>
							@error('facebook')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Twitter</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Twitter" name="twitter" value="{{old('twitter')}}">
							</div>
							@error('twitter')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Pinterest</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pinterest" name="pinterest" value="{{old('pinterest')}}">
							</div>
							@error('pinterest')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Instagram</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram" name="instagram" value="{{old('instagram')}}">
							</div>
							@error('instagram')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Linkedin</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Linkedin" name="linkedin" value="{{old('linkedin')}}">
							</div>
							@error('linkedin')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Youtube</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="youtube" name="youtube" value="{{old('youtube')}}">
							</div>
							@error('youtube')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Location Image</label>
							<input type="file" class="imageupload" name="location_image">
							@error('location_image')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>

					</div>
				</div>
		
		
 	</div>
 	<div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Page </button>
    </div>
 	
 	
 </form>
 
<script type="text/javascript">
	$('.imageupload').dropify();
</script>

@endsection