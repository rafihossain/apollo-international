@extends('backend.layouts.app')
@section('title', 'List Blog Category')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-category') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Category</a>
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
                    <th>SL No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                @foreach($blogCategories as $category)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $category->category_name }}</td>
                        @if($category->id != 0)
                        <td>
                            <a href="{{ route('backend.edit-category', $category->id) }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                            @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2') || (session()->get('user_type') == '3'))
                            <a href="{{ route('backend.delete-category', $category->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                           @endif 
                        </td>
                        @endif
                    </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection