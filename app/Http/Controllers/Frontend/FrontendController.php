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

use App\Traits\PageComponentTrait;


class FrontendController extends Controller
{
    use PageComponentTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'home')->first();
        $page = $this->PageComponentSection($pageModel);

        // echo "<pre>"; print_r($page); die();
        return view('frontend.index', $page);
    }

    public function blog()
    {
        $blogPosts = Blog::simplePaginate(10);
        $blogCategories = BlogCategory::get();

        return view('frontend.blog.blog', [
            'blogPosts' => $blogPosts,
            'blogCategories' => $blogCategories,
        ]);
    }
    public function booking()
    {
        return view('frontend.booking.booking');
    }
    public function faq()
    {
        $faqs = Faq::simplePaginate(6);
        return view('frontend.faq.faq', [
           'faqs' => $faqs,
        ]);
    }
    public function testmonial()
    {
        $testimonials = Testimonial::simplePaginate(6);
        return view('frontend.testmonial.testmonial', [
           'testimonials' => $testimonials,
        ]);
    }
    public function about()
    {
        $pageModel = PageModel::with('page_section')->where('page_type', 'about_the_company')->first();
        $page = $this->PageComponentSection($pageModel);
        return view('frontend.about.about', $page);
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
    public function booking_success()
    {
        return view('frontend.booking.booking_success');
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
            'categoryPosts' => $categoryPosts,
            'blogCategories' => $blogCategories
        ]);
    }

    public function service()
    {
        $services = Service::simplePaginate(6);
        $testimonials = Testimonial::get();
        $partners = Partner::get();

        return view('frontend.service.service', [
            'services' => $services,
            'partners' => $partners,
            'testimonials' => $testimonials,
        ]);
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('service_slug', $slug)->get()->first();

        return view('frontend.service.service_details', [
            'service' => $service,
        ]);
    }

    public function serviceCategoryPost($slug)
    {
        $serviceCategory = ServiceCategory::where('category_slug', $slug)->get()->first();
        $categoryPosts = Service::where('service_category_id', $serviceCategory->id)->simplePaginate(6);

        $testimonials = Testimonial::get();
        $partners = Partner::get();

        return view('frontend.service.service_category_post', [
            'partners' => $partners,
            'testimonials' => $testimonials,
            'categoryPosts' => $categoryPosts,
        ]);
    }

    //Contact-------------------|unique:users,email

    protected function contactValidate($request)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'comment' => 'required',
            'terms_policy' => 'required'
        ]);
    }
    public function contact()
    {
        $contact = ContactModel::all()->toArray();
        $location = [];
        foreach ($contact as $contacts) {
            array_push($location, $contacts['lat_lang']);
        }
        //    echo '<pre>';
        //    print_r($location);
        //    die();
        return view('frontend.contact.contact', compact('contact', 'location'));
    }

    public function contact_save(Request $req)
    {
        //Validation--------------
        $this->contactValidate($req);

        $user_contact = new UserContact();
        $user_contact->first_name = $req->first_name;
        $user_contact->last_name = $req->last_name;
        $user_contact->email = $req->email;
        $user_contact->phone = $req->phone;
        $user_contact->city = $req->city;
        $user_contact->comment = $req->comment;
        $user_contact->terms_policy = $req->terms_policy;

        //    echo '<pre>';
        //    print_r($user_contact);
        //    die();

        $user_contact->save();

        $user = User::where('user_type', 2)->get()->toArray();

        if ($user) {
            foreach ($user as $users) {
                $admin_email[] = $users['email'];
            }
            // $admin_email[0]='rakib@apollointl.com.au';
            // $admin_email[1]='hasan@apollointl.com.au'; 

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

            $send_mail = Mail::send('mail', $data, function ($message) use ($data, $admin_email) {
                $message->to($admin_email)->subject($data['subject']);
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
