@if(isset($aboutCompany) && $aboutCompany != '')
<!--Reasons Start-->
<section class="reasons">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 ">
                <div class=" position-sticky top-0">
                    <div class="thm-swiper__slider swiper-container mb-4" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 4000 }, "breakpoints": {
                        "0": {
                            "spaceBetween": 10,
                            "slidesPerView": 1
                        },
                        "375": {
                            "spaceBetween": 10,
                            "slidesPerView": 1
                        },
                        "575": {
                            "spaceBetween": 10,
                            "slidesPerView": 1
                        },
                        "767": {
                            "spaceBetween": 20,
                            "slidesPerView": 1
                        },
                        "991": {
                            "spaceBetween": 20,
                            "slidesPerView": 1
                        },
                        "1199": {
                            "spaceBetween": 30,
                            "slidesPerView": 1
                        }
                    }}'>
                        <div class="swiper-wrapper">

                            @foreach($aboutCompany->company_image as $company)
                            <div class="swiper-slide">
                                <img class="lazy  img-fluid" data-original="{{ asset('admin/image/section/company_image')}}/{{$company}}" alt="">
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class=" text-wrap ">
                        <strong>{{ $aboutCompany->company_title }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="reasons__right aboutcompany text-justify">
                    {!! $aboutCompany->company_description !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--Reasons End-->
@endif