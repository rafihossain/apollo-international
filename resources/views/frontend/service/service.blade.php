@extends('frontend.layouts.app')
@section('content')
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Services</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<section class="blog-one blog-grid">
    <div class="container">
        <div class="row">
            
            @foreach($services as $service)
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <!--Portfolio One Single-->
                <div class="portfolio-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="portfolio-one__img">
                        <img src="{{ asset($service->service_image) }}" width="370" height="500" alt="">
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

            @if($services->hasPages())
                <div class="text-center m-3">
                    @if($services->onFirstPage())
                        <span href="{{ $services->previousPageUrl() }}"><span class="fw-bold fs-4">&#x276C; &#x276C; Previous</span></span>
                    @else
                        <a href="{{ $services->previousPageUrl() }}"><span class="fw-bold fs-4">&#x276C; &#x276C; Previous</span></a>
                    @endif

                    &nbsp;

                    @if($services->hasMorePages())
                        <a href="{{ $services->nextPageUrl() }}"><span class="fw-bold fs-4">Next &#x276D; &#x276D;</span></a>
                    @else
                        <span href="{{ $services->nextPageUrl() }}"><span class="fw-bold fs-4">Next &#x276D; &#x276D;</span></span>
                    @endif
                </div>
            @endif

        </div>
    </div>
</section>
<!--Testimonial One Start-->
<section class="testimonial-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="testimonial-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Customer feedback</span>
                        <h2 class="section-title__title">What they are talking about us?</h2>
                    </div>
                    <div class="testimonial-one__btn-box">
                        <a href="about.html" class="thm-btn testimonial-one__btn"><span>All feedbacks</span></a>
                        <div class="testimonial-one__btn-shape"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="testimonial-one__slider">


                    <div class="swiper-container" id="testimonials-one__thumb">
                        <div class="swiper-wrapper">
                            
                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-one__img-holder">
                                    <img src="{{ asset($testimonial->user_image) }}" height="100" alt="">
                                    <div class="testimonial-one__quote">

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div><!-- /.swiper-wrapper -->
                    </div><!-- /#testimonials-one__thumb.swiper-container -->

                    <div class="testimonials-one__main-content">
                        <div class="swiper-container" id="testimonials-one__carousel">
                            <div class="swiper-wrapper">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-one__conent-box">
                                            <p class="testimonial-one__text">{!! $testimonial->user_comment !!}</p>
                                            <div class="testimonial-one__client-details">
                                                <h4 class="testimonial-one__client-name">{{ $testimonial->user_name }}</h4>
                                                <span class="testimonial-one__clinet-title">Satisfied
                                                    customers</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="testimonials-one__carousel-pagination"></div>
                            <!-- /#testimonials-one__carousel-pagination -->
                        </div><!-- /#testimonials-one__thumb.swiper-container -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonial One End-->
<!--Brand Two-->
<section class="brand-one">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title text-left">
                    <h2 class="section-title__title">Professional Year Partners</h2>
                </div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
			            "0": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "375": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "575": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "767": {
			                "spaceBetween": 50,
			                "slidesPerView": 2
			            },
			            "991": {
			                "spaceBetween": 50,
			                "slidesPerView": 3
			            },
			            "1199": {
			                "spaceBetween": 100,
			                "slidesPerView": 3
			            }
			        }}'>
                    <div class="swiper-wrapper">

                        @foreach($partners as $partner)
                            @if($partner->partner_category == 'partner')
                                <div class="swiper-slide">
                                    <img src="{{ asset($partner->partner_image) }}" alt="">
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-title text-left">
                    <h2 class="section-title__title">Health Insurance</h2>
                </div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
			            "0": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "375": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "575": {
			                "spaceBetween": 30,
			                "slidesPerView": 2
			            },
			            "767": {
			                "spaceBetween": 50,
			                "slidesPerView": 2
			            },
			            "991": {
			                "spaceBetween": 50,
			                "slidesPerView": 3
			            },
			            "1199": {
			                "spaceBetween": 100,
			                "slidesPerView": 3
			            }
			        }}'>
                    <div class="swiper-wrapper">
                        @foreach($partners as $partner)
                            @if($partner->partner_category == 'health')
                                <div class="swiper-slide">
                                    <img src="{{ asset($partner->partner_image) }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand Two End-->
@endsection