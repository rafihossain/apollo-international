@extends('backend.layouts.app')
@section('title', 'Add Scholarship')
@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{route('backend.save-scholarship')}}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group mb-2">
                <label>Category Name</label>
                <select class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="">
                    <option value="">Select Category</option>
                    <option value="australia">Australia</option>
                    <option value="bangladesh">Bangladesh</option>
                    <option value="china">China</option>
                    <option value="fiji">Fiji</option>
                    <option value="india">India</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="nepal">Nepal</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="srilanka">Srilanka</option>
                </select>
                @error('category_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
				<label>Category Image</label>
				<input type="file" class="imageupload" name="category_image">
                @error('category_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="category_status">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Scholarship</button>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>
@endsection