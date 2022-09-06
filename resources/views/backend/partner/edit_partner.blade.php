@extends('backend.layouts.app')
@section('title', 'Edit Partner')
@section('content')
<div class="card">
	<div class="card-body">
		<form id="editpartner" action="{{route('backend.update-partner')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$partner->id}}">

            <div class="form-group mb-2">
                <label>Partner Name</label>
                <input type="text" class="form-control @error('partner_name') is-invalid @enderror" name="partner_name"
                value="{{$partner->partner_name}}">
                @error('partner_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
                <label>Partner Category</label>
                <select class="form-control @error('partner_category') is-invalid @enderror" name="partner_category" id="">
                    <option value="">Select Category</option>
                    <option value="australia" 
                    {{ ($partner->partner_category == 'australia' ? 'selected' : '')}}>Australia</option>
                    <option value="canada" 
                    {{ ($partner->partner_category == 'canada' ? 'selected' : '')}}>Canada</option>
                    <option value="partner" 
                    {{ ($partner->partner_category == 'partner' ? 'selected' : '')}}>Professional Year Partners</option>
                    <option value="health" 
                    {{ ($partner->partner_category == 'health' ? 'selected' : '')}}>Health Insurance</option>
                    <option value="accreditation" 
                    {{ ($partner->partner_category == 'accreditation' ? 'selected' : '')}}>Professional Accreditation</option>
                    <option value="scholarship" 
                    {{ ($partner->partner_category == 'scholarship' ? 'selected' : '')}}>PCurrent Scholarships</option>
                </select>
                @error('partner_category')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
			<div class="form-group mb-2">
				<label>Partner Image</label>
				<input type="file" class="imageupload" name="partner_image" 
                data-default-file="{{asset($partner->partner_image)}}">
                @error('partner_image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
			</div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1" name="partner_status"
                {{ $partner->partner_status == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Update Partner </button>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.imageupload').dropify(); 
</script>
@endsection