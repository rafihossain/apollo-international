<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\UserContact;
use App\Models\ContactModel;
use App\Models\ServiceCategory;
use App\Models\Faq;
use App\Models\OurTeam;
use App\Models\PageModel;
use App\Models\PageSectionModel;
use App\Models\User;
use DB;
use App\Traits\PageComponentTrait;
use App\Models\Booking;
use Illuminate\Http\Response;


class ApiController extends Controller
{
    public function api_check(Request $req)
    {
        $api_key = $req->api_key;
        $my_api = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9';
        if($api_key == $my_api){
            $value = true; 
        }else{
             $value = false; 
        }
        return response()->json([
            'success' => $value
        ]);
    }
    
    public function get_contacts(Request $req)
    {
        $api_key = $req->api_key;
        $my_api = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9';
        if($api_key == $my_api){
            $value = true; 
        }else{
             $data['ok'] = true;
             $data['contacts'] = UserContact :: where('is_provided', 0)->get()->toArray();
             //echo json_encode($data);
             //echo "<pre>"; print_r($contacts);die();
             $value = false; 
        }
        
        foreach($data['contacts'] as $contact){
            $id = $contact['id'];
            $UserContact = UserContact::find($id);
 
            $UserContact->is_provided = 1;
            $UserContact->save();
            
        }
        return response()->json($data);
    }
    
    public function book_api_check(Request $req)
    {
        $api_key = $req->api_key;
        $my_api = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9';
        if($api_key == $my_api){
            $value = true; 
        }else{
             $value = false; 
        }
        return response()->json([
            'success' => $value
        ]);
    }
    
    public function get_bookings(Request $req)
    {
        $api_key = $req->api_key;
        $my_api = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9';
        if($api_key == $my_api){
            $value = true; 
        }else{
             $data['ok'] = true;
             $data['bookings'] = Booking :: where('is_provided', 0)->get()->toArray();
             //echo json_encode($data);
             //echo "<pre>"; print_r($contacts);die();
             $value = false; 
        }
        
        // foreach($data['bookings'] as $booking){
        //     $id = $booking['id'];
        //     $booking_detail = Booking::find($id);
 
        //     $booking_detail->is_provided = 1;
        //     $booking_detail->save();
            
        // }
        return response()->json($data);
    }
}
