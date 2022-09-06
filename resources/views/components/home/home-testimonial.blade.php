@if(isset($testimonial, $testimonials) && $testimonial != '' && $testimonials != '')
<!--Testimonial One Start-->
<section class="testimonial-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="testimonial-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{$testimonial->testimonial_sub_title}}</span>
                        <h2 class="section-title__title">{{$testimonial->testimonial_title}}</h2>
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
                                    <img class="lazy" data-original="{{ asset($testimonial->user_image) }}" alt="">
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
                                        <p class="testimonial-one__text">{!!$testimonial->user_comment!!}</p>
                                        <div class="testimonial-one__client-details">
                                            <h4 class="testimonial-one__client-name">{{$testimonial->user_name}}</h4>
                                            <span class="testimonial-one__clinet-title">Satisfied
                                                customers</span>
                                        </div>
                                    </div>
                                </div><!-- /.swiper-slide -->
                            @endforeach
                        
                            </div><!-- /.swiper-wrapper -->
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
@endif