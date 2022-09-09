@extends('backend.layouts.app')
@section('title', 'List Service')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-studyabroad') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Studyabroad</a>
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
                    <th>Country Name</th>
                    <th>subtitle</th>
                    <th>title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
				@foreach($studyabroads as $studyabroad)
					<tr>
						<td>
                            <img src="{{ asset($studyabroad->studyabroad_image) }}" alt="" height="42" class="img-fluid avatar-lg rounded">
						</td>
						<td>{{ $studyabroad->country_name }}</td>
						<td>{{ $studyabroad->subtitle }}</td>
						<td>{{ $studyabroad->title }}</td>
						@if($studyabroad->studyabroad_status == 1)
						<td><span class="badge bg-success rounded-pill">Publish</span></td> 
						@else
						<td><span class="badge bg-danger rounded-pill">Unpublish</span></td> 
						@endif

						<td>
                            <a href="{{route('backend.edit-studyabroad', ['id' => $studyabroad->id] )}}" class="btn btn-sm btn-success">
                                <i class="mdi mdi-file-edit-outline"></i>
                            </a>
                          @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2') || (session()->get('user_type') == '3'))  
							<a href="{{route('backend.delete-studyabroad', ['id' => $studyabroad->id] )}}" id="delete" class="btn btn-sm btn-danger">
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