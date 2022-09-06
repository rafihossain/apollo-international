@if(isset($homeAboutUs) && $homeAboutUs != '')
<!--Welcome One Start-->
<section class="welcome-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="welcome-one__left wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="welcome-one__img-box">
                        <div class="welcome-one__img">
                            <img class="lazy" data-original="{{ asset('admin/image/section/home_about/'.$homeAboutUs->about_image) }}" alt="" height="530" width="530">
                            <div class="welcome-one__shape-1"></div>
                            <div class="welcome-one__shape-2"></div>
                        </div>
                        <div class="welcome-one__trusted">
                            <p>Trusted by</p>
                            <h2 class="odometer" data-count="4890">{{ $homeAboutUs->trusted }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="welcome-one__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ $homeAboutUs->sub_title }}</span>
                        <h2 class="section-title__title">{{ $homeAboutUs->title }}</h2>
                    </div>

                    {!! $homeAboutUs->description !!}
                    <!-- <p class="welcome-one__right-text-1"></p>
                    <p class="welcome-one__right-text-2"></p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Welcome One End-->
@endif