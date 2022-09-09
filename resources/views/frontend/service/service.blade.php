@extends('frontend.layouts.app')

@section('title',html_entity_decode($metaTitle))
@section('keywords', $metaKeyword)
@section('description', $metaDescription)

@section('content')
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/header/Our-Service.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Services</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
@if(isset($service_list) && $service_list != '')
<section class="blog-one blog-grid">
    <div class="container">
        <div class="row">
            
            @foreach($service_list as $service)
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <!--Portfolio One Single-->
                <div class="portfolio-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="portfolio-one__img">
                        <img src="{{ asset($service->service_image) }}" width="370" height="425" alt="">
                        <div class="portfolio-one__experience">
                            <div class="portfolio-one__fimlor">
                                <p class="portfolio-one__fimlor-title"><a href="{{ route('frontend.details-service', ['slug' => $service->service_slug]) }}">{{ $service->service_title }}</a></p>
                            </div>
                        </div>
                        <div class="portfolio-one__arrow">
                            <a href="{{ route('frontend.details-service', ['slug' => $service->service_slug]) }}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if($service_list->hasPages())
                <div class="text-center m-3">
                    @if($service_list->onFirstPage())
                        <span href="{{ $service_list->previousPageUrl() }}"><span class="fw-bold fs-4">&#x276C; &#x276C; Previous</span></span>
                    @else
                        <a href="{{ $service_list->previousPageUrl() }}"><span class="fw-bold fs-4">&#x276C; &#x276C; Previous</span></a>
                    @endif

                    &nbsp;

                    @if($service_list->hasMorePages())
                        <a href="{{ $service_list->nextPageUrl() }}"><span class="fw-bold fs-4">Next &#x276D; &#x276D;</span></a>
                    @else
                        <span href="{{ $service_list->nextPageUrl() }}"><span class="fw-bold fs-4">Next &#x276D; &#x276D;</span></span>
                    @endif
                </div>
            @endif

        </div>
    </div>
</section>
@endif

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
            <x-home.home-scholarship :scholarship="$scholarship" />
            @break
        @case ("about_the_company")
            <x-about.about-company :aboutCompany="$aboutCompany" />
            @break
        @case ("about_director_message")
            <x-about.director_messages :directorMessage="$directorMessage"/>
            @break
        @case ("about_our_team")
            <x-about.mission-vision :aboutVision="$aboutVision" />
            @break
        @case ("about_vision")
            <x-about.our-leaders :teamSections="$teamSections" :team="$team" />
            @break

        @default
            {{ "wrong" }}
    @endswitch
@endfor

@endsection