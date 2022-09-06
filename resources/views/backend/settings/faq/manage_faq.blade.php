@extends('backend.layouts.app')
@section('title', 'List Faq')
@section('content')
<div class="text-end mb-3">
    <a href="{{ route('backend.add-faq') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Faq</a>
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
                    <th>Question</th>
                    <th>Answare</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($faqs as $faq)
					<tr>
						<td>{{ $faq->faq_question }}</td>
						<td>{!! $faq->faq_answare !!}</td>

						<td>
                            <a href="{{route('backend.edit-faq', ['id' => $faq->id] )}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
							<a href="{{route('backend.delete-faq', ['id' => $faq->id] )}}" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection