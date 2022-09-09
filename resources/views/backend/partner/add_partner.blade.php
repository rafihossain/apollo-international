@extends('backend.layouts.app')
@section('title', 'Add Partner')
@section('content')
<div class="card">
	<div class="card-body">
		<form id="addpartner" action="{{route('backend.save-partner')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label>Partner Name</label>
                <input type="text" class="form-control @error('partner_name') is-invalid @enderror" name="partner_name"
                value="{{old('partner_name')}}">
                @error('partner_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
                <label>Partner Category</label>
                <select class="form-control @error('partner_category') is-invalid @enderror" name="partner_category" id="">
                    <option value="">Select Category</option>
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="canadastudy">Canada Study</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="uk">UK</option>
                    <option value="usa">USA</option>
                    <option value="partner">Professional Year Partners</option>
                    <option value="health">Health Insurance</option>
                    <option value="accreditation">Professional Accreditation</option>
                    <option value="scholarship">Current Scholarships</option>
                </select>
                @error('partner_category')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
				<label>Partner Image</label>
				<input type="file" class="imageupload" name="partner_image">
                @error('partner_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="partner_status">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Partner </button>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>
@endsection