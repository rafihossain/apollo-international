@extends('backend.layouts.app')
@section('title', 'List User')
@section('content')

<div class="text-end mb-3">
    <a href="{{ route('backend.create-user')}}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add User</a>
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
                <th>Username</th>
                <th>Email</th> 
                <th>Role</th>  
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
                @foreach($user as $users)
                <tr>
                    <td>
                    	<img src="{{ asset('admin/image/user/thumbnail')}}/{{$users['profile_image']}}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>{{$users['name']}}</td> 
                    <td class="text-wrap">{{$users['email']}}</td> 
                    <td class="text-wrap">
                         <span class="badge bg-light rounded-pill text-primary">
                            @if($users['user_type'] == 2)
                                Admin
                            @elseif($users['user_type'] == 3)
                               Editor
                            @else
                               SEO 
                            @endif
                        </span> 
                    </td> 
                    
                    <td>
                      
                        <a href="{{ route('backend.user-edit',$users['id'])}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="{{ route('backend.user-delete',$users['id'])}}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
              @endforeach  
            </tbody>
        </table>
    </div>
</div>

@endsection