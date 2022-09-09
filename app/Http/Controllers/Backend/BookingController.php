<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    //Booking
    public function bookingManage(){
        $bookings = Booking::get();
        // dd($bookings);

        return view('backend.booking.booking-manage', [
            'bookings' => $bookings
        ]);
    }
    
    public function bookingDelete($id){
        Booking::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Booking has been deleted successfully !!');
    }
}
