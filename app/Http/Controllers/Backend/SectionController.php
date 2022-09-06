<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Service;
use Image;
use File;
use DB;

class SectionController extends Controller
{
    /*=============================================================
                    Section Validation
    ===============================================================*/
    protected function bannerInfoValidate($request)
    {
        $request->validate([
            'banner_title' => 'required',
            'banner_content' => 'required',
            'banner_link' => 'required',
            // 'banner_image' => 'required',
        ]);
    }
    //About us-------------------------------------------
    protected function about_us_Validate($request)
    {
        $request->validate([
            'about_us_title' => 'required',
            'about_us_sub_title' => 'required',
            'about_us_image' => 'required',
            'trusted' => 'required'
        ]);
    }
    //Skilll----------------------------------------
    protected function skill_Validate($request)
    {
        $request->validate([
            'student' => 'required',
            'global_office' => 'required',
            'visa' => 'required',
            'scholarship' => 'required'
        ]);
    }
    //Faq
    protected function faqInfoValidate($request)
    {
        $request->validate([
            'tagline' => 'required',
            'title' => 'required',
            'number_of_faq' => 'required',
            'image_title' => 'required'
        ]);
    }
    //Testimonial
    protected function home_testimonial_Validate($request)
    {
        $request->validate([
            'testimonial_title' => 'required',
            'testimonial_sub_title' => 'required',
            'testimonial_no' => 'required'
        ]);
    }
    //Service
    protected function home_service_Validate($request)
    {
        $request->validate([
            'service_title' => 'required',
            'service_sub_title' => 'required',
            'no_of_service' => 'required'
        ]);
    }
    //Blog
    protected function home_blog_Validate($request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_sub_title' => 'required',
            'no_of_blog' => 'required'
        ]);
    }
    //Partner
    protected function home_partner_Validate($request)
    {
        $request->validate([
            'partner_title' => 'required',
        ]);
    }
    //Scholarship
    protected function home_current_scholarship_Validate($request)
    {
        $request->validate([
            'current_scholarship_title' => 'required',
            'current_scholarship_image' => 'required',
        ]);
    }


    //Our company
    protected function about_the_company_Validate($request)
    {
        $request->validate([
            'company_title' => 'required',
            'company_description' => 'required',
            'company_image' => 'required',
        ]);
    }
    //Director message
    protected function about_director_message_Validate($request)
    {
        $request->validate([
            'director_tagline' => 'required',
            'director_name' => 'required',
            'director_description' => 'required',
            'director_image' => 'required',
        ]);
    }
    //Our team
    protected function about_our_team_validate($request)
    {
        $request->validate([
            'team_title' => 'required',
            'team_sub_title' => 'required',
            'no_of_team' => 'required',
        ]);
    }
    //Vision
    protected function about_vision_validate($request)
    {
        $request->validate([
            'vision_description' => 'required',
            'vision_image' => 'required',
        ]);
    }

    /*=============================================================
                    Section Image Upload
    ===============================================================*/

    //About image
    protected function home_about_image($request)
    {
        $about_us_image = $request->file('about_us_image');

        $image = Image::make($about_us_image);
        $fileType = $about_us_image->getClientOriginalExtension();
        $imageName = 'about_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/section/home_about/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }
    //Banner multiple image
    protected function bannerImageUpload($request)
    {
        $bannerImages = $request->file('banner_image');

        if ($request->hasFile('banner_image')) {
            // echo 11; die();

            $fileName = [];
            foreach ($bannerImages as $image) {
                $fileType = $image->getClientOriginalExtension();
                $imageName = 'banner_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
                $directory = 'admin/image/section/banner/';
                $imageUrl = $directory . $imageName;
                $image->move($directory, $imageName);
                $fileName[] = $imageUrl;
            }

            return $fileName;
        }
    }
    //Faq image
    protected function faqImageUpload($request)
    {
        $faqImage = $request->file('faq_image');

        $image = Image::make($faqImage);
        $fileType = $faqImage->getClientOriginalExtension();
        $imageName = 'faq_image_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/section/faq-image/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    //Scholarship
    protected function home_current_scholarship_image($request)
    {
        $current_scholarship_image = $request->file('current_scholarship_image');

        if ($request->hasFile('current_scholarship_image')) {
            $fileName = [];
            foreach ($current_scholarship_image as $images) {
                $image_name = Str::random(10);
                $image = Image::make($images);
                $fileType = $images->getClientOriginalExtension();
                $imageName = 'current_scholarship_' . $image_name . '.' . $fileType;
                $directory = 'admin/image/section/current_scholarship/';
                $imageUrl = $directory . $imageName;
                $image->save($imageUrl);

                $thumbnail = $directory . "thumbnail/" . $imageName;
                $image->resize(250, 125);
                $thImage = $image->save($thumbnail);

                $fileName[] = $imageName;
            }

            return $fileName;
        }
    }

    protected function about_company_image($request)
    {
        $company_image = $request->file('company_image');

        if ($request->hasFile('company_image')) {
            $fileName = [];
            foreach ($company_image as $images) {
                $image_name = Str::random(10);
                $image = Image::make($images);
                $fileType = $images->getClientOriginalExtension();
                $imageName = 'company_image_' . $image_name . '.' . $fileType;
                $directory = 'admin/image/section/company_image/';
                $imageUrl = $directory . $imageName;
                $image->save($imageUrl);

                $thumbnail = $directory . "thumbnail/" . $imageName;
                $image->resize(250, 125);
                $thImage = $image->save($thumbnail);

                $fileName[] = $imageUrl;
            }

            return $fileName;
        }
    }
    protected function about_director_image($request)
    {
        $director_image = $request->file('director_image');

        $image = Image::make($director_image);
        $fileType = $director_image->getClientOriginalExtension();
        $imageName = 'director_image_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/section/director_image/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }
    protected function about_vision_image($request)
    {
        $vision_image = $request->file('vision_image');

        $image = Image::make($vision_image);
        $fileType = $vision_image->getClientOriginalExtension();
        $imageName = 'vision_image_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/section/vision_image/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $imageName;
    }

    /*=============================================================
                    Section Basic Info Save
    ===============================================================*/

    //Banner info
    protected function bannerBasicInfoSave($request, $imageUrl)
    {
        $section = new Section;
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;

        $banner_content = $request->banner_content;
        $banner_link = $request->banner_link;
        $banner_data = [];
        foreach ($request->banner_title as $key => $banners_titles) {
            $banner_data[$key]['banner_title'] = $banners_titles;
            $banner_data[$key]['banner_content'] = $banner_content[$key];
            $banner_data[$key]['banner_link'] = $banner_link[$key];
            $banner_data[$key]['banner_image'] = $imageUrl[$key];
        }
        $section->section_value = json_encode($banner_data);
        $section->save();
    }
    //Faq info
    protected function sectionFaqBasicInfoSave($request, $imageUrl)
    {
        $section = new Section;
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;

        $sectionvalue = [
            'tagline' => $request->tagline,
            'title' => $request->title,
            'number_of_faq' => $request->number_of_faq,
            'image_title' => $request->image_title,
            'faq_image' => $imageUrl,
        ];

        $section->section_value = json_encode($sectionvalue);
        $section->save();
    }
    //About us info
    protected function sectionAboutUsBasicInfoSave($request)
    {
        $data['title'] = $request->about_us_title;
        $data['sub_title'] = $request->about_us_sub_title;
        $data['trusted'] = $request->trusted;
        $data['description'] = $request->about_description;
        $data['about_image'] = $this->home_about_image($request);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Skills info
    protected function sectionSkillsBasicInfoSave($request)
    {
        $data['student'] = $request->student;
        $data['global_office'] = $request->global_office;
        $data['visa'] = $request->visa;
        $data['scholarship'] = $request->scholarship;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Testimonial info
    protected function sectionTestimonialBasicInfoSave($request)
    {
        $data['testimonial_title'] = $request->testimonial_title;
        $data['testimonial_sub_title'] = $request->testimonial_sub_title;
        $data['testimonial_no'] = $request->testimonial_no;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Service info
    protected function sectionHomeServiceBasicInfoSave($request)
    {
        $data['service_title'] = $request->service_title;
        $data['service_sub_title'] = $request->service_sub_title;
        $data['no_of_service'] = $request->no_of_service;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Blog info
    protected function sectionHomeBlogBasicInfoSave($request)
    {
        $data['blog_title'] = $request->blog_title;
        $data['blog_sub_title'] = $request->blog_sub_title;
        $data['no_of_blog'] = $request->no_of_blog;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Partner info
    protected function sectionHomePartnerBasicInfoSave($request)
    {
        $data['partner_title'] = $request->partner_title;
        $data['partner_category'] = $request->partner_category;
        $data['no_of_partner'] = $request->no_of_partner;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Scholarship
    protected function sectionHomeCurrentScholarshipBasicInfoSave($request)
    {
        $data['current_scholarship_title'] = $request->current_scholarship_title;
        $data['current_scholarship_image'] = $this->home_current_scholarship_image($request);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Company
    protected function sectionAboutTheCompanyBasicInfoSave($request)
    {
        $data['company_title'] = $request->company_title;
        $data['company_description'] = $request->company_description;
        $data['company_image'] = $this->about_company_image($request);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Director message
    protected function sectionDirectorMessageBasicInfoSave($request)
    {
        $data['director_tagline'] = $request->director_tagline;
        $data['director_name'] = $request->director_name;
        $data['director_description'] = $request->director_description;
        $data['director_image'] = $this->about_director_image($request);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //Our team
    protected function sectionOurTeamBasicInfoSave($request)
    {
        $data['team_title'] = $request->team_title;
        $data['team_sub_title'] = $request->team_sub_title;
        $data['no_of_team'] = $request->no_of_team;

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }
    //About vision
    protected function sectionAboutVisionBasicInfoSave($request)
    {
        $data['vision_description'] = $request->vision_description;
        $data['vision_image'] = $this->about_vision_image($request);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }



    /*=============================================================
                    Start Main Code
    ===============================================================*/
    public function manageSection()
    {
        $section = Section::get()->toArray();
        return view('backend.section.manage_section', compact('section'));
    }
    public function addSection()
    {
        return view('backend.section.add_section');
    }
    public function saveSection(Request $request)
    {
        $input = $request->all();

        if ($input['section_type'] == 'banner') {
            $this->bannerInfoValidate($request);
            $imageUrl = $this->bannerImageUpload($request);
            $this->bannerBasicInfoSave($request, $imageUrl);
        } else if ($input['section_type'] == 'home_faq') {
            $this->faqInfoValidate($request);
            $imageUrl = $this->faqImageUpload($request);
            $this->sectionFaqBasicInfoSave($request, $imageUrl);
        } else if ($input['section_type'] == 'home_aboutus') {
            $this->about_us_Validate($request);
            $this->sectionAboutUsBasicInfoSave($request);
        } else if ($input['section_type'] == 'skills') {
            $this->skill_Validate($request);
            $this->sectionSkillsBasicInfoSave($request);
        } else if ($input['section_type'] == 'home_testimonial') {
            $this->home_testimonial_Validate($request);
            $this->sectionTestimonialBasicInfoSave($request);
        } else if ($input['section_type'] == 'home_service') {
            $this->home_service_Validate($request);
            $this->sectionHomeServiceBasicInfoSave($request);
        } else if ($input['section_type'] == 'home_blog') {
            $this->home_blog_Validate($request);
            $this->sectionHomeBlogBasicInfoSave($request);
        } else if ($input['section_type'] == 'home_partner') {
            $this->home_partner_Validate($request);
            $this->sectionHomePartnerBasicInfoSave($request);
        } else if ($input['section_type'] == 'home_current_scholarship') {
            $this->home_current_scholarship_Validate($request);
            $this->sectionHomeCurrentScholarshipBasicInfoSave($request);
        } else if ($input['section_type'] == 'about_the_company') {
            $this->about_the_company_Validate($request);
            $this->sectionAboutTheCompanyBasicInfoSave($request);
        } else if ($input['section_type'] == 'about_director_message') {
            $this->about_director_message_Validate($request);
            $this->sectionDirectorMessageBasicInfoSave($request);
        } else if ($input['section_type'] == 'about_our_team') {
            $this->about_our_team_validate($request);
            $this->sectionOurTeamBasicInfoSave($request);
        } else if ($input['section_type'] == 'about_vision') {
            $this->about_vision_validate($request);
            $this->sectionAboutVisionBasicInfoSave($request);
        }

        return redirect()->route('backend.manage-section')->with('success', 'Section has been added successfully !!');
    }


    /*================================================================
                            Edit Section Start 
    ================================================================*/

    protected function home_current_scholarship_update_Validate($request)
    {
        $request->validate([
            'current_scholarship_title' => 'required',
        ]);
    }

    //Our company
    protected function about_the_company_update_Validate($request)
    {
        $request->validate([
            'company_title' => 'required',
            'company_description' => 'required',
        ]);
    }

    //Director message
    protected function about_director_message_update_Validate($request)
    {
        $request->validate([
            'director_tagline' => 'required',
            'director_name' => 'required',
            'director_description' => 'required',
        ]);
    }

    //Vision
    protected function about_vision_update_validate($request)
    {
        $request->validate([
            'vision_description' => 'required',
        ]);
    }

    public function editSection($id)
    {
        $one_section = Section::find($id)->toArray();
        // echo '<pre>';
        // print_r($one_section);
        // die();
        return view('backend.section.edit_section', compact('one_section'));
    }

    //Banner Update Info--------------------
    protected function bannerBasicInfoupdate($request, $imageUrl, $id)
    {

        $banner_section = Section::find($id);
        $banner_section->section_name = $request->section_name;
        $banner_section->section_type = $request->section_type;


        $bannner_title = $request->banner_title;
        $banner_content = $request->banner_content;
        $banner_link = $request->banner_link;

        $banner_data = [];
        foreach ($request->banner_title as $key => $banners_titles) {
            $banner_data[$key]['banner_title'] = $banners_titles;
            $banner_data[$key]['banner_content'] = $banner_content[$key];
            $banner_data[$key]['banner_link'] = $banner_link[$key];
            $banner_data[$key]['banner_image'] = $imageUrl[$key];
        }

        $banner_section->section_value = json_encode($banner_data);

        // echo '<pre>';
        // print_r($banner_section);
        // die();
        $banner_section->save();
    }

    //home about us Info--------------------
    protected function home_about_us_update($request, $imageUrl)
    {

        $banner_section = Section::find($request->section_id);
        $banner_section->section_name = $request->section_name;
        $banner_section->section_type = $request->section_type;

        $data['title'] = $request->about_us_title;
        $data['sub_title'] = $request->about_us_sub_title;
        $data['trusted'] = $request->trusted;
        $data['description'] = $request->about_description;
        $data['about_image'] = $imageUrl;

        $banner_section->section_value = json_encode($data);


        $banner_section->save();
    }

    //Skills info
    protected function sectionSkillsBasicInfoUpdate($request)
    {

        $data['student'] = $request->student;
        $data['global_office'] = $request->global_office;
        $data['visa'] = $request->visa;
        $data['scholarship'] = $request->scholarship;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Testimonial info update--------------
    protected function sectionTestimonialBasicInfoUpdate($request)
    {
        $data['testimonial_title'] = $request->testimonial_title;
        $data['testimonial_sub_title'] = $request->testimonial_sub_title;
        $data['testimonial_no'] = $request->testimonial_no;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Faq info update------------------
    protected function sectionFaqBasicInfoUpdate($request, $imageUrl)
    {
        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;

        $sectionvalue = [
            'tagline' => $request->tagline,
            'title' => $request->title,
            'number_of_faq' => $request->number_of_faq,
            'image_title' => $request->image_title,
            'faq_image' => $imageUrl,
        ];

        $section->section_value = json_encode($sectionvalue);
        // echo '<pre>';
        // print_r($section);
        // die();
        $section->save();
    }

    //Service info Update-------------
    protected function sectionHomeServiceBasicInfoUpdate($request)
    {
        $data['service_title'] = $request->service_title;
        $data['service_sub_title'] = $request->service_sub_title;
        $data['no_of_service'] = $request->no_of_service;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Blog info update-------------
    protected function sectionHomeBlogBasicInfoUpdate($request)
    {
        $data['blog_title'] = $request->blog_title;
        $data['blog_sub_title'] = $request->blog_sub_title;
        $data['no_of_blog'] = $request->no_of_blog;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Partner info update--------------------
    protected function sectionHomePartnerBasicInfoUpdate($request)
    {
        $data['partner_title'] = $request->partner_title;
        $data['partner_category'] = $request->partner_category;
        $data['no_of_partner'] = $request->no_of_partner;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Current Scholorship update-------------------------
    protected function home_current_scholarship_update($req, $imageUrl)
    {
        $data['current_scholarship_title'] = $req->current_scholarship_title;
        $data['current_scholarship_image'] = $imageUrl;


        $section = Section::find($req->section_id);
        $section->section_name = $req->section_name;
        $section->section_type = $req->section_type;
        $section->section_value = json_encode($data);

        $section->save();
    }

    //Company update--------------------------------
    protected function about_the_company_update($request, $image_url)
    {
        $data['company_title'] = $request->company_title;
        $data['company_description'] = $request->company_description;
        $data['company_image'] = $image_url;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);

        $section->save();
    }

    //Director message update------------------
    protected function sectionDirectorMessageBasicInfoUpdate($request, $img_url)
    {
        $data['director_tagline'] = $request->director_tagline;
        $data['director_name'] = $request->director_name;
        $data['director_description'] = $request->director_description;
        $data['director_image'] = $img_url;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //Our team Update---------------
    protected function sectionOurTeamBasicInfoUpdate($request)
    {
        $data['team_title'] = $request->team_title;
        $data['team_sub_title'] = $request->team_sub_title;
        $data['no_of_team'] = $request->no_of_team;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    //About vision update------------
    protected function sectionAboutVisionBasicInfoUpdate($request, $img_url)
    {
        $data['vision_description'] = $request->vision_description;
        $data['vision_image'] = $img_url;

        $section = Section::find($request->section_id);
        $section->section_name = $request->section_name;
        $section->section_type = $request->section_type;
        $section->section_value = json_encode($data);
        $section->save();
    }

    public function updateSection(Request $req)
    {
        $input = $req->all();

        if ($input['section_type'] == 'banner') {

            if ($req->banner_image) {

                $data = Section::find($input['section_id'])->toArray();

                if (!empty($req->old_banner_image)) {
                    foreach ($req->old_banner_image as $banner_images) {

                        if (File::exists($banner_images)) {
                            unlink($banner_images);
                        }
                    }
                }

                $imageUrl = $this->bannerImageUpload($req);

                $this->bannerBasicInfoupdate($req, $imageUrl, $input['section_id']);
            } else {

                $imageUrl = $req->old_banner_image;
                $this->bannerBasicInfoupdate($req, $imageUrl, $input['section_id']);
            }
        } else if ($input['section_type'] == 'home_aboutus') {
            // echo '<pre>';
            //echo 'hiii';
            // print_r($req->about_us_image);
            // die();

            if ($req->about_us_image) {

                if (File::exists('admin/image/section/home_about/' . $req->old_about_image)) {
                    unlink('admin/image/section/home_about/' . $req->old_about_image);
                }

                $imageUrl = $this->home_about_image($req);
                $this->home_about_us_update($req, $imageUrl);
            } else {

                $imageUrl = $req->old_about_image;

                $this->home_about_us_update($req, $imageUrl);
            }
        } else if ($input['section_type'] == 'skills') {
            $this->skill_Validate($req);
            $this->sectionSkillsBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'home_faq') {
            $this->faqInfoValidate($req);

            if ($req->faq_image) {

                if (File::exists('admin/image/section/faq-image/' . $req->old_faq_image)) {
                    unlink('admin/image/section/faq-image/' . $req->old_faq_image);
                }

                $imageUrl = $this->faqImageUpload($req);
                $this->sectionFaqBasicInfoUpdate($req, $imageUrl);
            } else {

                $imageUrl = $req->old_faq_image;

                $this->sectionFaqBasicInfoUpdate($req, $imageUrl);
            }
        } else if ($input['section_type'] == 'home_testimonial') {

            $this->home_testimonial_Validate($req);
            $this->sectionTestimonialBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'home_service') {

            $this->home_service_Validate($req);
            $this->sectionHomeServiceBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'home_blog') {

            $this->home_blog_Validate($req);
            $this->sectionHomeBlogBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'home_partner') {

            $this->home_partner_Validate($req);
            $this->sectionHomePartnerBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'home_current_scholarship') {
            $this->home_current_scholarship_update_Validate($req);

            if ($req->current_scholarship_image) {

                $old_image = json_decode($req->old_current_scholarship_image, true);
                // echo '<pre>';
                // print_r($old_image);
                // die();
                if (!empty($old_image)) {
                    foreach ($old_image as $old_images) {
                        if (File::exists('admin/image/section/current_scholarship/' . $old_images)) {
                            unlink('admin/image/section/current_scholarship/' . $old_images);
                        }
                        if (File::exists('admin/image/section/current_scholarship/thumbnail/' . $old_images)) {
                            unlink('admin/image/section/current_scholarship/thumbnail/' . $old_images);
                        }
                    }
                }

                $imageUrl = $this->home_current_scholarship_image($req);

                $this->home_current_scholarship_update($req, $imageUrl);
            } else {

                $imageUrl = json_decode($req->old_current_scholarship_image);
                $this->home_current_scholarship_update($req, $imageUrl);
            }
        } else if ($input['section_type'] == 'about_the_company') {
            $this->about_the_company_update_Validate($req);

            if ($req->company_image) {
                $old_image = json_decode($req->old_company_image, true);

                if (!empty($old_image)) {
                    foreach ($old_image as $old_images) {
                        if (File::exists('admin/image/section/company_image/' . $old_images)) {
                            unlink('admin/image/section/company_image/' . $old_images);
                        }
                        if (File::exists('admin/image/section/company_image/thumbnail/' . $old_images)) {
                            unlink('admin/image/section/company_image/thumbnail/' . $old_images);
                        }
                    }
                }
                $imageUrl = $this->about_company_image($req);
                $this->about_the_company_update($req, $imageUrl);
            } else {
                $imageUrl = json_decode($req->old_company_image);
                $this->about_the_company_update($req, $imageUrl);
            }
        } else if ($input['section_type'] == 'about_director_message') {
            $this->about_director_message_update_Validate($req);

            if ($req->director_image) {
                if ($req->old_director_image != '') {

                    if (File::exists('admin/image/section/director_image/' . $req->old_director_image)) {
                        unlink('admin/image/section/director_image/' . $req->old_director_image);
                    }
                    if (File::exists('admin/image/section/director_image/thumbnail/' . $req->old_director_image)) {
                        unlink('admin/image/section/director_image/thumbnail/' . $req->old_director_image);
                    }
                }
                $imageUrl = $this->about_director_image($req);
                $this->sectionDirectorMessageBasicInfoUpdate($req, $imageUrl);
            } else {
                $imageUrl = $req->old_director_image;
                $this->sectionDirectorMessageBasicInfoUpdate($req, $imageUrl);
            }
        } else if ($input['section_type'] == 'about_our_team') {
            $this->about_our_team_validate($req);
            $this->sectionOurTeamBasicInfoUpdate($req);
        } else if ($input['section_type'] == 'about_vision') {
            $this->about_vision_update_validate($req);
            if ($req->vision_image) {
                if ($req->old_vision_image != '') {

                    if (File::exists('admin/image/section/vision_image/' . $req->old_vision_image)) {
                        unlink('admin/image/section/vision_image/' . $req->old_vision_image);
                    }
                    if (File::exists('admin/image/section/vision_image/thumbnail/' . $req->old_vision_image)) {
                        unlink('admin/image/section/vision_image/thumbnail/' . $req->old_vision_image);
                    }
                }

                $imageUrl = $this->about_vision_image($req);
                $this->sectionAboutVisionBasicInfoUpdate($req, $imageUrl);
            } else {
                $imageUrl = $req->old_vision_image;
                $this->sectionAboutVisionBasicInfoUpdate($req, $imageUrl);
            }
        }

        return redirect()->route('backend.manage-section')->with('success', 'Section has been update successfully !!');
    }
}
