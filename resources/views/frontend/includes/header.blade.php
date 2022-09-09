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
    <link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.0.1' media='all' />

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
    <script src="{{ asset('frontend/assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/intlTelInput.min.js" integrity="sha512-hpJ6J4jGqnovQ5g1J39VtNq1/UPsaFjjR6tuCVVkKtFIx8Uy4GeixgIxHPSG72lRUYx1xg/Em+dsqxvKNwyrSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/utils.js" integrity="sha512-6sKpcusiQQ/vOBWU0ouNesdklDzgwywnf+255TCMAs+n68jnDqaDC3gt01ofYWry4mRdCHR+8uox88HT3YBOdQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/utils.js" integrity="sha512-6sKpcusiQQ/vOBWU0ouNesdklDzgwywnf+255TCMAs+n68jnDqaDC3gt01ofYWry4mRdCHR+8uox88HT3YBOdQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js" integrity="sha512-QK4ymL3xaaWUlgFpAuxY+6xax7QuxPB3Ii/99nykNP/PlK3NTQa/f/UbQQnWsM4h5yjQoMjWUhCJbYgWamtL6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Start of SM-ANZSCO Banner Box script -->
    @if($wizard != '' && $wizard['wizard_status'] == 'yes')
        {!! $wizard['wizard'] !!}
    @else
        <script id="sma-search-box-js" src="https://cdn.searchmyanzsco.com.au/js/sma-search-box.js?key=5hDSVhkxfvw="> </script>
    @endif
    <!-- End of SM-ANZSCO  Banner Box script -->
    
    <!-- facebook_pixel -->
    @if($facebookpixel->settings_value != '')
        {!!$facebookpixel->settings_value!!}
    @endif
    
    @if($google_ads[1]->settings_value == 'yes')
        @if($google_ads[0]->settings_value != '')
            {!!$google_ads[0]->settings_value!!}
        @endif    
    @endif
    
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
                            <a  target="_blank" href="{{$contact->facebook}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                            <a  target="_blank" href="{{$contact->linkedin}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                            <a  target="_blank" href="{{$contact->instagram}}" class="clr-ins"><i class="fab fa-instagram"></i></a>

                        </div>
                        <div class="topbar_contact">
                            <a href="tel:{{ $contact->phone }}"><span class="icon-phone-call"></span> {{ $contact->phone }} </a> 
                        </div>
                    </div>
                </div>
                <div class="col-12  col-md-6 text-md-end">
                    <div class="top_right_sction">
                        <!--<a href="{{ url('/testimonial') }}">Testimonials</a>-->
                        <select id="selectCountry">
                            <option value="">Select Country</option>
                       
                             <option value="1" class="selectCountry1" @if(url('/') == 'https://www.apollointl.com.au/new/public/') selected @endif>Apollo International – Australia</option>
                            <option value="2" class="selectCountry2" @if(url('/') == 'https://www.apollointl.com.bd/new/public/') selected @endif>Apollo International - Bangladesh</option>
                            <!--<option value="3">India</option>-->
                            <!--<option value="4">Nepal</option>-->
                            <!--<option value="5">Srilanka</option>-->
                            <!--<option value="6">Malaysia</option>-->
                            <!--<option value="7">China</option>-->
                            <!--<option value="8">Pakistan</option> -->
                        </select>
                         <div id="google_translate_element"></div>
                        
                        <!--<div class="drop-down-image">   -->
                        <!--    <select> -->
                        <!--        <option class="en" data-lang="en" value="en" style="background-image:url('{{ asset('frontend/assets/images/flag/united-kingdom.png') }}');">English</option>-->
                        <!--        <option class="bn" data-lang="bn" value="bn" style="background-image:url('{{ asset('frontend/assets/images/flag/bangladesh.png') }}');"> বাংলা   </option>-->
                        <!--    </select>-->
                        <!--</div>-->
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
         @php
           //$baseUrl = url('/');
           $baseUrl = $_SERVER['HTTP_HOST'];
        @endphp
        
    @if($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au")
        <header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper  ">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <a href="{{ url('/home') }}"><img src="{{ asset('admin/image/global_settings')}}/{{$global_settings[1]->settings_value}}" alt=""></a>
                        </div> 
                        
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler">
                            <span></span>
                        </a>
                        
                        <ul class="main-menu__list">
                            <li>
                                <!--<a href="{{ url('/home') }}">Home</a> -->
                            </li> 
                            
                            <li class="dropdown"> <a href="{{ route('frontend.about') }}">About Us</a>  
                                <ul> 
                                    <li>
                                        <a href="{{ route('frontend.about') }}"> About The Company </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="{{ route('frontend.director_messages') }}"> Director’s Messages </a>-->
                                    <!--</li>-->
                                    <li>
                                        <a href="{{ route('frontend.our_leaders') }}"> Leadership Team </a>
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
                                <a href="{{ route('frontend.service-category-post', ['slug' => 'student-services']) }}">Student Services</a>
                                <ul>
                                    @foreach($studentservices as $studentservice)
                                    <li>
                                        <a href="{{ route('frontend.details-service', ['slug' => $studentservice->service_slug]) }}">
                                            {{ Str::limit($studentservice->service_title, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="{{ route('frontend.service-category-post', ['slug' => 'popular-courses']) }}">Popular Courses</a>
                                <ul>
                                    @foreach($popularcourses as $popularcours)
                                    <li>
                                        <a href="{{ route('frontend.details-service', ['slug' => $popularcours->service_slug]) }}">
                                            {{ Str::limit($popularcours->service_title, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.service-category-post', ['slug' => 'migration-services']) }}">Migration Services</a>
                                <ul>
                                    @foreach($migrations as $migration)
                                    <li>
                                        <a href="{{ route('frontend.details-service', ['slug' => $migration->service_slug]) }}">
                                            {{ Str::limit($migration->service_title, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li><a href="{{ url('/partner') }}">Our Partners</a></li>
                        
                            <li> <a href="{{ route('frontend.blog') }}">Blogs</a>  </li>
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
                             <a href="{{ url('/booking') }}" class="thm-btn ml-2">  Book An Appointment </a>
                        </div>
                       
                    </div>
                </div>
            </nav>
        </header>
        @else
        
         <header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper  ">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <a href="{{ url('/home') }}"><img src="{{ asset('frontend/assets/images/resources/BD-logo-white.png')}}" alt=""></a>
                        </div> 
                        
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler">
                            <span></span>
                        </a>
                        <ul class="main-menu__list">
                         
                            <li class="dropdown"> <a href="{{ route('frontend.about') }}">About Us</a>  
                                <ul> 
                                    <li>
                                        <a href="{{ route('frontend.about') }}"> About The Company </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="{{ route('frontend.director_messages') }}"> Director’s Messages </a>-->
                                    <!--</li>-->
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
                            <li class="dropdown"> <a href="{{ route('frontend.studyabroad') }}">Study Abroad</a>
                                <ul>
                                    @foreach($studyabroads as $studyabroad)
                                    <li>
                                        <a href="{{ route('frontend.details-studyabroad', ['slug' => $studyabroad->studyabroad_slug]) }}">
                                            {{ Str::limit($studyabroad->country_name, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                               <a href="{{ url('/service/category/student-services') }}"> Student Services</a>
                               <ul>
                                   <li><a href="{{ url('/service/admission-counselling') }}"> Admission Counselling</a></li>
                                   <li><a href="{{ url('/scholarship') }}"> Scholarships </a></li>
                                   <li><a href="{{ url('/service/bring-to-the-table-win-win-survival-strategies-service') }}">  Health Insurance  </a></li>
                                   <li><a href="{{ url('/service/student-visa-bd') }}"> Student Visas </a></li>
                               </ul>
                            </li>    
                           <li class="dropdown">
                                <a href="{{ route('frontend.service-category-post', ['slug' => 'popular-courses-bd']) }}"> Popular Courses </a>
                                <ul>
                                    @foreach($hotcourses as $hotcourse)
                                    <li>
                                        <a href="{{ route('frontend.details-service', ['slug' => $hotcourse->service_slug]) }}">
                                            {{ Str::limit($hotcourse->service_title, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('frontend.service-category-post', ['slug' => 'services']) }}">  Migration Services </a>
                                <ul>
                                    @foreach($services as $service)
                                    <li>
                                        <a href="{{ route('frontend.details-service', ['slug' => $service->service_slug]) }}">
                                            {{ Str::limit($service->service_title, 35, ' (...)') }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li><a href="{{ url('/partner') }}">Our Partners</a></li> 
                            
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
        @endif

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->