@extends('backend.layouts.app')
@section('title', 'List Partner')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-partner') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Partner</a>
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
				@foreach($partners as $partner)
					<tr>
						<td>
							<img src="{{ asset($partner->partner_image) }}" alt="" height="42" class="img-fluid avatar-lg rounded">
						</td>
						<td>{{ $partner->partner_name }}</td>
						
                        <td><span class="badge bg-primary rounded-pill fs-6 p-1">{{ $partner->partner_category }}</span></td>

						@if($partner->partner_status == 1)
						<td><span class="badge bg-success rounded-pill">Publish</span></td> 
						@else
						<td><span class="badge bg-danger rounded-pill">Unpublish</span></td> 
						@endif

						<td>
                            <a href="{{route('backend.edit-partner', ['id' => $partner->id] )}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
							<a href="{{route('backend.delete-partner', ['id' => $partner->id] )}}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection