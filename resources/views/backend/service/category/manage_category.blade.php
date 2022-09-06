@extends('backend.layouts.app')
@section('title', 'List Service Category')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-service-category') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Category</a>
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
                    <th>Category Image</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($serviceCategories as $category)
                    <tr>
                        <td>
                            <img src="{{ asset($category->category_image) }}" alt="" height="42" class="img-fluid avatar-lg rounded">
						</td>
                        <td>{{ $category->category_name }}</td>
                        @if($category->id != 0)
                        <td>
                            <a href="{{ route('backend.edit-service-category', $category->id) }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                            <a href="{{ route('backend.delete-service-category', $category->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection