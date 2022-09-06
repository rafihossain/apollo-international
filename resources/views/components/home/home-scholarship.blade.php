@if(isset($scholarship->current_scholarship_image) && $scholarship->current_scholarship_image != '')
<section class=" brand-one-new mt-5 mb-5">
    <div class="container wow fadeInUp" data-wow-delay="100ms">
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <div class="section-title text-left">
                    <h2 class="section-title__title">{{ $scholarship->current_scholarship_title }}</h2>
                </div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 4000 }, "breakpoints": {
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
		                "slidesPerView": 2
		            },
		            "991": {
		                "spaceBetween": 20,
		                "slidesPerView": 3
		            },
		            "1199": {
		                "spaceBetween": 30,
		                "slidesPerView": 3
		            }
		        }}'>
                    <div class="swiper-wrapper">
                        @foreach($scholarship->current_scholarship_image as $scholarship)
                        <div class="swiper-slide">
                            <img class="lazy" data-original="{{ asset($scholarship) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif