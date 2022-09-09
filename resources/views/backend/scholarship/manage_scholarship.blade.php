@extends('backend.layouts.app')
@section('title', 'List Scholarship')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-scholarship') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Scholarship</a>
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
                <th>Category</th> 
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
				@foreach($scholarships as $scholarship)
					<tr>
						<td>
							<img src="{{ asset($scholarship->category_image) }}" alt="" height="42" class="img-fluid avatar-lg rounded">
						</td>
						
                        <td><span class="badge bg-primary rounded-pill fs-6 p-1">{{ $scholarship->category_name }}</span></td>

						@if($scholarship->category_status == 1)
						<td><span class="badge bg-success rounded-pill">Publish</span></td> 
						@else
						<td><span class="badge bg-danger rounded-pill">Unpublish</span></td> 
						@endif

						<td>
                            <a href="{{route('backend.edit-scholarship', ['id' => $scholarship->id] )}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
							<a href="{{route('backend.delete-scholarship', ['id' => $scholarship->id] )}}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection