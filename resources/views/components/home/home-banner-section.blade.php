<div>
    @if(isset($bannerlist) && $bannerlist != '')
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
		    "effect": "fade",
		     "pagination": {
		        "el": "#main-slider-pagination",
		        "type": "bullets",
		        "clickable": true
		      },
		    "navigation": {
		        "nextEl": "#main-slider__swiper-button-next",
		        "prevEl": "#main-slider__swiper-button-prev"
		    },
		    "autoplay": {
		        "delay": 7000
		    }}'>
            <div class="swiper-wrapper">

                @foreach($bannerlist as $key=>$banner)
                
                
                @php
                $baseUrl = $_SERVER['HTTP_HOST'];
                @endphp
                
                @if($banner->country == 0)
                <div class="swiper-slide bannercount{{$key}}">
                    <div class="image-layer" style="background-image: url({{ asset($banner->banner_image) }})">
                    </div>

                    <div class="image-layer-overlay"></div>
                  
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">

                                    <p>{{ $banner->banner_title }}</p>
                                    <h2>{{ $banner->banner_content }}</h2>
                                    @if($banner->banner_link)
                                        <a href="{{ $banner->banner_link }}" class="thm-btn"><span>Book an Appointment </span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($banner->country == 1 && ($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"))
                <div class="swiper-slide bannercount{{$key}}">
                    <div class="image-layer" style="background-image: url({{ asset($banner->banner_image) }})">
                    </div>

                    <div class="image-layer-overlay"></div>
                  
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">

                                    <p>{{ $banner->banner_title }}</p>
                                    <h2>{{ $banner->banner_content }}</h2>
                                    @if($banner->banner_link)
                                        <a href="{{ $banner->banner_link }}" class="thm-btn"><span>Book an Appointment </span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($banner->country == 2 && ($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"))
                <div class="swiper-slide bannercount{{$key}}">
                    <div class="image-layer" style="background-image: url({{ asset($banner->banner_image) }})">
                    </div>

                    <div class="image-layer-overlay"></div>
                  
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">

                                    <p>{{ $banner->banner_title }}</p>
                                    <h2>{{ $banner->banner_content }}</h2>
                                    @if($banner->banner_link)
                                        <a href="{{ $banner->banner_link }}" class="thm-btn"><span>Book an Appointment </span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                
                
                @endforeach

            </div>
            <!-- If we need navigation buttons -->
            <div class="slider-bottom-box clearfix">

                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="icon-right-arrow icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="icon-right-arrow"></i>
                    </div>
                </div>
                <div class="swiper-pagination" id="main-slider-pagination"></div>
            </div>
        </div>
    </section>
    @endif
</div>