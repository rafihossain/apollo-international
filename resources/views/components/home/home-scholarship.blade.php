@if(isset($scholarship) && $scholarship != '')
<section class=" brand-one-new mt-5 mb-5">
    <div class="container wow fadeInUp" data-wow-delay="100ms">
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                <div class="section-title text-left">
                    <h2 class="section-title__title">{{ $scholarship->current_scholarship_title }}</h2>
                </div>
                	@php
						$baseUrl = $_SERVER['HTTP_HOST'];
					@endphp
				 @if( $baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au" )
                <div  style="padding-left:30px; padding-right:30px; " class="thm-swiper__slider swiper-container" data-swiper-options='{
                                "spaceBetween": 100, 
                                "slidesPerView": 3, 
                                "autoplay": { "delay": 4000 }, 
                                "navigation": {
                                    "nextEl": "#scholarship__swiper-button-next",
                                    "prevEl": "#scholarship__swiper-button-prev"
                                },
                                "breakpoints": {
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
                    	@endif
                    		@if( $baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd")
                <div  style="padding-left:30px; padding-right:30px; " class="thm-swiper__slider swiper-container" data-swiper-options='{
                                "spaceBetween": 100, 
                                "slidesPerView": 3, 
                                "autoplay": { "delay": 4000 }, 
                                "navigation": {
                                    "nextEl": "#scholarship__swiper-button-next",
                                    "prevEl": "#scholarship__swiper-button-prev"
                                },
                                "breakpoints": {
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
                    	@endif
                    
                    <div class="swiper-wrapper">
                        @foreach($scholarship->current_scholarship_image as $scholarship)
						
						
							@if($scholarship->country == 1 && ($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"))
								<div class="swiper-slide">
									<img src="{{ asset('admin/image/section/current_scholarship/'.$scholarship->name) }}" alt="">
								</div>
							@endif
							
							@if($scholarship->country == 2 && ($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"))
								<div class="swiper-slide">
									<img src="{{ asset('admin/image/section/current_scholarship/'.$scholarship->name) }}" alt="">
								</div>
							@endif

                        @endforeach
                    </div>
                    <div class="patner_nav clearfix"> 
    					<div class="patner-slider__nav">
    						<div class="swiper-button-prev" id="scholarship__swiper-button-next">  </div>
    						<div class="swiper-button-next" id="scholarship__swiper-button-prev"> </div>
    					</div>
    				 
    				</div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif