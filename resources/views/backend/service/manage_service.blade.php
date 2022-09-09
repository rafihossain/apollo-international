@extends('backend.layouts.app')
@section('title', 'List Service')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-service') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Service</a>
</div>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
				@foreach($services as $service)
					<tr>
						<td>
                            <img src="{{ asset($service->service_image) }}" alt="" height="42" class="img-fluid avatar-lg rounded">
						</td>
						<td>{{ $service->service_title }}</td>
                        <td><span class="badge bg-primary rounded-pill">{{$service->category->category_name}}</span></td>
						@if($service->service_status == 1)
						<td><span class="badge bg-success rounded-pill">Publish</span></td> 
						@else
						<td><span class="badge bg-danger rounded-pill">Unpublish</span></td> 
						@endif

						<td>
                            <a href="{{route('frontend.details-service', ['slug' => $service->service_slug] )}}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-eye-outline"></i>
                            </a>
                            <a href="{{route('backend.edit-service', ['id' => $service->id] )}}" class="btn btn-sm btn-success">
                                <i class="mdi mdi-file-edit-outline"></i>
                            </a>
                          @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2') || (session()->get('user_type') == '3'))  
							<a href="{{route('backend.delete-service', ['id' => $service->id] )}}" id="delete" class="btn btn-sm btn-danger">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </a>
                          @endif  
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection