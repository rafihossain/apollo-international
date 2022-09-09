@extends('frontend.master')

@section('title', $other['meta_title'])
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Contact Us</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Contact with us</span>
            <h2 class="section-title__title">Write us a message</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Your name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Phone number" name="phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Your City of Residence" name="city">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <select name="aboutenquiry">
                                    	<option value="">What is Your Enquiry About?</option>
                                    	<option value="Education">Education</option>
                                    	<option value="Migration">Migration</option>
                                    	<option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Subject" name="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <textarea name="message" placeholder="Write Message"></textarea>
                                </div>
                                <button type="submit" class="thm-btn faqs-contact__btn"><span>Send a
                                        message</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<!--Contact Page Google Map Start-->
<section class="contact-page-google-map mb-5">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Australia</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Bangladesh</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">India</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="true">Sri Lanka</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">Malaysia</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6" type="button" role="tab" aria-controls="tab6" aria-selected="false">Nepal</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class=" mt-3"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('frontend/assets/images/contact/1.jpg') }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div>
                <div class="col-md-6">
                    <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                        <div class="get-in-touch__locations-top">
                            <div class="get-in-touch__locations-icon me-2">
                                <i class="icon-placeholder"></i>
                            </div> 
                            <div class="get-in-touch__locations-bottom">
                                <p class="get-in-touch__locations-bottom-tagline"> 
                                    Suite 1404, Level 14, 97-99 Bathurst Street, Sydney, NSW 2000 
                                </p>
                                <h3>
                                    <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail"> melbourne@apollointl.com.au </a>
                                    <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> 03 8414 2900 </a>
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page-google-map__box" allowfullscreen></iframe>
                </div>
                
            </div>
          </div>
        </div>
      
    </div>
</section>
<!--Contact Page Google Map End-->
@endsection