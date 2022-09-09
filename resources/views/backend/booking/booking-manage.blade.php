@extends('backend.layouts.app')
@section('title', 'List Booking')
@section('content')


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
                <th>Full Name</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Email & Phone</th>
                <th>Existing Client</th> 
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->first_name.' '.$booking->last_name}}</td>
                    <td>
                        {{ date('l, F, Y', strtotime($booking->created_at)) }}
                        <br>
                        <span>(Asia/Dhaka)</span>
                        <span class="badge bg-success rounded-pill">
                            {{ date('h:ia', strtotime($booking->booking_time)) }}
                        </span>
                    </td>
                    <td>
                        @if(isset($booking->booking_location))

                            @if($booking->booking_location == 1)
                                {{'Adelaide Video Conference'}}
                            @elseif($booking->booking_location == 2)
                                {{'Melbourne (Migration Video Conference)'}}
                            @elseif($booking->booking_location == 3)
                                {{'Melbourne (Admission Video Conference)'}}
                            @elseif($booking->booking_location == 4)
                                {{'Sydney (Migration Video Conference)'}}
                            @endif

                        @endif
                    </td>
                    <td>Email : {{$booking->booking_email}}
                        <br>
                        Phone : {{$booking->booking_phone}}</td>
                    <td>{{$booking->existing_client}}</td>
                    <td>
                        <a href="{{ route('backend.booking-delete', $booking->id) }}" id="delete" class="btn btn-sm btn-danger">
                            <i class="mdi mdi-trash-can-outline"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection