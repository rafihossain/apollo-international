@extends('backend.layouts.app')
@section('title', 'Add User')
@section('content') 

<div class="card">
	<div class="card-body">
    <form method="post" action="{{route('backend.saveuser')}}" id="createuser" enctype="multipart/form-data"> 
           @csrf 
			<div class="form-group mb-2">
				<label>User Name </label>
				<input type="text" class="form-control" name="user_name" value="{{old('user_name')}}">
                @error('user_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>User email</label>
				<input type="email" class="form-control" name="email" value="{{old('email')}}">
                @error('email')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>User phone</label>
				<input type="tel" class="form-control" name="user_phone" value="{{old('user_phone')}}">
                @error('user_phone')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>User role</label>
                <select class="form-control" name="user_role">
                	<option value="">Select role</option>
                	<option value="2">Admin</option>
                	<option value="3">Editor</option>
                	<option value="4">SEO</option>
                </select>
                @error('user_role')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

			<div class="form-group mb-2">
				<label>Profile Image</label>
				<input type="file" class="imageupload" name="profile_image">
                @error('profile_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
 			<div class="form-group mb-2">
				<label>User Password</label>
				<input type="password" class="form-control" name="user_password" value="{{old('user_password')}}">
                @error('user_password')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add User </button>
		    </div>
		</form>
	</div>
</div> 
<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>
@endsection