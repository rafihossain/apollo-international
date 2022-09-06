@extends('frontend.layouts.app')

@section('content')
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>.</span></li>
                <li>Booking</li>
            </ul>
            <h2>Booking</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
     
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <form id="bookingform" action="{{ url('/booking_success') }}" class="comment-one__form "
                        novalidate="novalidate">
                        <div class="row">
                        	<div class="col-md-12">
                        		<h3 class="section-title mt-5">Choose Appointment</h3>
                        	</div>
                        	<div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <select name="choselocation"> 
                                        <option value="1">Adelaide Video Conference</option>
                                        <option value="2">Melbourne (Migration Video Conference)</option>
                                        <option value="3">Melbourne (Admission Video Conference)</option>
                                        <option value="4">Sydney (Migration Video Conference)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="date" placeholder="" name="date">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <select name="selecttime"> 
                                        <option value="1">12:00pm</option>
                                        <option value="2">12:30pm</option>
                                        <option value="3">01:00pm</option>
                                        <option value="4">01:30pm</option>
                                        <option value="5">02:00pm</option>
                                        <option value="6">02:30pm</option>
                                        <option value="7">03:00pm</option>
                                        <option value="8">03:30pm</option>
                                        <option value="9">04:00pm</option>
                                        <option value="10">04:30pm</option>
                                        <option value="11">05:00pm</option>
                                        <option value="12">05:30pm</option>
                                    </select>
                                    <span><small> 30 minutes Appointment time </small></span>
                                    <br/>
                                </div>
                            </div>
                           
                        	
                            
                            <h3 class="section-title mt-5">Your Information</h3>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="First Name" name="firstname">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Last Name" name="lastname">
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
                            <h3 class="section-title mt-5">Further Information</h3>
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <label>Are you an existing client? </label><br/>
                                     <span class="widget-checkbox">
                                     <label class="radio-inline"><input type="radio" name="yes" value="yes"> yes</label>
                                     <label class="radio-inline"><input type="radio" name="no" value="no"> no</label></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <label>Do you have any additional info you would like to share with us prior to the meeting?</label><br/>
                                    <textarea name="message" placeholder="Write Message"></textarea>
                                </div>
                            </div>
                            
                      
                         
                     
                        </div>
                        <div class="row">
                        	
                            <div class="col-xl-12">
                             
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

@endsection