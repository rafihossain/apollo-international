@extends('frontend.layouts.app')

@section('title', $other['meta_title'])
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/header/Testimonial.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Testimonials</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<section class="testimonials-two">
    <div class="container">
        <div class="row">

            @foreach($testimonials as $testimonial)
            <div class="col-md-6 col-lg-4">
                <div class="testimonials-two__card">
                    <div class="testimonials-two__card__inner">
                        <div class="testimonials-two__meta">
                            <div class="testimonials-two__image">
                                <img src="{{ asset($testimonial->user_image) }}" alt="" width="80" height="80">
                            </div><!-- /.testimonials-two__image -->
                            <div class="testimonial-two__meta__content">
                                <h3 class="testimonials-two__name">{{ $testimonial->user_name }}</h3>
                                <!-- /.testimonials-two__name -->
                                <p class="testimonials-two__designation">Customer</p>
                                
                                @if($testimonial->user_rating == 5)
                                <span class="ratting">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </span>
                                @elseif($testimonial->user_rating == 4)
                                <span class="ratting">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star"></i> 
                                </span>
                                @elseif($testimonial->user_rating == 3)
                                <span class="ratting">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                @elseif($testimonial->user_rating == 2)
                                <span class="ratting">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> 
                                </span>
                                @elseif($testimonial->user_rating == 1)
                                <span class="ratting">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                @else
                                <span class="badge bg-primary rounded-pill fw-4 p-1">No Rating Found!!</span>
                                @endif 
                                
                                <!-- /.testimonials-two__designation -->
                            </div><!-- /.testimonial-two__meta__content -->
                        </div><!-- /.testimonials-two__meta -->
                        <div class="testimonials-two__summery">
                            <!-- <video width="320" height="240" controls>-->
                            <!--  <source src="{{ asset('admin/image/testimonial')}}/{{$testimonial['testimonial_video']}}" type="video/mp4">-->
                            <!--  Your browser does not support the video tag.-->
                            <!--</video>-->
                            <iframe style="width:100%;" width="560" height="315" src="https://www.youtube.com/embed/{{$testimonial->user_video_url}}?feature=oembed&autoplay=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          
                        </div><!-- /.testimonials-two__summery -->
                    </div><!-- /.testimonials-two__card__inner -->
                </div><!-- /.testimonials-two__card -->
            </div><!-- /.col-md-6 -->
            @endforeach

            @if($testimonials->hasPages())
            <div class="text-center m-3">
                @if($testimonials->onFirstPage())
                    <span href="{{ $testimonials->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></span>
                @else
                    <a href="{{ $testimonials->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></a>
                @endif

                &nbsp; &nbsp;

                @if($testimonials->hasMorePages())
                    <a href="{{ $testimonials->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></a>
                @else
                    <span href="{{ $testimonials->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></span>
                @endif
            </div>
            @endif

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.testimonials-two -->
@endsection