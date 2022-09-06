@extends('frontend.layouts.app')

@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>.</span></li>
                <li>Testmonial</li>
            </ul>
            <h2>Testmonial</h2>
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
                                <img src="{{ asset($testimonial->user_image) }}" alt="" width="60" height="60">
                            </div><!-- /.testimonials-two__image -->
                            <div class="testimonial-two__meta__content">
                                <h3 class="testimonials-two__name">{{ $testimonial->user_name }}</h3>
                                <!-- /.testimonials-two__name -->
                                <p class="testimonials-two__designation">Customer</p>
                                <!-- /.testimonials-two__designation -->
                            </div><!-- /.testimonial-two__meta__content -->
                        </div><!-- /.testimonials-two__meta -->
                        <div class="testimonials-two__summery">
                            {!! $testimonial->user_comment !!}
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