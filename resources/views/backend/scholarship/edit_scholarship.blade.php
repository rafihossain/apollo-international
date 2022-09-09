@extends('backend.layouts.app')
@section('title', 'Edit Partner')
@section('content')
<div class="card">
	<div class="card-body">
		<form action="{{route('backend.update-scholarship')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$scholarship->id}}">
			<div class="form-group mb-2">
                <label>Category name</label>
                <select class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="">
                    <option value="">Select Category</option>
                    <option value="australia" 
                    {{ ($scholarship->category_name == 'australia' ? 'selected' : '')}}>Australia</option>
                    <option value="bangladesh" 
                    {{ ($scholarship->category_name == 'bangladesh' ? 'selected' : '')}}>Bangladesh</option>
                    <option value="china" 
                    {{ ($scholarship->category_name == 'china' ? 'selected' : '')}}>China</option>
                    <option value="fiji" 
                    {{ ($scholarship->category_name == 'fiji' ? 'selected' : '')}}>Fiji</option>
                    <option value="india" 
                    {{ ($scholarship->category_name == 'india' ? 'selected' : '')}}>India</option>
                    <option value="malaysia" 
                    {{ ($scholarship->category_name == 'malaysia' ? 'selected' : '')}}>Malaysia</option>
                    <option value="nepal" 
                    {{ ($scholarship->category_name == 'nepal' ? 'selected' : '')}}>Nepal</option>
                    <option value="pakistan" 
                    {{ ($scholarship->category_name == 'pakistan' ? 'selected' : '')}}>Pakistan</option>
                    <option value="srilanka" 
                    {{ ($scholarship->category_name == 'srilanka' ? 'selected' : '')}}>Srilanka</option>
                </select>
                @error('category_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
				<label>Category Image</label>
				<input type="file" class="imageupload" name="category_image" 
                data-default-file="{{asset($scholarship->category_image)}}">
                @error('category_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="category_status"
                {{ $scholarship->category_status == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Update Scholarship</button>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>
@endsection