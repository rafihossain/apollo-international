<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserContact;
use Illuminate\Support\Facades\Mail;
use DB;

class ContactController extends Controller
{
    public function contact_list()
    {
        $contact_list=UserContact::all()->toArray();

        return view('backend.user_contact.contact_list',compact('contact_list'));
    }
    
      public function reply_user_contact(Request $req)
    {
        
        $email=$req->contact_email;
        $emailSub = "Contact Info!!";
        $emailBody = $req->message."<br>";
        $emailBody .= 'Thanks <b>Apollo International<b>';
        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('subject'=> $emailSub,'email'=>$email);

        $admin_email=DB::table('settings')->where('group_name','contact_email_setting')->where('settings_name','contact_email')->get()->toArray();
        $admin_email_new=explode(',',$admin_email[0]->settings_value);

        $send_mail=Mail::send('mail',$data,function($message) use ($data,$admin_email_new){
            $message->to($data['email'])->subject($data['subject']);
            $message->from($admin_email_new[0],'Admin');
        });

        UserContact::where('id',$req->contact_id)->update(['status'=>1]);
        echo 'success';
    }
}
