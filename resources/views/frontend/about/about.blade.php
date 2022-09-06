@extends('frontend.layouts.app')

@section('content') 

<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><span>.</span></li>
                <li>About Us</li>
            </ul>
            <h2>About Us</h2>
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
                <x-home.home-scholarship :scholarship="$scholarship->current_scholarship_image" />
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

            @default
                {{ "wrong" }}
        @endswitch
    @endfor
 

@endsection
