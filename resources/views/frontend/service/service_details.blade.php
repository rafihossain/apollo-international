@extends('frontend.layouts.app')
@section('title', $service->meta_title)
@section('description', $service->meta_description)
@section('keywords', $service->meta_keywords)

@section('content')

<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset($service->service_image) }})">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{$service->service_title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Blog Details Start-->
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blgo-details__left">
                    <div class="blog-details__img">
                        <img src="{{ asset($service->service_image) }}" alt="">
                    </div>
                    <div class="blog-details__content">
                        <p class="blog-details__text-1">{!!$service->service_description!!}</p>

                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="text-center bg-light rounded overflow-hidden mb-4">
                        <img src="{{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }}" class="img-fluid">

                        <div class="p-3">
                            <h5>Book a FREE Consultation Today!</h5>
                            <p>Schedule an appointment with one of our expert counsellors and get up-to-date infoformation of your next admission and visa enquiries</p>

                            <a href="{{ url('/booking') }}" class="thm-btn">Book an Appoinment</a>
                        </div>
                    </div>

                    <div>
                        <img src="{{ asset('frontend/assets/images/resources/Education-Counselling-Process_Apollo-International-410x1024-1-1.png') }}" class="img-fluid">
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Details End-->
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
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/arc.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/atmc.gif') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/navitas.gif') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/Untitled-design-8.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/Untitled-design-92.png') }}" alt="">
                        </div><!-- /.swiper-slide -->

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
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/2.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/3.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/4.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('frontend/assets/images/brand/5.png') }}" alt="">
                        </div><!-- /.swiper-slide -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand Two End-->
@endsection