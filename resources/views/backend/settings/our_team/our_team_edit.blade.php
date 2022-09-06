@extends('backend.layouts.app')
@section('title', 'Edit Team')
@section('content')

<div class="card">
	<div class="card-body">
      <form method="post" id="addteam" action="{{route('backend.update_our_team')}}" enctype="multipart/form-data"> 
            @csrf
            <input type="hidden" name="team_id" id="" value="{{$team['id']}}">
            <input type="hidden" name="old_image" id="" value="{{$team['member_image']}}">
			<div class="form-group mb-2">
				<label>Member Name</label>
				<input type="text" class="form-control" name="member_name" value="{{$team['member_name']}}">
                @error('member_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-group mb-2">
				<label>Member Position</label>
				<input type="text" class="form-control" name="member_position" value="{{$team['member_position']}}">
                @error('member_position')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			 
			<div class="form-group mb-2">
				<label>Member Image</label>
				<input type="file" class="imageupload" name="member_image" data-default-file="{{ asset('admin/image/team/thumbnail')}}/{{$team['member_image']}}">
                @error('member_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			
			<div class="form-group mb-2">
				<label>Social Link</label>
				<div class="input-group mb-2">
                    <div class="input-group-text">Facebook</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook" name="facebook" value="{{$team['facebook']}}">
                </div>
                @error('facebook')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Twitter</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Twitter" name="twitter" value="{{$team['twitter']}}">
                </div>
                @error('twitter')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Pinterest</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pinterest" name="pinterest" value="{{$team['pinterest']}}">
                </div>
                @error('pinterest')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Instagram</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram" name="instagram" value="{{$team['instagram']}}">
                </div>
                @error('instagram')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Linkedin</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Linkedin" name="linkedin" value="{{$team['linkedin']}}">
                </div>
                @error('linkedin')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <div class="input-group mb-2">
                    <div class="input-group-text">Youtube</div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Youtube" name="youtube" value="{{$team['youtube']}}">
                </div>
                @error('youtube')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>

			<div class="form-check form-switch mb-2">
                @if($team['status'] == 1)
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="status" checked>
                @else
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="status">
                @endif
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