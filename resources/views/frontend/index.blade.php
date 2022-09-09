@extends('frontend.layouts.app')

@section('title',html_entity_decode($metaTitle))
@section('description', $metaKeyword)
@section('keywords', $metaDescription)

@section('content')

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
       
                
                @if(isset($allpartners) && $allpartners != '')
                <!--Brand Two-->
                <section class="brand-one">
                    <div class="container wow fadeInUp" data-wow-delay="100ms">
                     
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Our Partners</span>
                            <h2 class="section-title__title">Our Valued Partners</h2>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                              
                                <div class="thm-swiper__slider swiper-container" allowSlideNext='true' data-swiper-options='{
                                "spaceBetween": 100, 
                                "slidesPerView": 3, 
                                "autoplay": { "delay": 4000 }, 
                                "navigation": {
                                    "nextEl": "#partner__swiper-button-next",
                                    "prevEl": "#partner__swiper-button-prev"
                                },
                                "breakpoints": {
                			            "0": {
                			                "spaceBetween": 10,
                			                "slidesPerView": 2
                			            },
                			            "375": {
                			                "spaceBetween": 10,
                			                "slidesPerView": 2
                			            },
                			            "575": {
                			                "spaceBetween": 10,
                			                "slidesPerView": 2
                			            },
                			            "767": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 4
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($allpartners as $allpartner)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($allpartner->partner_image) }}" alt="">
                                        </div>
                                        @endforeach
                
                                    </div>
                                    <div class="patner_nav clearfix"> 
                    					<div class="patner-slider__nav">
                    						<div class="swiper-button-prev" id="partner__swiper-button-next">  </div>
                    						<div class="swiper-button-next" id="partner__swiper-button-prev"> </div>
                    					</div>
                    				 
                    				</div>
                                </div>
                                <br/>
                                <div class="text-center mt-3">
                                    <a href="{{ url('/partner') }}" class="thm-btn ml-2">  All Partners </a>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                </section>
                <!--Brand Two End-->
                @endif
                
                
                
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