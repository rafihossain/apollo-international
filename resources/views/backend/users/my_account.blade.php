@extends('backend.layouts.app')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
<!-- @if(session()->has('do_not_match'))
<div class="alert alert-danger">
	{{ session()->get('do_not_match') }}
</div>
@endif -->
<div class="card">
	<div class="card-body">
    <form method="post" action="{{route('backend.update_my_account')}}" enctype="multipart/form-data"> 
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
				<label>Profile Image</label>
				<input type="file" class="imageupload" name="profile_image" data-default-file="{{ asset('admin/image/user/thumbnail')}}/{{$user['profile_image']}}">
                @error('profile_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
            <div class="form-group mb-2">
				<label>Old Password</label>
				<input type="password" class="form-control" name="old_password" value="" id="old_password">
				<span class="text-danger old_password" id=""></span>
				@if(session()->has('do_not_match'))
                    <strong class="text-danger">
                        {{session()->get('do_not_match')}}
                    </strong>
                @endif
			</div>
 			<div class="form-group mb-2">
				<label>Current Password</label>
				<input type="password" class="form-control" name="current_password" value="" id="current_password">
				<span class="text-danger current_password"></span>
			</div>
            <div class="form-group mb-2">
				<label>Retype Password</label>
				<input type="password" class="form-control" name="re_password" id="re_password">
				<span class="text-danger re_password" id=""></span>
         
			</div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit" id="update_user"> Update User </button>
		    </div>
		</form>
	</div>
</div> 

<script>
	//alert('hiii');
$( document ).ready(function() {

	$('#update_user').click(function(e){	

		var current_password=$('#current_password').val();
	    var re_password=$('#re_password').val();
		var old_password=$('#old_password').val();

		if((current_password != '') || (re_password != '') || (old_password != ''))
		{
			if(current_password == '')
			{
				$('.re_password').html('');
				$('.old_password').html('');
				$('.current_password').html('The field is required');
				return false;		
			}
			if(re_password == '')
			{
				$('.old_password').html('');
				$('.current_password').html('');
				$('.re_password').html('The field is required');
				return false;		
			}
			if(old_password == '')
			{
				$('.current_password').html('');
				$('.re_password').html('');
				$('.old_password').html('The filed is required');
				return false;	
			}

			if(current_password != re_password)
			{
				$('.re_password').html('password did not match');
				return false;		
			}
			
		}
	});
	
});	
</script>

@endsection