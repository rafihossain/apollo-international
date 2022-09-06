@extends('backend.layouts.app')
@section('title', 'List Contact')
@section('content') 

<div class="text-end mb-3">
    <a href="{{route('backend.contact_create')}}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Contact</a>
</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-danger">
        {{ session()->get('delete') }}
    </div>
@endif
<div class="card">
    <div class="card-body">
		<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
                <tr>
                    <th>Location Image</th>
                    <th>Country Name</th> 
                    <th>Phone</th> 
                    <th>Action</th>
                </tr>
            </thead>
     
            <tbody>
                @foreach($contact as $contacts)
                <tr>
                    <td>
                    	<img src="{{ asset('admin/image/contact/thumbnail')}}/{{$contacts['location_image']}}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>{{$contacts['country']}}</td> 
                    <td>{{$contacts['phone']}}</td>    
                    <td> 
                        <a href="{{route('backend.contact_edit',$contacts['id'])}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="{{route('backend.contact_delete',$contacts['id'])}}" class="btn btn-sm btn-danger" id="delete"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
               @endforeach  
            </tbody>
        </table>
    </div>
</div>

@endsection