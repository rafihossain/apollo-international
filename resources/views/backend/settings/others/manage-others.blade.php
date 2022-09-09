@extends('backend.layouts.app')
@section('title', 'Edit Other')
@section('content')


@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


<div class="card">
    <div class="card-body">
        <form id="fromOthers" action="{{route('backend.update-other')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label>Meta Title</label>
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title"
                value="{{ $other['meta_title'] }}">
                @error('meta_title')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Keywords</label>
                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                value="{{ $other['meta_keywords'] }}">
                @error('meta_keywords')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ $other['meta_description'] }}">
                @error('meta_description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Save </button>
            </div>
        </form>
    </div>
</div>

@endsection