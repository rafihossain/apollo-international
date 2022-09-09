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
use App\Models\ScholarshipModel;

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
        $carrer_section='';
        $franchise_section='';
        
        $scholarship_section='';
        $scategories='';
        
        $metaTitle = $pageModel->meta_title;
        $metaKeyword = $pageModel->meta_key_word;
        $metaDescription = $pageModel->meta_description;
        

        $services = Service::get();
        $scholarships = ScholarshipModel::get();
        $scategories = [];
        for($i=0; $i<count($scholarships); $i++){
            if($scholarships[$i]->category_name == 'australia'){
                $scategories['australia'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'bangladesh'){
                $scategories['bangladesh'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'china'){
                $scategories['china'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'fiji'){
                $scategories['fiji'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'india'){
                $scategories['india'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'malaysia'){
                $scategories['malaysia'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'nepal'){
                $scategories['nepal'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'pakistan'){
                $scategories['pakistan'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }else if($scholarships[$i]->category_name == 'srilanka'){
                $scategories['srilanka'] = ScholarshipModel::where('category_name', $scholarships[$i]->category_name)->get();
            }
        }
        
        
        
        
        $pageSections = $pageModel->page_section;
        
        $sectionType = [];
        foreach($pageSections as $pageSection){
            $section = Section::where('section_name', $pageSection->section)->get()->first();
            
            if(isset($section)){
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
                    
                    $faqconditions = Faq::get();
                    foreach ($faqconditions as $faqcondition){

                        $baseUrl = $_SERVER['HTTP_HOST'];
                        if($faqcondition->country == 0) {
                            $faqs = Faq::take($count)->where('country', 0)->get();
                        }
                        if($faqcondition->country == 1 && $baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"){
                            $faqs = Faq::take($count)->where('country', 1)->get();
                        }
                        if($faqcondition->country == 2 && $baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"){
                            $faqs = Faq::take($count)->where('country', 2)->get();
                        }
                        
                    }
                    
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
                }else if($section->section_type == 'carrer_section'){
                    $carrer_section=$section->section_value;
                }else if($section->section_type == 'franchise_section'){
                    $franchise_section=$section->section_value;
                }else if($section->section_type == 'scholarship_section'){
                    $scholarship_section=$section->section_value;
                }
            }

        }
        // $allpartners = Partner::where('partner_category', '!=', 'accreditation')->get();
         $allpartners = Partner::orderBy('partner_sorting', 'DESC')->get();
        // dd($partners);
        
        return [
            'faq' => $faq,
            'team' => $team,
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
            'teamSections' => $teamSections,
            'metaTitle' => $metaTitle,
            'metaKeyword' => $metaKeyword,
            'metaDescription' => $metaDescription,
            'carrerSection'=>$carrer_section,
            'franchiseSection'=>$franchise_section,
            'allpartners'=>$allpartners,
            'scholarship_section'=>$scholarship_section,
            'scategories'=>$scategories,
        ];



    }

}