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
                <li>Booking Success</li>
            </ul>
            <h2>Booking Success</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Adelaide Video Conference with Video Conference</span>
            <h2 class="section-title__title">Wednesday, August 3, 2022</h2>
            <h3 class="mt-4">6:00am (Asia/Dhaka)</h3>
            <p class="mt-4">Thank you for booking the video conferencing with our team. The zoom meeting invitation link will be sent to you via email soon.</p>
        </div>
        <div class="bg-light p-4">
            <h3> How to Attend the Meeting?</h3>
            <h5 class="mb-2 mt-2"> On Mobile </h5>
            <p>  You can attend the video conferencing meeting through Zoom app on mobile or dial in from your phone to have an audio conversation. The dial-in number and meeting link will be sent through an email.
            </p>
        </div>
        
    </div>
</section>
<!--Contact Page End-->

@endsection