@if(isset($testimonial, $testimonials) && $testimonial != '' && $testimonials != '')
<!--Testimonial One Start-->
<section class="testimonial-one">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-one__center">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">{{$testimonial->testimonial_sub_title}}</span>
                        <h2 class="section-title__title">{{$testimonial->testimonial_title}}</h2>
                    </div> 
                </div>
                <div class="row"> 
                    @foreach($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <div class="testimonials-two__card">
                            <div class="testimonials-two__card__inner"> 
                                <div class="testimonials-two__summery">
                                    <!-- <video width="320" height="180" controls>-->
                                    <!--  <source src="{{ asset('admin/image/testimonial')}}/{{$testimonial['testimonial_video']}}" type="video/mp4">-->
                                    <!--  Your browser does not support the video tag.-->
                                    <!--</video>-->
                                  <iframe style="width:100%;" width="560" height="315" src="https://www.youtube.com/embed/{{$testimonial->user_video_url}}?feature=oembed&autoplay=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div><!-- /.testimonials-two__summery -->
                            </div><!-- /.testimonials-two__card__inner -->
                        </div><!-- /.testimonials-two__card -->
                    </div><!-- /.col-md-6 -->
                    @endforeach 
                </div>
        </div>
    </div>
</section>
<!--Testimonial One End-->
@endif