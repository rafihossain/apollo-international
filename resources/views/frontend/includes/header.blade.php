<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('frontend/assets/images/favicons/site.webmanifest') }}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/moniz-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/twentytwenty/twentytwenty.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/timepicker/timePicker.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/moniz.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/moniz-responsive.css') }}" />

    <!-- RTL Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/moniz-rtl.css') }}">

    <!-- color css -->
    <link rel="stylesheet" id="jssDefault" href="{{ asset('frontend/assets/css/colors/color-default.css') }}">
    <link rel="stylesheet" id="jssMode" href="{{ asset('frontend/assets/css/modes/moniz-normal.css') }}">

    <!-- toolbar css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/moniz-toolbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
<!-- Start of SM-ANZSCO Banner Box script -->
<script id="sma-search-box-js" src="https://cdn.searchmyanzsco.com.au/js/sma-search-box.js?key=bf07oBiiffg="> </script>
  <!-- End of SM-ANZSCO  Banner Box script -->
</head>

<body>
    
    <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('frontend/assets/images/loader.png') }}" alt="" />
    </div>
    <!-- /.preloader -->
    <div class="headertop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5 col-md-6">
                    
                    <div class="topleft"> 
                        <div class="top_social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="clr-dri"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="topbar_contact">
                            <a href="tel:(02) 7922 3848"><span class="icon-phone-call"></span> (02) 7922 3848 </a> 
                        </div>
                    </div>
                </div>
                <div class="col-7  col-md-6 text-md-end">
                    <div class="top_right_sction">
                        <select>
                            <option value="">Select Country</option>
                            <option value="1">Australia</option>
                            <option value="2">Bangladesh</option>
                            <option value="3">India</option>
                            <option value="4">Nepal</option>
                            <option value="5">Srilanka</option>
                            <option value="6">Malaysia</option>
                            <option value="7">China</option>
                            <option value="8">Pakistan</option> 
                        </select>
                        <!--<div class="drop-down-image">   -->
                        <!--    <select> -->
                        <!--        <option class="en" value="en" style="background-image:url('{{ asset('frontend/assets/images/flag/united-kingdom.png') }}');">English</option>-->
                        <!--        <option class="bn" value="bn" style="background-image:url('{{ asset('frontend/assets/images/flag/bangladesh.png') }}');"> বাংলা   </option>-->
                        <!--    </select>-->
                        <!--</div>-->
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        
        <header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper  ">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <a href="{{ url('/home') }}"><img src="{{ asset('frontend/assets/images/resources/logo.png') }}" alt=""></a>
                        </div> 
                        
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler">
                            <span></span>
                        </a>
                        <ul class="main-menu__list">
                            <li>
                                <a href="{{ url('/home') }}">Home</a> 
                            </li>
                            <li class="dropdown"> <a href="{{ route('frontend.about') }}">About Us</a>  
                                <ul> 
                                    <li>
                                        <a href="{{ route('frontend.about') }}"> About The Company </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.director_messages') }}"> Director’s Messages </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.our_leaders') }}"> Our Leaders </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.mission_vision') }}"> Mission, Vision, Values </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.faq') }}"> FAQs </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.service') }}">Services </a>
                                <ul>
                                @foreach($servicecategories as $category)
                                    @if($category->id != 0)
                                    <li>
                                        <a href="{{ route('frontend.service-category-post', ['slug' => $category->category_slug]) }}">
                                            {{ Str::limit($category->category_name, 35, ' (...)') }}
                                        </a>
                                    </li> 
                                    @endif
                                @endforeach
                                </ul>
                            </li>
               
                            <li> <a href="{{ route('frontend.blog') }}">Blog</a>  </li> 
                            <li> <a href="{{ url('/testmonial') }}">Testimonials</a>  </li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__right-contact-box">
                            <!--<div class="main-menu-wrapper__right-contact-icon">-->
                            <!--    <span class="icon-phone-call"></span>-->
                            <!--</div>-->
                            <!--<div class="main-menu-wrapper__right-contact-number">-->
                            <!--    <a href="tel:(02) 7922 3848">(02) 7922 3848</a>-->
                            <!--</div>-->
                             <a href="{{ url('/booking') }}" class="thm-btn ml-2"> <span>Book An Appointment</span> </a>
                        </div>
                       
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->