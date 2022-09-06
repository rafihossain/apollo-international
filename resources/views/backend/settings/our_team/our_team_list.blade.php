@extends('backend.layouts.app')
@section('title', 'List Team')
@section('content')

<div class="text-end mb-3">
    <a href="{{route('backend.create_our_team')}}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Member</a>
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
                    <th>Image</th>
                    <th> Name</th> 
                    <th>Position</th> 
                    <th>Status</th> 
                    <th>Action</th>
                </tr>
            </thead>
     
            <tbody>
                @foreach($team as $teams)
                <tr>
                    <td>
                    	<img src="{{ asset('admin/image/team/thumbnail')}}/{{$teams['member_image']}}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>{{$teams['member_name']}}</td> 
                    <td>{{$teams['member_position']}}</td>  
                    <td>
                        @if($teams['status'] == 1)
                        <span class="badge bg-success rounded-pill">Publish</span>
                        @else
                        <span class="badge bg-danger rounded-pill">Unpublish</span>
                        @endif
                    </td> 
                    <td> 
                        <a href="{{route('backend.our_team_edit',$teams['id'])}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="{{route('backend.our_team_delete',$teams['id'])}}" class="btn btn-sm btn-danger" id="delete"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
               @endforeach  
            </tbody>
        </table>
    </div>
</div>  

@endsection