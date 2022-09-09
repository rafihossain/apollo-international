@extends('backend.layouts.app')
@section('title', 'Edit Team')
@section('content')

<div class="card">
	<div class="card-body">
      <form method="post" id="editteam" action="{{route('backend.update_our_team')}}" enctype="multipart/form-data"> 
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
				<label>Description</label>
	            <textarea name="member_description" id="editor1" cols="30" rows="5" class="form-control">{{$team['member_description']}}</textarea>
                @error('member_description')
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
	 ClassicEditor.create(document.querySelector('#editor1'))
    .then(editor => {
        editor.ui.view.editable.element.style.height = '200px';
    })
</script>

@endsection