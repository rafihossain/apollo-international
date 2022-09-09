@if(isset($service, $serviceSections) && $service != '' && $serviceSections != '')
<!--Portfolio One Start-->
<section class="portfolio-one">
    <div class="portfolio-one__container">
        <div class="section-title text-center ">
            <span class="section-title__tagline">{{ $service->service_sub_title }}</span>
            <h2 class="section-title__title">{{ $service->service_title }}</h2>
        </div>

        <div class="row">
            @foreach($serviceSections as $serviceSection)
            <div class="col-xl-3 col-lg-6 col-md-6  ">
                <!--Portfolio One Single-->
                <div class="portfolio-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="portfolio-one__img">
                        <img class="lazy" data-original="{{ asset($serviceSection->service_image) }}" alt="" width="307" height="354">
                        <div class="portfolio-one__experience">
                            <div class="portfolio-one__fimlor">
                                <p class="portfolio-one__fimlor-title"><a href="{{ route('frontend.details-service', ['slug' => $serviceSection->service_slug]) }}">{{ $serviceSection->service_title }}</a></p>
                            </div>
                        </div>
                        <div class="portfolio-one__arrow">
                            <a href="{{ route('frontend.details-service', ['slug' => $serviceSection->service_slug]) }}"><span class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--Portfolio One End-->
@endif