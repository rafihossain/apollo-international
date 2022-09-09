@extends('frontend.layouts.app')
@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/resources/Study-Abroad-Landing-Page.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Study Abroad</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
 <!--FAQs Page Start-->
    <section class="faqs-page">
        <div class="faqs-page-bg" style="background-image: url({{ asset('frontend/assets/images/backgrounds/faqs-page-bg.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="faqs-page__single">
                        <div class="row">
                            
                            @foreach($studyabroads as $studyabroad)
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <!--Portfolio One Single-->
                                <div class="portfolio-one__single wow fadeInUp" data-wow-delay="100ms">
                                    <div class="portfolio-one__img">
                                        <img src="{{ asset($studyabroad->studyabroad_image) }}" width="370" height="425" alt="">
                                        <div class="portfolio-one__experience">
                                            <div class="portfolio-one__fimlor">
                                                <p class="portfolio-one__fimlor-title"><a href="{{ route('frontend.details-studyabroad', ['slug' => $studyabroad->studyabroad_slug]) }}">{{ $studyabroad->title }}</a></p>
                                            </div>
                                        </div>
                                        <div class="portfolio-one__arrow">
                                            <a href="{{ route('frontend.details-studyabroad', ['slug' => $studyabroad->studyabroad_slug]) }}"><span class="icon-right-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!--FAQs Page End-->
@endsection