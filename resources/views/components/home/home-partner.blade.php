@if(isset($partners) && $partners != '')
<!--Brand Two-->
<section class="brand-one">
    <div class="container wow fadeInUp" data-wow-delay="100ms">
        <div class="mb-5">
            <h1 class="section-title__title_large">Our Valued Partners</h1>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
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
			                "slidesPerView": 3
			            }
			        }}'>
                    <div class="swiper-wrapper">

                        @foreach($partners['australia'] as $australia)
                        <div class="swiper-slide">
                            <img src="{{ asset($australia->partner_image) }}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-title text-left">
                    <h2 class="section-title__title">Canada</h2>
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
			                "slidesPerView": 3
			            },
			            "1199": {
			                "spaceBetween": 30,
			                "slidesPerView": 3
			            }
			        }}'>
                    <div class="swiper-wrapper">

                        @foreach($partners['canada'] as $canada)
                        <div class="swiper-slide">
                            <img src="{{ asset($canada->partner_image) }}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <div class="section-title text-left">
                    <h2 class="section-title__title">Professional Year Partners</h2>
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

                        @foreach($partners['partner'] as $partner)
                        <div class="swiper-slide">
                            <img src="{{ asset($partner->partner_image) }}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-title text-left">
                    <h2 class="section-title__title">Health Insurance</h2>
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

                        @foreach($partners['health'] as $health)
                        <div class="swiper-slide">
                            <img src="{{ asset($health->partner_image) }}" alt="">
                        </div>
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

                        @foreach($partners['accreditation'] as $accreditation)
                        <div class="swiper-slide">
                            <img src="{{ asset($accreditation->partner_image) }}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Brand Two End-->
@endif