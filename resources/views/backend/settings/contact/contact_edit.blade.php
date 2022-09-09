@extends('backend.layouts.app')
@section('title', 'Edit Contact')
@section('content') 

<form method="post" id="editContact" action="{{route('backend.contact_update')}}" enctype="multipart/form-data">
	@csrf 
	<input type="hidden" name="contact_id" value="{{$contact['id']}}">
 	<div class="contactlist">	
				<div class="card">
					<div class="card-body"> 
						<div class="form-group mb-2">
							<label>Country</label>
							<input type="text" class="form-control" name="country" value="{{$contact['country']}}">
							@error('country')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Office</label>
							<input type="text" class="form-control" name="office" value="{{$contact['office']}}">
							@error('office')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Address</label>
							<textarea class="form-control" name="address">{{$contact['address']}}</textarea>
							@error('address')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Phone</label>
							<input type="tel" class="form-control" name="phone"  value="{{$contact['phone']}}">
							@error('phone')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
							<div class="form-group mb-2">
							<label>Mobile</label>
							<input type="tel" class="form-control" name="mobile" value="{{$contact['mobile']}}">
							@error('mobile')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="{{$contact['email']}}">
							@error('email')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<?php $location=explode(',',$contact['lat_lang']);?>
						<div class="form-group mb-2">
							<label>Latitude </label>
							<input type="text" class="form-control" name="latitude" value="{{$location[0]}}">
							@error('latitude')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Longitude</label>
							<input type="text" class="form-control" name="longitude" value="{{$location[1]}}">
							@error('longitude')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Social Link</label>
							<div class="input-group mb-2">
								<div class="input-group-text">Facebook</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook" name="facebook" value="{{$contact['facebook']}}">
							</div>
							@error('facebook')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Twitter</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Twitter" name="twitter" value="{{$contact['twitter']}}">
							</div>
							@error('twitter')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Pinterest</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pinterest" name="pinterest" value="{{$contact['pinterest']}}">
							</div>
							@error('pinterest')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Instagram</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram" value="{{$contact['instagram']}}" name="instagram">
							</div>
							@error('instagram')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Linkedin</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Linkedin" value="{{$contact['linkedin']}}" name="linkedin">
							</div>
							@error('linkedin')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
							<div class="input-group mb-2">
								<div class="input-group-text">Youtube</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="youtube" name="youtube" value="{{$contact['youtube']}}">
							</div>
							@error('youtube')
							<strong class="text-danger">{{ $message }}</strong>
							@enderror
						</div>
						<div class="form-group mb-2">
							<label>Location Image</label>
							<input type="file" class="imageupload" name="location_image" data-default-file="{{asset('admin/image/contact/thumbnail')}}/{{$contact['location_image']}}">
							<input type="hidden" name="old_image[]" value="{{$contact['location_image']}}">
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