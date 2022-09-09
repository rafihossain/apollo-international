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
use App\Models\StudyabroadModel;


class FrontendController extends Controller
{
    use PageComponentTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected function golobalOthersFunction(){
        $others = DB::table('settings')->where('group_name', 'other')->get();
        $result = [];
        foreach($others as $other){  
            $result[$other->settings_name] = $other->settings_value;
        }
        return $result;
    }
     
     
    public function index()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'home')->first();
        
        $page = $this->PageComponentSection($pageModel);
        // dd($page);
        // echo "<pre>"; print_r($page); die();
        
        return view('frontend.index', $page);
    }

    public function blog()
    {
        $other = $this->golobalOthersFunction();
        $blogPosts = Blog::where('blog_status', 1)->simplePaginate(10);
        $blogCategories = BlogCategory::get();

        return view('frontend.blog.blog', [
            'other' => $other,
            'blogPosts' => $blogPosts,
            'blogCategories' => $blogCategories,
        ]);
    }
    public function booking()
    {
        return view('frontend.booking.booking');
    }
    
    public function updateBooking(Request $request)
    {
        
        $validated = $request->validate([
            
            'first_name' => 'required',
            'last_name' => 'required',
            'booking_email' => 'required',
           // 'existing_client' => 'required',
            'phone' => 'required',
            //'booking_details' => 'required',
        ]);


        $book = new Booking;
        $book->first_name = $request->first_name;
        $book->last_name = $request->last_name;
        $book->booking_slug = Str::random(40);
        $book->booking_email = $request->booking_email;
        $book->booking_phone = '+'.$request->country_code.$request->phone;
        $book->existing_client = $request->existing_client;
        $book->booking_details = $request->booking_details;
        $book->save();
        

        //$email = $request->booking_email;
        $admin_email=DB::table('settings')->where('group_name','contact_email_setting')->where('settings_name','contact_email')->get()->toArray();
        $admin_email_new=explode(',',$admin_email[0]->settings_value);
        
        $emailSub = "Booking Info!!";
        
        $emailBody = "First Name: " . $request->first_name . "<br>";
        $emailBody .= "Last Name: " . $request->last_name . "<br>";
        $emailBody .= "Email    : " . $request->booking_email . "<br>";
        $emailBody .= "Phone    : " . $request->booking_phone . "<br>";
        $emailBody .= "Message  : $request->booking_details<br>";
        $emailBody .= 'Thanks <br>Apollo International<br>';
        
        // die();

        file_put_contents('../resources/views/mail.blade.php', $emailBody);
        $data = array('subject' => $emailSub);

        $send_mail = Mail::send('mail', $data, function ($message) use ($data, $admin_email_new) {
            $message->to($admin_email_new)->subject($data['subject']);
        });
            

        return redirect()->route('frontend.booking_success', ['slug'=>$book->booking_slug])->with('success', 'Booking Successfully Completed');
    }
    public function booking_success($slug)
    {
        $booking = Booking::where('booking_slug',$slug)->get()->first();
        
        return view('frontend.booking.booking_success', [
            'booking' => $booking,
        ]);
    }
    
    public function faq()
    {
        // $faqs = Faq::simplePaginate(6);
        $faqconditions = Faq::get();
        foreach ($faqconditions as $faqcondition){

            $baseUrl = $_SERVER['HTTP_HOST'];
            if($faqcondition->country == 0) {
                $faqs = Faq::where('country', 0)->get();
            }
            if($faqcondition->country == 1 && $baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"){
                $faqs = Faq::where('country', 1)->get();
            }
            if($faqcondition->country == 2 && $baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"){
                $faqs = Faq::where('country', 2)->get();
            }
            
        }
        
        
        $other = $this->golobalOthersFunction();
        
        return view('frontend.faq.faq', [
           'faqs' => $faqs,
           'other' => $other,
        ]);
    }
    public function partner()
    {
        // $partners = Partner::where('partner_category', '!=', 'accreditation')->simplePaginate(24);
        $partners = Partner::get();
        
        // dd($partners);
        
        
     
        $other = $this->golobalOthersFunction();
        
        return view('frontend.partner.partner-list', [
           'partners' => $partners,
           'other' => $other,
        ]);
    }
    public function testmonial()
    {
        $testimonials = Testimonial::where('user_status', 1)->simplePaginate(6);
        $other = $this->golobalOthersFunction();
        
        return view('frontend.testmonial.testmonial', [
           'other' => $other,
           'testimonials' => $testimonials,
        ]);
    }
    
    public function scholarship()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'scholarship_section')->first();
        $page = $this->PageComponentSection($pageModel);
        // dd($page);
        return view('frontend.scholarship.scholarship', $page);
    }
    
    public function studyabroad()
    {
        $studyabroads = StudyabroadModel::get();
        // dd($studyabroad);
        return view('frontend.study-abroad.studyabroad-list', [
            'studyabroads' => $studyabroads,
        ]);
    }
    public function studyabroadDetails($slug)
    {
        $studyabroad = StudyabroadModel::where('studyabroad_slug',$slug)->get()->first();
        $partners = Partner::where('partner_category', $studyabroad->related_partner)->orderBy('partner_sorting', 'DESC')->get();
        // dd($studyabroad);
        return view('frontend.study-abroad.studyabroad_details', [
            'studyabroad' => $studyabroad,
            'partners' => $partners,
        ]);
    }
    
    
    public function about()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'about_the_company')->first();
        $page = $this->PageComponentSection($pageModel);
        return view('frontend.about.about', $page);
    }
    
    public function carrer()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'carrer_page')->first();
        $page = $this->PageComponentSection($pageModel);

        // echo '<pre>';
        // print_r($page);
        // die();

        return view('frontend.carrer.carrer',$page);
    }
    public function franchise()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'franchise_page')->first();
        $page = $this->PageComponentSection($pageModel);

        return view('frontend.franchise.franchise',$page);
    }
    public function director_messages()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'about_director_message')->first();
        $page = $this->PageComponentSection($pageModel);
        return view('frontend.about.director_messages', $page);
    }
    public function mission_vision()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'about_vision')->first();
        
        $page = $this->PageComponentSection($pageModel);
        // dd($page);
        return view('frontend.about.mission_vision', $page);
    }
    public function our_leaders()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'about_our_team')->first();
        $page = $this->PageComponentSection($pageModel);
        return view('frontend.about.our_leaders', $page);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('blog_slug', $slug)->get()->first();
        $category = $blog->blog_category_id;

        $postId = explode(',', $blog->related_post);
        // echo "<pre>"; print_r($postId); die();

        if ($blog->related_post != '') {
            $relatedBlogs = [];
            for ($i = 0; $i < count($postId); $i++) {
                $relatedBlogs[] = Blog::where('id', $postId[$i])->get()->first();
            }
        } else {
            $relatedBlogs = Blog::where('blog_category_id', $category)
                ->where('blog_slug', '!=', $slug)
                ->orderBy('id', 'DESC')
                ->take(3)
                ->get();
        }

        $blogCategories = BlogCategory::get();

        return view('frontend.blog.blog_details', [
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
            'blogCategories' => $blogCategories
        ]);
    }

    public function categoryPost($slug)
    {
        $blogCategory = BlogCategory::where('category_slug', $slug)->get()->first();
        $categoryPosts = Blog::where('blog_category_id', $blogCategory->id)->simplePaginate(6);
        $blogCategories = BlogCategory::get();

        return view('frontend.blog.blog_category_post', [
            'blogCategory' => $blogCategory,
            'categoryPosts' => $categoryPosts,
            'blogCategories' => $blogCategories,
            
        ]);
    }

    public function service()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'service_list')->first();
        $page = $this->PageComponentSection($pageModel);
        $service_list = Service::where('service_status', 1)->simplePaginate(9);
        $page['service_list'] = $service_list;

        return view('frontend.service.service', $page);
    }

    public function serviceDetails($slug)
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'service_list')->first();
        $page = $this->PageComponentSection($pageModel);
        $service = Service::where('service_slug', $slug)->get()->first();
        $page['service'] = $service;

        return view('frontend.service.service_details', $page);
    }

    public function serviceCategoryPost($slug)
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'service_list')->first();
        $page = $this->PageComponentSection($pageModel);
        $serviceCategory = ServiceCategory::where('category_slug', $slug)->get()->first();
        $categoryPosts = Service::where('service_category_id', $serviceCategory->id)->where('service_status', 1)->orderBy('ordering_id','asc')->simplePaginate(9);

        $page['categoryPosts'] = $categoryPosts;
        $page['serviceCategory'] = $serviceCategory;
      
        return view('frontend.service.service_category_post', $page);
    }

    //Contact-------------------|unique:users,email

    protected function contactValidate($request)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            //'city' => 'required',
           // 'comment' => 'required',
            'terms_policy' => 'required'
        ]);
    }
    public function contact()
    {
        $other = $this->golobalOthersFunction();
        
 
        $australia=ContactModel::where('country','australia')->get()->toArray();

        $contact=ContactModel::select('*')->groupBy('country')->orderBy('country','asc')->get()->toArray();

     
        $location = [];
        foreach ($contact as $contacts) {
            array_push($location, $contacts['lat_lang']);
        }

        return view('frontend.contact.contact', compact('contact', 'location', 'other','australia'));
    }

    public function contact_save(Request $req)
    {
        //Validation--------------
        $this->contactValidate($req);

        //echo '+'.$req->country_code.$req->phone;die();
        $user_contact = new UserContact();
        $user_contact->first_name = $req->first_name;
        $user_contact->last_name = $req->last_name;
        $user_contact->email = $req->email;
        $user_contact->phone = '+'.$req->country_code.$req->phone;
        $user_contact->city = $req->city;
        $user_contact->comment = $req->comment;
        $user_contact->terms_policy = $req->terms_policy;
        $user_contact->save();

         $admin_email=DB::table('settings')->where('group_name','contact_email_setting')->where('settings_name','contact_email')->get()->toArray();

         $admin_email_new=explode(',',$admin_email[0]->settings_value);

        if ($admin_email_new) {

            $email = $req->email;
            $emailSub = "Contact Info!!";
            $emailBody = "First Name: " . $req->first_name . "<br>";
            $emailBody = "Last Name: " . $req->last_name . "<br>";
            $emailBody .= "Email: " . $req->email . "<br>";
            $emailBody .= "Phone: " . $req->phone . "<br>";
            $emailBody .= "City: " . $req->city . "<br>";
            $emailBody .= "Message: $req->comment<br>";
            $emailBody .= 'Thanks <b>Apollo International<b>';

            file_put_contents('../resources/views/mail.blade.php', $emailBody);
            $data = array('subject' => $emailSub);

            $send_mail = Mail::send('mail', $data, function ($message) use ($data, $admin_email_new) {
                $message->to($admin_email_new)->subject($data['subject']);
            });
        }

        return redirect()->route('frontend.contact')->with('success', 'Successfully Send');
    }



    /**
     * Privacy Policy Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $body_class = '';

        return view('frontend.privacy', compact('body_class'));
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $body_class = '';

        return view('frontend.terms', compact('body_class'));
    }
}
