@extends('backend.layouts.app')
@section('title', 'Add Faq')
@section('content')
<div class="card">
    <div class="card-body">
        <form id="formFaq" action="{{route('backend.save-faq')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label>Question</label>
                <input type="text" class="form-control @error('faq_question') is-invalid @enderror" name="faq_question" value="{{ old('faq_question') }}">
                @error('faq_question')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group mb-2">
                <label>Answare</label>
                 
                <textarea name="faq_answare" id="editor"  ></textarea>

                @error('faq_answare')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit"> Add Faq </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       
         ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            editor.ui.view.editable.element.style.height = '300px';
        } )
        .catch( error => {
            console.error( error );
        } );
    });
 
</script>
@endsection