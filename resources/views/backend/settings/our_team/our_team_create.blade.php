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
				<label>Description</label>
	            <textarea name="member_description" id="editor1" cols="30" rows="5" class="form-control"></textarea>
                @error('member_description')
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
	 ClassicEditor.create(document.querySelector('#editor1'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '200px';
        })
</script>

@endsection