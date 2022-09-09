@extends('frontend.layouts.app')

@section('content')
<!--Page Header Start-->
 <style>
    .hide{ 
        display:none;
    }
 </style>
 
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/backgrounds/group-of-multiethnic-students-on-graduation-day.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
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
                    <form id="bookingform" method="POST" action="{{route('frontend.update_booking')}}" class="comment-one__form " novalidate="novalidate">
                        @csrf
                        <div class="row">
                           

                            <h3 class="section-title mt-5">Your Information</h3>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="text" placeholder="First Name" name="first_name">
                                </div>
                                @error('first_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror 
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                </div>
                                @error('last_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="email" placeholder="Email Address" name="booking_email">
                                </div>
                                @error('booking_email')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="phone_number" name="phone"  placeholder="Enter Number Only" class="input form-control" autocomplete="off" id="phone">
                                    <input type="hidden" name="country_code" id="country_code" value="0">
                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                </div>
                                @error('phone')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <h3 class="section-title mt-5">Further Information</h3>
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <label>Are you an existing client? </label><br />
                                    <span class="widget-checkbox">
                                        <label class="radio-inline"><input type="radio" name="existing_client" value="yes"> yes</label>
                                        <label class="radio-inline"><input type="radio" name="existing_client" value="no"> no</label></span>
                                </div>
                                @error('existing_client')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="comment-form__input-box">
                                    <label>Do you have any additional info you would like to share with us prior to the meeting?</label><br />
                                    <textarea name="booking_details" placeholder="Write Message"></textarea>
                                </div>
                                @error('booking_details')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <button type="submit" class="thm-btn faqs-contact__btn"><span>Send a message</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<script>
    var input = document.querySelector("#phone"),
      errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    var baseUrl = '<?php echo $_SERVER['HTTP_HOST']?>';
    if(baseUrl == 'apollointl.com.au' || baseUrl == 'www.apollointl.com.au'){
       var country = 'au';
       $('#country_code').val('65');
    }else{
       var country = 'bd'; 
       $('#country_code').val('880');
    }
    
    // initialise plugin
    var iti = window.intlTelInput(input, {
        initialCountry: country,
        utilsScript: "../../build/js/utils.js?1638200991544"
      
    });
    
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
    
    // on blur: validate
    input.addEventListener('blur', function() {
      reset();
      if (input.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
        }
      }
    });
    
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
    
    $('#phone').on('click',function(){
  
    var countrycode = iti.getSelectedCountryData().dialCode;
      $("[name=phone]").attr('placeholder','('+countrycode+')-Enter Number Only');
      $('#country_code').val(countrycode);
});
</script>

@endsection