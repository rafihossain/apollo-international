@extends('backend.layouts.app')
@section('title', 'Contact Email Settings')
@section('content') 

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{route('backend.contact_email_update')}}" method="post">
            @csrf
            <div class="contact_email col-md-6">
            <label for="">Contact Email</label>
            <input type="text" name="contact_email" id="" class="form-control" value="{{$admin_email[0]->
                settings_value}}">
            @error('contact_email')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>
            <button class="btn btn-primary mt-2" type="submit">Save</button>
        </form>
   </div>
</div>
@endsection