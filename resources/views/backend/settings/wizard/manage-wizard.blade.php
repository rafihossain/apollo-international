@extends('backend.layouts.app')
@section('title', 'Edit Wizard')
@section('content')


@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


<div class="card">
    <div class="card-body">
        <form id="fromWizard" action="{{route('backend.update-wizard')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label>Wizard</label>
                <textarea name="wizard" class="form-control @error('wizard') is-invalid @enderror">{{$wizard['wizard']}}</textarea>

                @error('wizard')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-check form-switch mb-2">
                <input type="hidden" name="wizard_status" value="no">
                
                <input type="checkbox" class="form-check-input" id="wizardstatus" name="wizard_status"
                value="yes" {{ ($wizard['wizard_status'] == 'yes' ? 'checked' : '') }}>
                <label class="form-check-label" for="wizardstatus" >Publish</label>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Save </button>
            </div>
        </form>
    </div>
</div>

@endsection