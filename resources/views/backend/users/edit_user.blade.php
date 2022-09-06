@extends('backend.layouts.app')
@section('title', 'Edit User')
@section('content')

<div class="card">
	<div class="card-body">
    <form method="post" action="{{route('backend.updateuser')}}" id="createuser" enctype="multipart/form-data"> 
           @csrf 
           <input type="hidden" name="user_id" id="" value="{{$user['id']}}">
			<div class="form-group mb-2">
				<label>User Name </label>
				<input type="text" class="form-control" name="user_name" value="{{$user['name']}}">
                @error('user_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>User email</label>
				<input type="email" class="form-control" name="user_email" value="{{$user['email']}}">
                @error('user_email')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>User phone</label>
				<input type="tel" class="form-control" name="user_phone" value="{{$user['mobile']}}">
                @error('user_phone')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
                <label>User role</label>
                <select class="form-control" name="user_role">
                	<option value="">Select role</option>
                	<option value="2" @if($user['status'] == '2') selected @endif>Admin</option>
                	<option value="3" @if($user['status'] == '3') selected @endif>Editor</option>
                	<option value="4" @if($user['status'] == '4') selected @endif>SEO</option>
                </select>
                @error('user_role')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
				<label>Profile Image</label>
				<input type="file" class="imageupload" name="profile_image" data-default-file="{{ asset('admin/image/user/thumbnail')}}/{{$user['profile_image']}}">
                @error('profile_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
 			<div class="form-group mb-2">
				<label>Password</label>
				<input type="password" class="form-control" name="password" value="">
			</div>
            <div class="form-group mb-2">
				<label>Retype Password</label>
				<input type="password" class="form-control" name="re_password">
                @if(session()->has('do_not_match'))
                    <strong class="text-danger">
                        {{session()->get('do_not_match')}}
                    </strong>
                @endif
			</div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add User </button>
		    </div>
		</form>
	</div>
</div> 


@endsection