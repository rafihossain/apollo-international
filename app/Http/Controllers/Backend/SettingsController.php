<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Faq;
use App\Models\OurTeam;
use App\Models\User;
use App\Models\ContactModel;
use App\Models\Setting;
use Image;
use File;
use DB;


class SettingsController extends Controller
{
    //echo Session::get('user_type');die();
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('role:admin|writer')->only('testmiddleware');
        //$this->module_name = 'editor';
      
        //  $this->middleware(function ($request, $next) {
        //      if(Session::get('user_type') == 4)
        //     {
        //       $this->middleware('permission:setting_permission');
        //     }
        //     if(Session::get('user_type') == 3)
        //     {
        //       $this->middleware('permission:editor_permission');
        //     }
        // });
        $this->middleware('permission:editor_permission');
    }

    protected function faqInfoValidate($request)
    {
        $request->validate([
            'faq_question' => 'required'
        ]);
    }
    public function manageFaq()
    {
        
        $faqs = Faq::get();
        return view('backend.settings.faq.manage_faq', [
            'faqs' => $faqs
        ]);
    }
    public function addFaq()
    {
        return view('backend.settings.faq.add_faq');
    }
    public function saveFaq(Request $request)
    {
        $this->faqInfoValidate($request);

        $faq = new Faq;
        $faq->faq_question = $request->faq_question;
        $faq->faq_answare = $request->faq_answare;
        $faq->country = $request->country;
        $faq->save();
        return redirect()->route('backend.manage-faq')->with('success', 'Faq has been added successfully !!');
    }
    public function editFaq($id)
    {
        $faq = Faq::find($id);
        return view('backend.settings.faq.edit_faq', [
            'faq' => $faq
        ]);
    }
    public function updateFaq(Request $request)
    {
        $this->faqInfoValidate($request);
        $faq = Faq::find($request->id);
        $faq->faq_question = $request->faq_question;
        $faq->faq_answare = $request->faq_answare;
        $faq->country = $request->country;
        $faq->save();

        return redirect()->route('backend.manage-faq')->with('success', 'Faq has been update successfully !!');
    }
    public function deleteFaq($id)
    {
        Faq::where('id', $id)->delete();
        return redirect()->route('backend.manage-faq')->with('success', 'Faq has been deleted successfully !!');
    }


    /* Start Our Team section */

    protected function memberValidate($request)
    {
        $request->validate([
            'member_name' => 'required',
            'member_position' => 'required',
            'member_image' => 'required',
            'member_description'=>'required'
        ]);
    }

    protected function memberupdateValidate($request)
    {
        $request->validate([
            'member_name' => 'required',
            'member_position' => 'required',
            'member_description'=>'required'
        ]);
    }



    protected function teamImageUpload($request)
    {

        $member_Image = $request->file('member_image');
        $image = Image::make($member_Image);
        $fileType = $member_Image->getClientOriginalExtension();
        $imageName = 'team_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/team/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }

    public function our_team()
    {
      
        $team = OurTeam::all()->toArray();
        return view('backend.settings.our_team.our_team_list', compact('team'));
    }

    public function create(Request $req)
    {
        return view('backend.settings.our_team.our_team_create');
    }

    public function save_our_team(Request $req)
    {
        //for validation----------
        $this->memberValidate($req);
        $imageUrl = $this->teamImageUpload($req);

        $our_team = new OurTeam();
        $our_team->member_name = $req->member_name;
        $our_team->member_position = $req->member_position;
        $our_team->member_image = $imageUrl;
        $our_team->member_description = $req->member_description;

        if ($req->status == 'on') {
            $our_team->status = 1;
        } else {
            $our_team->status = 2;
        }

        $our_team->save();
        return redirect()->route('backend.our_team')->with('success', 'Successfully Inserted');
    }

    public function our_team_delete($id)
    {

        $data = OurTeam::find($id);

        if ($data->member_image != '') {

            if (File::exists('admin/image/team/' . $data->member_image)) {
                unlink('admin/image/team/' . $data->member_image);
            }
            if (File::exists('admin/image/team/thumbnail/' . $data->member_image)) {
                unlink('admin/image/team/thumbnail/' . $data->member_image);
            }
        }

        $delete = OurTeam::where('id', $id)->delete();

        if ($delete) {
            return redirect()->route('backend.our_team')->with('delete', 'Successfully Deleted');
        }
    }

    public function our_team_edit($id)
    {
        $team = OurTeam::find($id)->toArray();
        return view('backend.settings.our_team.our_team_edit', compact('team'));
    }

    public function update_our_team(Request $req)
    {
        $this->memberupdateValidate($req);
        $id = $req->team_id;

        $member_image = $req->file('member_image');


        if ($member_image) {
            $team = OurTeam::find($id)->toArray();
            if ($team['member_image'] != '') {

                if (File::exists('admin/image/team/' . $team['member_image'])) {
                    unlink('admin/image/team/' . $team['member_image']);
                }
                if (File::exists('admin/image/team/thumbnail/' . $team['member_image'])) {
                    unlink('admin/image/team/thumbnail/' . $team['member_image']);
                }
            }

            $imageUrl = $this->teamImageUpload($req);

            $our_team = OurTeam::find($id);
            $our_team->member_name = $req->member_name;
            $our_team->member_position = $req->member_position;
            $our_team->member_image = $imageUrl;
            $our_team->member_description = $req->member_description;

            if ($req->status == 'on') {
                $our_team->status = 1;
            } else {
                $our_team->status = 2;
            }

            $our_team->save();
            return redirect()->route('backend.our_team')->with('success', 'Successfully Updated');
        } else {

            $our_team = OurTeam::find($id);
            $our_team->member_name = $req->member_name;
            $our_team->member_position = $req->member_position;
            $our_team->member_description = $req->member_description;

            if ($req->status == 'on') {
                $our_team->status = 1;
            } else {
                $our_team->status = 2;
            }
            $our_team->save();

            return redirect()->route('backend.our_team')->with('success', 'Successfully Updated');
        }
    }

    /* End Our Team section */

    /* Contact Section Start */

    protected function contactValidate($request)
    {
        $request->validate([
            'country' => 'required',
            //'address' => 'required',
            //'phone' => 'required',
            //'email' => 'required',
            //'facebook' => 'required',
            //'twitter' => 'required',
            //'pinterest' => 'required',
            //'instagram' => 'required',
            //'linkedin' => 'required',
            //'youtube' => 'required',
            //'location_image' => 'required'
        ]);
    }

    protected function contactupdateValidate($request)
    {
        $request->validate([
            'country' => 'required',
            //'address' => 'required',
            //'phone' => 'required',
            //'email' => 'required',
            //'facebook' => 'required',
            //'twitter' => 'required',
            //'pinterest' => 'required',
            //'instagram' => 'required',
            //'linkedin' => 'required',
            //'youtube' => 'required',
        ]);
    }

    protected function contactImageUpload($request)
    {

        $location_image = $request->file('location_image');

        $image = Image::make($location_image);
        $fileType = $location_image->getClientOriginalExtension();
        $imageName = 'team_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/contact/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }

    public function contact_list()
    {
        
        $contact = ContactModel::all()->toArray();
        return view('backend.settings.contact.contact_list', compact('contact'));
    }
    public function contact_create()
    {
        $contact = ContactModel::all()->toArray();

        return view('backend.settings.contact.contact_create', compact('contact'));
    }

    public function contact_save(Request $req)
    {
        //Validation--------------------
        $this->contactValidate($req);

        $imageurl = $this->contactImageUpload($req);
        $contact = new ContactModel();
        $contact->country = $req->country;
        $contact->office = $req->office;
        $contact->address = $req->address;
        $contact->phone = $req->phone;
        $contact->mobile = $req->mobile;
        $contact->email = $req->email;
        $contact->lat_lang = $req->latitude . ',' . $req->longitude;
        $contact->facebook = $req->facebook;
        $contact->twitter = $req->twitter;
        $contact->pinterest = $req->pinterest;
        $contact->instagram = $req->instagram;
        $contact->linkedin = $req->linkedin;
        $contact->youtube = $req->youtube;
        $contact->location_image = $imageurl;
        $contact->save();

        return redirect()->route('backend.contact_list')->with('success', 'Successfully Inserted!');
    }


    public function contact_delete($id)
    {
        $data = ContactModel::find($id);

        if ($data->location_image != '') {

            if (File::exists('admin/image/contact/' . $data->location_image)) {
                unlink('admin/image/contact/' . $data->location_image);
            }
            if (File::exists('admin/image/contact/thumbnail/' . $data->location_image)) {
                unlink('admin/image/contact/thumbnail/' . $data->location_image);
            }
        }
        $delete = ContactModel::where('id', $id)->delete();

        if ($delete) {
            return redirect()->route('backend.contact_list')->with('delete', 'Successfully Deleted');
        }
    }

    public function contact_edit($id)
    {
        $contact = ContactModel::find($id)->toArray();

        return view('backend.settings.contact.contact_edit', compact('contact'));
    }

    public function contact_update(Request $req)
    {
        //Validation--------------------
        $this->contactupdateValidate($req);

        $id = $req->contact_id;

        $member_image = $req->file('location_image');


        if ($member_image) {
            $contact = ContactModel::find($id)->toArray();
            if ($contact['location_image'] != '') {

                if (File::exists('admin/image/contact/' . $contact['location_image'])) {
                    unlink('admin/image/contact/' . $contact['location_image']);
                }
                if (File::exists('admin/image/contact/thumbnail/' . $contact['location_image'])) {
                    unlink('admin/image/contact/thumbnail/' . $contact['location_image']);
                }
            }

            $imageUrl = $this->contactImageUpload($req);
            $contact = ContactModel::find($id);
            $contact->country = $req->country;
            $contact->office = $req->office;
            $contact->address = $req->address;
            $contact->phone = $req->phone;
            $contact->mobile = $req->mobile;
            $contact->email = $req->email;
            $contact->lat_lang = $req->latitude . ',' . $req->longitude;
            $contact->facebook = $req->facebook;
            $contact->twitter = $req->twitter;
            $contact->pinterest = $req->pinterest;
            $contact->instagram = $req->instagram;
            $contact->linkedin = $req->linkedin;
            $contact->youtube = $req->youtube;
            $contact->location_image = $imageUrl;
            $contact->save();
            return redirect()->route('backend.contact_list')->with('success', 'Successfully Updated');
        } else {

            $contact = ContactModel::find($id);
            $contact->country = $req->country;
            $contact->office = $req->office;
            $contact->address = $req->address;
            $contact->phone = $req->phone;
            $contact->mobile = $req->mobile;
            $contact->email = $req->email;
            $contact->lat_lang = $req->latitude . ',' . $req->longitude;
            $contact->facebook = $req->facebook;
            $contact->twitter = $req->twitter;
            $contact->pinterest = $req->pinterest;
            $contact->instagram = $req->instagram;
            $contact->linkedin = $req->linkedin;
            $contact->Youtube = $req->youtube;
            $contact->save();
            return redirect()->route('backend.contact_list')->with('success', 'Successfully Updated');
        }
    }
    /* End Contact Section */


    /* Contact Email Settings Start */

    protected function contact_email_Validate($request)
    {
        $request->validate([
            'contact_email' => 'required'
        ]);
    }

    protected function google_ads_Validate($request)
    {
        $request->validate([
            'google_analytics' => 'required',
        ]);
    }

    protected function facebook_pixel_Validate($request)
    {
        $request->validate([
            'facebook_pixels' => 'required',

        ]);
    }

    public function contact_email()
    {
        $admin_email = DB::table('settings')->where('group_name', 'contact_email_setting')->where('settings_name', 'contact_email')->get()->toArray();

        // echo '<pre>';
        // print_r($admin_email);
        // die();
        return view('backend.settings.contact.contact_email', compact('admin_email'));
    }

    public function contact_email_update(Request $req)
    {
        $this->contact_email_Validate($req);

        $all_email = $req->contact_email;
        DB::table('settings')->where('group_name', 'contact_email_setting')->where('settings_name', 'contact_email')->update(['settings_value' => $all_email]);
        return redirect()->route('backend.contact_email')->with('success', 'Successfully Updated');
    }

    /* Contact Email Update Settings Start */

    /* google_analytic Start */

    public function google_ads()
    {
        $google_analytic = DB::table('settings')->where('group_name', 'google_analytic')->get();
        //      echo '<pre>';
        //    print_r($google_analytic);
        //    die();
        return view('backend.settings.google_analytic.google_analytic', compact('google_analytic'));
    }

    public function google_ads_update(Request $req)
    {
        $this->google_ads_Validate($req);
        $google_analytic = $req->input();
        if (empty($google_analytic['google_analytics_publish'])) {
            $google_analytic['google_analytics_publish'] = 'no';
        }


        foreach ($google_analytic as $key => $google_analytics) {;

            $builder = DB::table('settings')->where('group_name', 'google_analytic')->where('settings_name', $key)->update(['settings_value' => $google_analytics]);
        }
        return redirect()->route('backend.google_ads')->with('success', 'Successfully Updated');
    }

    /* google_analytic End */


    /* Facebbok Pixel Start */

    public function facebook_pixel()
    {
        $facebook_pixel = DB::table('settings')->where('group_name', 'facebook_pixel')->get();
        //      echo '<pre>';
        //    print_r($google_analytic);
        //    die();
        return view('backend.settings.facebook_pixel.facebook_pixel', compact('facebook_pixel'));
    }

    public function facebook_pixel_update(Request $req)
    {
        $this->facebook_pixel_Validate($req);

        $facebook_pixel = $req->input();
        if (empty($facebook_pixel['facebook_pixel_publish'])) {
            $facebook_pixel['facebook_pixel_publish'] = 'no';
        }


        foreach ($facebook_pixel as $key => $facebook_pixels) {;

            $builder = DB::table('settings')->where('group_name', 'facebook_pixel')->where('settings_name', $key)->update(['settings_value' => $facebook_pixels]);
        }
        return redirect()->route('backend.facebook_pixel')->with('success', 'Successfully Updated');
    }

    /* Facebbok Pixel End */


    //Socail Setting--------------------------
    public function social_setting()
    {

        $social_settings = DB::table('settings')->where('group_name', 'socail_settings')->get();

        return view('backend.settings.social_setting', compact('social_settings'));
    }

    public function social_setting_update(Request $req)
    {
        $social = $req->input();
        if (empty($social['facebook_published'])) {
            $social['facebook_published'] = 'no';
        }
        if (empty($social['whatsapp_published'])) {
            $social['whatsapp_published'] = 'no';
        }

        foreach ($social as $key => $socials) {;

            $builder = DB::table('settings')->where('group_name', 'socail_settings')->where('settings_name', $key)->update(['settings_value' => $socials]);
        }

        return redirect()->back()->with('success', 'Successfully Updated');
    }



    /* Social Link Setting start */

    protected function social_link_Validate($request)
    {
        $validated = $request->validate([
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'pinterest' => 'required|url',
            'instagram' => 'required|url',
            'linkedin' => 'required|url',
            'youtube' => 'required|url'
        ]);
    }

    public function social_link()
    {
        $social_link = DB::table('settings')->where('group_name', 'social_link')->get();
        // echo '<pre>';
        // print_r($social_link);
        // die();
        return view('backend.settings.social_link.social_link', compact('social_link'));
    }

    public function social_link_update(Request $req)
    {
        $this->social_link_Validate($req);

        $social_link = $req->input();

        if (empty($social_link['social_link_publish'])) {
            $social_link['social_link_publish'] = 'no';
        }

        // echo '<pre>';
        // print_r($social);
        // die();
        foreach ($social_link as $key => $socials) {;

            $builder = DB::table('settings')->where('group_name', 'social_link')->where('settings_name', $key)->update(['settings_value' => $socials]);
        }

        return redirect()->back()->with('success', 'Successfully Updated');
    }

    /* Social Link Setting End */
    protected function editOthersValidate($request)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);
    }
    public function editOther()
    {
        $others = DB::table('settings')
                        ->where('group_name', 'other')
                        ->get();
        $result = [];
        foreach($others as $other){  
            $result[$other->settings_name] = $other->settings_value;
        }
        // echo "<pre>"; print_r($result); die();

        return view('backend.settings.others.manage-others', [
            'other' => $result,
        ]);
    }

    public function updateOther(Request $request)
    {
        $this->editOthersValidate($request);
        $input = $request->input();
        // dd($input);

        foreach ($input as $key => $value) {
            DB::table('settings')
                ->where('group_name', 'other')
                ->where('settings_name', $key)
                ->update(['settings_value' => $value]);
        }

        return redirect()->back()->with('success', 'Successfully Others Updated');
    }
    
    
    //Wizard
    protected function editWizardValidate($request)
    {
        $request->validate([
            'wizard' => 'required',
        ]);
    }
    public function editWizard()
    {
   
        $wizards = DB::table('settings')
                        ->where('group_name', 'wizard')
                        ->get();
        $result = [];
        foreach($wizards as $wizard){  
            $result[$wizard->settings_name] = $wizard->settings_value;
        }
        // echo "<pre>"; print_r($result); die();

        return view('backend.settings.wizard.manage-wizard', [
            'wizard' => $result,
        ]);
    }

    public function updateWizard(Request $request)
    {
        $this->editWizardValidate($request);
        $input = $request->input();
        // dd($input);

        foreach ($input as $key => $value) {
            DB::table('settings')
                ->where('group_name', 'wizard')
                ->where('settings_name', $key)
                ->update(['settings_value' => $value]);
        }

        return redirect()->back()->with('success', 'Successfully Wizard Updated');
    }



    //User Profile Update-------------
    protected function accountupdateValidate($request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
        ]);
    }

    protected function accountupdatenewValidate($request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|unique:users,email',
            'user_phone' => 'required',
        ]);
    }

    protected function userImageUpload($request)
    {

        $profile_image = $request->file('profile_image');
        $image = Image::make($profile_image);
        $fileType = $profile_image->getClientOriginalExtension();
        $imageName = 'user_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/user/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }

    public function my_account()
    {
        $userId = Session::get('user_id');
        $user = User::find($userId)->toArray();
        //  echo '<pre>';
        // print_r($user);
        // die();
        return view('backend.users.my_account', compact('user'));
    }

    public function update_my_account(Request $req)
    {

        $user_id = $req->user_id;
        $old_passwword = $req->old_password;
        $current_password = $req->current_password;
        $re_password = $req->re_password;
        $user = User::find($user_id)->toArray();

        //for validation------------
        if ($user['email'] == $req->user_email) {
            $this->accountupdateValidate($req);
        } else {
            $this->accountupdatenewValidate($req);
        }

        if ($old_passwword != '') {
            if (Hash::check($old_passwword, $user['password'])) {
                $profile_image = $req->file('profile_image');
                if ($profile_image) {

                    $users = User::find($user_id)->toArray();
                    if ($users['profile_image'] != '') {

                        if (File::exists('admin/image/user/' . $users['profile_image'])) {
                            unlink('admin/image/user/' . $users['profile_image']);
                        }
                        if (File::exists('admin/image/user/thumbnail/' . $users['profile_image'])) {
                            unlink('admin/image/user/thumbnail/' . $users['profile_image']);
                        }
                    }
                    $imageUrl = $this->userImageUpload($req);
                    Session::put('admin_image', $imageUrl);
                    $user = User::find($user_id);
                    $user->name = $req->user_name;
                    $user->first_name = $req->user_name;
                    $user->last_name = $req->user_name;
                    $user->email = $req->user_email;
                    $user->mobile = $req->user_phone;
                    $user->profile_image = $imageUrl;
                    $user->password = Hash::make($req->current_password);
                    $user->save();
                } else {

                    $user = User::find($user_id);
                    $user->name = $req->user_name;
                    $user->first_name = $req->user_name;
                    $user->last_name = $req->user_name;
                    $user->email = $req->user_email;
                    $user->mobile = $req->user_phone;
                    $user->password = Hash::make($req->current_password);
                    $user->save();
                }
                return redirect()->route('backend.my_account')->with('success', 'Successfully Updated');
            } else {
                return redirect()->route('backend.my_account', $user_id)->with('do_not_match', 'Old password is not correct');
            }
            // echo '<pre>';
            // print_r($user);
            die();
        } else {
            $profile_image = $req->file('profile_image');
            if ($profile_image) {

                $users = User::find($user_id)->toArray();
                if ($users['profile_image'] != '') {

                    if (File::exists('admin/image/user/' . $users['profile_image'])) {
                        unlink('admin/image/user/' . $users['profile_image']);
                    }
                    if (File::exists('admin/image/user/thumbnail/' . $users['profile_image'])) {
                        unlink('admin/image/user/thumbnail/' . $users['profile_image']);
                    }
                }
                $imageUrl = $this->userImageUpload($req);
                Session::put('admin_image', $imageUrl);
                $user = User::find($user_id);
                $user->name = $req->user_name;
                $user->first_name = $req->user_name;
                $user->last_name = $req->user_name;
                $user->email = $req->user_email;
                $user->mobile = $req->user_phone;
                $user->profile_image = $imageUrl;
                $user->save();
            } else {

                $user = User::find($user_id);
                $user->name = $req->user_name;
                $user->first_name = $req->user_name;
                $user->last_name = $req->user_name;
                $user->email = $req->user_email;
                $user->mobile = $req->user_phone;
                $user->save();
            }
            return redirect()->route('backend.my_account')->with('success', 'Successfully Updated');
        }
    }
    
        //Global settings----------------------
    protected function global_settingsValidate($request)
    {
        $validated = $request->validate([
            'header_logo' => 'required',
            'footer_logo' => 'required',
            'footer_about_us' => 'required',
            'footer_our_service' => 'required',
            'footer_quick_links' => 'required',
            'footer_contact' => 'required',
        ]);
    }

    protected function header_logo_ImageUpload($request)
    {
        $header_logo = $request->file('header_logo');
        
        $image = Image::make($header_logo);
        $fileType = $header_logo->getClientOriginalExtension();
        $imageName = 'header_logo_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/global_settings/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        return $imageName;
    }
    protected function fotter_logo_ImageUpload($request)
    {
        $footer_logo = $request->file('footer_logo');
        $image = Image::make($footer_logo);
        $fileType = $footer_logo->getClientOriginalExtension();
        $imageName = 'footer_logo_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/global_settings/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        return $imageName;
    }
    public function global_settings($country = null)
    {
        if($country == ''){
            $country = 1;
        }

        $global_settings = DB::table('settings')
                    ->where('group_name', 'global_settings')
                    ->where('country_id', $country)
                    ->get()
                    ->toArray();
        // dd($global_settings);
        return view('backend.settings.global_settings.manage_global_settings', compact('global_settings', 'country'));
    }

    public function global_settings_update(Request $req)
    {
        $global_settings = $req->input();

        if ($req->header_logo) {
            $global_settings['header_logo'] = $this->header_logo_ImageUpload($req);
        } else {
            $global_settings['header_logo'] = $req->old_header_logo;
        }
        if ($req->footer_logo) {
            $global_settings['footer_logo'] = $this->fotter_logo_ImageUpload($req);
        } else {
            $global_settings['footer_logo'] = $req->old_footer_logo;
        }

        foreach ($global_settings as $key => $global_settings_new) {;
                DB::table('settings')
                    ->where('group_name', 'global_settings')
                    ->where('settings_name', $key)
                    ->where('country_id', $req->country)
                    ->update(['settings_value' => $global_settings_new]);   
        }
        return redirect('admin/global/settings/'.$req->country)->with('success', 'Successfully Updated');
    }
}
