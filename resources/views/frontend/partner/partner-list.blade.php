@extends('frontend.layouts.app')

@section('title',html_entity_decode($other['meta_title']))
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/resources/our-Partners-Bar.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Our Partners</h2>
        </div>
    </div>
</section>
 @php
   //$baseUrl = url('/');
   $baseUrl = $_SERVER['HTTP_HOST'];
@endphp
<!--Page Header End-->
 <!--FAQs Page Start-->
    <section class="brand-one">
        <div class="faqs-page-bg" style="background-image: url({{ asset('frontend/assets/images/backgrounds/faqs-page-bg.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="faqs-page__single ">
                        <div class="mb-5">
                            <h1 class="section-title__title_large">Our Valued Partners</h1>
                        </div>
                        <div class="row mt-5 mb-5">
                             @if($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au")
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title">Australia</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                			                "slidesPerView": 2
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'australia')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd")
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title">Australia</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                			                "slidesPerView": 2
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'australia')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title mt-5 mb-2">Canada</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 100, "autoplay": { "delay": 4500 }, "breakpoints": {
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
                			                "slidesPerView": 2
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
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'canada')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title mt-5 mb-2">USA</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                			                "slidesPerView": 2
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'usa')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title  mt-5 mb-2">UK</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                			                "slidesPerView": 2
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'uk')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title  mt-5 mb-2">Malaysia</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                			                "slidesPerView": 2
                			            },
                			            "991": {
                			                "spaceBetween": 20,
                			                "slidesPerView": 3
                			            },
                			            "1199": {
                			                "spaceBetween": 30,
                			                "slidesPerView": 4
                			            }
                			        }}'>
                                    <div class="swiper-wrapper">
                
                                        @foreach($partners as $partner)
                							@if($partner->partner_category == 'malaysia')
                							<div class="swiper-slide">
                								<img src="{{ asset($partner->partner_image) }}" alt="">
                							</div>
                							@endif
                                        @endforeach
                
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title mt-5 mb-2">Professional Year Partners</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 5000 }, "breakpoints": {
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
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title  mt-5 mb-2 ">Health Insurance</h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 5000 }, "breakpoints": {
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
                        <div class="row mt-5 mb-5">
                            <div class="col-md-12">
                                <div class="section-title text-left">
                                    <h2 class="section-title__title">Professional Accreditation </h2>
                                </div>
                                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 20, "autoplay": { "delay": 4000 }, "breakpoints": {
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
                		                "spaceBetween": 50,
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
                
                                       @foreach($partners as $partner)
                							@if($partner->partner_category == 'accreditation')
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
                </div>
               
            </div>
        </div>
    </section>
    <!--FAQs Page End-->
@endsection