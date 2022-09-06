<?php

namespace App\Traits;

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

trait PageComponentTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function PageComponentSection($pageModel) {
        
        $bannerlist = '';
        $homeAboutUs = '';
        $skill = '';
        $faqs = '';
        $faq = '';
        $testimonial = '';
        $testimonials = '';
        $service = '';
        $serviceSections = '';
        $blog = '';
        $blogSections = '';
        $partners = '';
        $scholarship = '';
        $sectionType = '';

        $aboutCompany = '';
        $directorMessage = '';
        $aboutVision = '';
        $team = '';
        $teamSections = '';

        $services = Service::get();
        $pageSections = $pageModel->page_section;

        $sectionType = [];
        foreach($pageSections as $pageSection){
            
            $section = Section::where('section_name', $pageSection->section)->get()->first();
            $sectionType[] = $section->section_type;

            if($section->section_type == 'banner'){
                $bannerlist = json_decode($section->section_value);
                // echo "<pre>"; print_r($bannerlist); die();
            }else if($section->section_type == 'home_aboutus'){
                $homeAboutUs = json_decode($section->section_value);
            }else if($section->section_type == 'skills'){
                $skill = json_decode($section->section_value);
            }else if($section->section_type == 'home_faq'){
                $faq = json_decode($section->section_value);
                $count = $faq->number_of_faq;
                $faqs = Faq::take($count)->get();
            }else if($section->section_type == 'home_testimonial'){
                $testimonial = json_decode($section->section_value);
                $count = $testimonial->testimonial_no;
                $testimonials = Testimonial::take($count)->get();
            }else if($section->section_type == 'home_service'){
                $service = json_decode($section->section_value);
                $count = $service->no_of_service;
                $serviceSections = Service::take($count)->get();
            }else if($section->section_type == 'home_blog'){
                $blog = json_decode($section->section_value);
                $count = $blog->no_of_blog;
                $blogSections = Blog::take($count)->get();
            }else if($section->section_type == 'home_partner'){
                $partner = json_decode($section->section_value);

                $partners = [];
                for($i=0; $i<count($partner->partner_category); $i++){
                    // $partners[$i]['category_name'] = $partner->partner_category[$i]; 
                    // $partners[$i]['number_of_partner'] = $partner->no_of_partner[$i];

                    if($partner->partner_category[$i] == 'partner'){
                        $partners['partner'] = Partner::where('partner_category', $partner->partner_category[$i])
                                                            ->take($partner->no_of_partner[$i])->get();
                    }else if($partner->partner_category[$i] == 'health'){
                        $partners['health'] = Partner::where('partner_category', $partner->partner_category[$i])
                                                            ->take($partner->no_of_partner[$i])->get();
                    }else if($partner->partner_category[$i] == 'australia'){
                        $partners['australia'] = Partner::where('partner_category', $partner->partner_category[$i])
                                                            ->take($partner->no_of_partner[$i])->get();
                    }else if($partner->partner_category[$i] == 'canada'){
                        $partners['canada'] = Partner::where('partner_category', $partner->partner_category[$i])
                                                            ->take($partner->no_of_partner[$i])->get();
                    }else if($partner->partner_category[$i] == 'accreditation'){
                        $partners['accreditation'] = Partner::where('partner_category', $partner->partner_category[$i])
                                                            ->take($partner->no_of_partner[$i])->get();
                    }
                }
                // dd($partners);

            }else if($section->section_type == 'home_current_scholarship'){
                $scholarship = json_decode($section->section_value);
            }else if($section->section_type == 'about_the_company'){
                $aboutCompany = json_decode($section->section_value);
            }else if($section->section_type == 'about_director_message'){
                $directorMessage = json_decode($section->section_value);
            }else if($section->section_type == 'about_vision'){
                $aboutVision = json_decode($section->section_value);
            }else if($section->section_type == 'about_our_team'){
                $team = json_decode($section->section_value);
                $count = $team->no_of_team;
                $teamSections = OurTeam::take($count)->get();
            }

        }
        
        return [
            'faq' => $faq,
            'faqs' => $faqs,
            'blog' => $blog,
            'skill' => $skill,
            'service' => $service,
            'services' => $services,
            'partners' => $partners,
            'bannerlist' => $bannerlist,
            'homeAboutUs' => $homeAboutUs,
            'testimonial' => $testimonial,
            'testimonials' => $testimonials,
            'blogSections' => $blogSections,
            'scholarship' => $scholarship,
            'serviceSections' => $serviceSections,
            'sectionType' => $sectionType,
            'aboutCompany' => $aboutCompany,
            'directorMessage' => $directorMessage,
            'aboutVision' => $aboutVision,
            'team' => $team,
            'teamSections' => $teamSections,
        ];



    }

}