@extends('backend.layouts.app')
@section('title', 'Add Team')
@section('content')

<div class="card">
	<div class="card-body">
      <form method="post" id="addteam" action="{{route('backend.save_our_team')}}" enctype="multipart/form-data"> 
            @csrf
			<div class="form-group mb-2">
				<label>Member Name</label>
				<input type="text" class="form-control" name="member_name">
                @error('member_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>Member Position</label>
				<input type="text" class="form-control" name="member_position">
                @error('member_position')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			 
			<div class="form-group mb-2">
				<label>Member Image</label>
				<input type="file" class="imageupload" name="member_image">
                @error('member_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			
			<div class="form-group mb-2">
				<label>Social Link</label>
				<div class="input-group mb-2">
                    <div class="input-group-text">Facebook</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook" name="facebook">
                </div>
                @error('facebook')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Twitter</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Twitter" name="twitter">
                </div>
                @error('twitter')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Pinterest</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pinterest" name="pinterest">
                </div>
                @error('pinterest')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Instagram</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram" name="instagram">
                </div>
                @error('instagram')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Linkedin</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Linkedin" name="linkedin">
                </div>
                @error('linkedin')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Youtube</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Youtube" name="youtube">
                </div>
                @error('youtube')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>

			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="status">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Member </button>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>

@endsection