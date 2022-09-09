@extends('frontend.layouts.app')

@section('content')

<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('/frontend/assets/images/resources/Scholarship-Landing-Bule-Page.jpg') }})">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Scholarships</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

    @for ($i = 0; $i < count($sectionType); $i++)
        @switch ($sectionType[$i])
            @case ("banner")
                <x-home.home-banner-section :bannerlist="$bannerlist"/>
                @break
            @case ("occupation_search")
                 <x-home.home-calculation /> 
                @break
            @case ("home_aboutus")
                <x-home.home-about-us :homeAboutUs="$homeAboutUs"/>
                @break
            @case ("skills")
                <x-home.home-skill :skill="$skill"/>
                @break
            @case ("home_faq")
                <x-home.home-faq :faq="$faq" :faqs="$faqs" />
                @break
            @case ("home_testimonial")
                <x-home.home-testimonial :testimonial="$testimonial" :testimonials="$testimonials" />
                @break
            @case ("home_service")
                <x-home.home-service :service="$service" :serviceSections="$serviceSections" />
                @break
            @case ("home_blog")
                <x-home.home-blog :blog="$blog" :blogSections="$blogSections" />
                @break
            @case ("home_partner")
                <x-home.home-partner :partners="$partners" />
                @break
            @case ("home_current_scholarship")
                
                @if(isset($scholarship) && $scholarship != '')
                <section class=" brand-one-new mt-5 mb-5">
                    <div class="container wow fadeInUp" data-wow-delay="100ms">
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                <div class="row  mb-5">
                                     @foreach($scholarship->current_scholarship_image as $scholarship)
                                     
                                    	@php
							            $baseUrl = $_SERVER['HTTP_HOST'];
            							@endphp
            							@if($scholarship->country == 1 && ($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"))
                                            <div class="col-6 col-sm-4 col-md-4 mb-4">
                                                <a href="{{ url('/booking') }}">
                                                    <img  src="{{ asset('admin/image/section/current_scholarship/'.$scholarship->name) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
            							@endif
            							@if($scholarship->country == 2 && ($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"))
            								<div class="col-6 col-sm-4 col-md-4 mb-4">
                                                <a href="{{ url('/booking') }}">
                                                    <img  src="{{ asset('admin/image/section/current_scholarship/'.$scholarship->name) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
            							@endif
                                     
                                     
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="sidebar">
                                    <div class="text-center bg-light rounded overflow-hidden mb-4">
                                        <img src="{{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }}" class="img-fluid">
                
                                        <div class="p-3">
                                            <h5>Book a FREE Consultation Today!</h5>
                                            <p>Schedule an appointment with one of our expert counsellors and get up-to-date Information of your next admission and visa enquiries</p>
                
                                            <a href="{{ url('/booking') }}" class="thm-btn">Book an Appoinment</a>
                                        </div>
                                    </div>
                
                                    <div>
                                        <img src="{{ asset('frontend/assets/images/resources/Education-Counselling-Process_Apollo-International-410x1024-1-1.png') }}" class="img-fluid">
                                    </div>
                
                
                                </div>
                            </div>
                        
                    </div>
                </section>
                @endif
                
                @break
            @case ("about_the_company")
                <x-about.about-company :aboutCompany="$aboutCompany" />
                @break
            @case ("about_director_message")
                <x-about.director_messages :directorMessage="$directorMessage"/>
                @break
            @case ("about_vision")
                <x-about.mission-vision :aboutVision="$aboutVision" />
                @break
            @case ("about_our_team")
                <x-about.our-leaders :teamSections="$teamSections" :team="$team" />
                @break
            @case ("scholarship_section")

                <!--Service Details Start-->
                <section class="reasons">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="blgo-details__left"> 
                                    <div class="blog-details__content">
                                        <p class="blog-details__text-1">{!! $scholarship_section !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Service Details End-->

                @break

            @default
                {{ "wrong" }}
        @endswitch
    @endfor

    @if(isset($scategories) && $scategories != '')


@endif

@endsection