 <!--Site Footer One Start-->
        <footer class="site-footer">
            <div class="site-footer__top">
                <div class="site-footer-top-bg"
                    style="background-image: url({{ asset('frontend/assets/images/backgrounds/site-footer-bg.jpg') }})"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                      @php
           //$baseUrl = url('/');
           $baseUrl = $_SERVER['HTTP_HOST'];
        @endphp
                                    @if($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au")
                                    <a href="{{ url('/home') }}"><img src="{{ asset('admin/image/global_settings')}}/{{$global_settings[1]->settings_value}}" alt=""></a>
                                     @else
                                     <a href="{{ url('/home') }}"><img src="{{ asset('frontend/assets/images/resources/BD-logo-white.png')}}" alt=""></a>
                                     @endif
                                </div>
                                <p class="footer-widget__about-text">{!! strip_tags($global_settings[2]->settings_value) !!}</p>
                                <div class="footer-widget__about-social-list">
                                    <a target="_blank" href="{{$contact->facebook}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                    <a target="_blank" href="{{$contact->linkedin}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                    <a target="_blank" href="{{$contact->instagram}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__explore clearfix">
                                <h3 class="footer-widget__title">Our Services</h3>
                                {!!$global_settings[3]->settings_value!!} 
                                
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title"><a href="{{ url('/contact') }}" class="text-light"> Our Locations </a></h3>
                               
                                <div class="footer-widget__contact-info">
                                    <ul>
                                        <li> <a href="{{ url('/contact') }}">Australia</a></li>
                                        <li><a href="{{ url('/contact') }}">Bangladesh </a></li>
                                        <li><a href="{{ url('/contact') }}">China </a></li>
                                        <li><a href="{{ url('/contact') }}">Fiji  </a></li>
                                        <li><a href="{{ url('/contact') }}">India </a></li>
                                        <li><a href="{{ url('/contact') }}">Malaysia </a></li>
                                        <li><a href="{{ url('/contact') }}">Nepal </a></li>
                                        <li><a href="{{ url('/contact') }}">Pakistan </a> </li>
                                        <li><a href="{{ url('/contact') }}">Srilanka </a> </li> 
                                         
                                    </ul>
                                </div>
                            </div>
                
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__newsletter">
                                <h3 class="footer-widget__title">Sign up for newsletter</h3>
                                <form id="subscriptions" class="footer-widget__newsletter-form">
                                    <div class="footer-widget__newsletter-input-box">
                                        <input type="email" placeholder="Email Address" name="email">
                                        <button type="submit" class="footer-widget__newsletter-btn"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                                <div class="footer-widget__newsletter-bottom">
                                    <div class="footer-widget__newsletter-bottom-icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="footer-widget__newsletter-bottom-text">
                                        <p><a href="#"  class="footer-widget__contact-mail">I agree to all terms and policies</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer-bottom__inner">
                              <div class="privacy_polacy"> {!!$global_settings[4]->settings_value!!} </div>  
                              @if($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd")
                              <div class="privacy_polacy mb-2"> <a href="{{ route('frontend.blog') }}">Blogs</a> <a href="{{ url('/contact') }}">Contact Us</a> </div>
                       
                            @endif
                                <p class="site-footer-bottom__copy-right">© Copyright 2022 by <a href="javascript:;"> Apollo International </a></p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer One End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"></span>

            <div class="logo-box">
                <a href="{{ url('/home') }}"><img src="{{ asset('admin/image/global_settings')}}/{{$global_settings[1]->settings_value}}" width="155" alt=""></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@apollointl.com.au"> info@apollointl.com.au </a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:(02) 7922 3848">(02) 7922 3848</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social"> 
                    <a  target="_blank" href="https://www.facebook.com/apollointl.AU/" class="clr-fb"><i class="fab fa-facebook"></i></a>
                    <a  target="_blank" href="https://www.linkedin.com/company/apollo-international-australia/" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                    <a  target="_blank" href="https://www.instagram.com/apollo_international_aus/" class="clr-ins"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

 
    <a href="{{ url('/booking') }}" class="bookafreeschatbtn">Book An Appointment</a>
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,es,ar,hi,fr,pt,ja,nl,ru,tr,ta,sv,ne,si,ms,zh-CN,ur,fj,chi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
    <script src="{{ asset('frontend/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/twentytwenty/twentytwenty.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/twentytwenty/jquery.event.move.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/timepicker/timePicker.js') }}"></script>


    <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>-->

    <!-- js validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- template js -->
    <script src="{{ asset('frontend/assets/js/moniz.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validations.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/lazyload/lazyload.min.js') }}"></script>
    <script>
    jQuery().ready(function() {   
        /* Custom select design */     
        jQuery('.drop-down-image').append('<div class="button"></div>');     
        jQuery('.drop-down-image').append('<ul class="select-list"></ul>');     
        jQuery('.drop-down-image select option').each(function() {   
        var bg = jQuery(this).css('background-image');     
        jQuery('.select-list').append('<li class="clsAnchor"><span value="' + jQuery(this).val() + '" class="' + jQuery(this).attr('class') + '" style=background-image:' + bg + '>' + jQuery(this).text() + '</span></li>');    
        });     
        jQuery('.drop-down-image .button').html('<span style=background-image:' + jQuery('.drop-down-image select').find(':selected').css('background-image') + '>' + jQuery('.drop-down-image select').find(':selected').text() + '</span>' + '<a href="javascript:void(0);" class="select-list-link"> ▼ </a>');    
        jQuery('.drop-down-image ul li').each(function() {    
        if (jQuery(this).find('span').text() == jQuery('.drop-down-image select').find(':selected').text()) {   
        jQuery(this).addClass('active');        
        }       
        });      
        jQuery('.drop-down-image .select-list span').on('click', function() 
        {           
        var dd_text = jQuery(this).text();   
        var dd_img = jQuery(this).css('background-image');  
        var dd_val = jQuery(this).attr('value');    
        jQuery('.drop-down-image .button').html('<span style=background-image:' + dd_img + '>' + dd_text + '</span>' + '<a href="javascript:void(0);" class="select-list-link"> ▼ </a>');       
        jQuery('.drop-down-image .select-list span').parent().removeClass('active');     
        jQuery(this).parent().addClass('active');      
        $('.drop-down-image select[name=options]').val( dd_val );  
        $('.drop-down-image .select-list li').slideUp();      
        });        
        jQuery('.drop-down-image .button').on('click','a.select-list-link', function() 
        {       
        jQuery('.drop-down-image ul li').slideToggle();   
        });      
        /* End */        
        }); 
        $(function() {
            $("img.lazy").lazyload({effect : "fadeIn"});
        });
    </script> 
    
 
@if($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au")

  <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "62e527a2e1ec0500078a96a5";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->
 @else
<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "6315d9c83083570007a98ec5";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->
@endif
     
    <script>
        $(function(){
            $('#selectCountry').on('change', function (){
                let result = $(this).val();

                if(result == 1){
                    window.location.href = "https://apollointl.com.au/";
                }else{
                    window.location.href = "https://apollointl.com.bd/";
                }
            });
        });
    </script>

</body>

</html>