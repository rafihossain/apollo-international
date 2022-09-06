@extends('backend.layouts.app')
@section('content')
<div class="card">
	<div class="card-body">
        <div class="form-group mb-2">
            <label>Service Title :</label>
            {{$service->service_title}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Title :</label>
            {{$service->meta_title}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Keywords :</labe
            {{$service->meta_keywords}}
        </div>
        <div class="form-group mb-2">
            <label>Meta Description :</label>
            {{$service->meta_description}}
        </div>
        <div class="form-group mb-2">
            <label>Service Image :</label>
            <div class="mt-2">
                <img src="{{asset($service->service_image)}}" height="80" alt="blog-image">
            </div>
        </div>
        <div class="form-group mb-2">
            <label>Service Description :</label>
            {!!$service->service_description!!}
        </div>
	</div>
</div>
@endsection