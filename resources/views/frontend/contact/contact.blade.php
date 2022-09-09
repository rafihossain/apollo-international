@extends('frontend.layouts.app')

@section('title',html_entity_decode($other['meta_title']))
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content')

 <style>
    .hide{
        display:none;
    }
 </style>
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/header/Contact-Us-02.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Contact Us</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Google Map Start-->
@if(session()->has('success'))
    <div class="alert alert-success" style="text-align:center;">
        {{ session()->get('success') }}
    </div>
@endif
<section class="contact-page-google-map mt-4 mb-4">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          @foreach($contact as $key=>$contacts)
            @if($key == 0)
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#tab{{$key}}" type="button" role="tab" aria-controls="tab{{$key}}" aria-selected="true">{{$contacts['country']}}</button>
                </li>
            @else
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#tab{{$key}}" type="button" role="tab" aria-controls="tab{{$key}}" aria-selected="true">{{$contacts['country']}}</button>
                </li>
            @endif
          @endforeach 
        </ul>
        <div class="tab-content" id="myTabContent">
         @foreach($contact as $key=>$contacts) 
            <?php  //echo '<pre>'; print_r($contacts);die();?>
            @if($key == 0)  
           <div class="tab-pane fade show active" id="tab{{$key}}" role="tabpanel" aria-labelledby="tab{{$key}}-tab">
               @foreach($australia as $key=>$australias) 
                <div class="row">
                    <div class="col-md-6">
                        <div class=" mt-3"> 
                            <img class="lazy  img-fluid" data-original="{{ asset('admin/image/contact')}}/{{$australias['location_image']}}" alt=""> 
                        </div><!-- /.about-two__image -->
                    </div>
                    <div class="col-md-6">
                        <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                            <div class="get-in-touch__locations-top"> 
                                 <div class="get-in-touch__locations-bottom">
                                   @if($australias['office'] != '') <p><b> {{$australias['office']}} </b></p>
                                    <hr/>@endif
                                     @if($australias['address'] != '')<p class="get-in-touch__locations-bottom-tagline"> 
                                       <i class="fa fa-map-marker-alt"></i>  {{$australias['address']}}
                                    </p>@endif
                                     @if($australias['email'] != '')<p> <a href="mailto:{{$australias['email']}}" class="get-in-touch__locations-mail"><i class="far fa-envelope"></i> {{$australias['email']}}</a></p> @endif 
                                     @if($australias['phone'] != '')<p> <a href="tel:{{$australias['phone']}}" class="get-in-touch__locations-phone"> <i class="fa fa-phone-alt"></i>  {{$australias['phone']}}</a></p> @endif
                                     @if($australias['mobile'] != '')<p> <a href="tel:{{$australias['mobile']}}" class="get-in-touch__locations-phone"> <i class="fa fa-mobile"></i> {{$australias['mobile']}}</a></p> @endif
                                        
                                        
                                        
                                    
                                </div>
                            </div>   
                            <div class="footer-widget__about-social-list"> 
                                @if($australias['facebook'] != '')
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                @endif  
                                @if($australias['linkedin'] != '')  
                                    <a  target="_blank" href="{{$contacts['linkedin']}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                @endif  
                                 @if($australias['instagram'] != '')     
                                    <a  target="_blank" href="{{$contacts['instagram']}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                @endif   
                                @if($australias['youtube'] != '') 
                                    <!--<a  target="_blank" href="{{$contacts['youtube']}}" class="clr-ins"><i class="fab fa-youtube"></i></a>-->
                                 @endif    
                                @if($australias['twitter'] != '')
                                    <!--<a  target="_blank" href="{{$contacts['twitter']}}" class="clr-ins"><i class="fab fa-twitter"></i></a> -->
                                 @endif    
                                @if($australias['pinterest'] != '') 
                                    <!--<a target="_blank" href="{{$contacts['pinterest']}}" class="clr-ins"><i class="fab fa-pinterest"></i></a>-->
                                @endif
                              </div>
                         
                        </div>
                        <!-- <div id="map{{$key}}" style="width:100%;height:400px;">
                                        
                        </div> -->
                    </div>
                    
                </div>
                @endforeach
            </div>
            @else
            <div class="tab-pane fade show" id="tab{{$key}}" role="tabpanel" aria-labelledby="tab{{$key}}-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" mt-3"> 
                            <img class="img-fluid" src="{{ asset('admin/image/contact')}}/{{$contacts['location_image']}}" alt=""> 
                        </div><!-- /.about-two__image -->
                    </div>
                    <div class="col-md-6">
                      
                        <div class="get-in-touch__locations-single mt-3 mb-3 p-4 ">
                            <div class="get-in-touch__locations-top">
                                
                                <div class="get-in-touch__locations-bottom"> 
                                    @if($contacts['office'] != '')<p><b>{{$contacts['office']}}</b></p>
                                    <hr/> @endif 
                                    @if($contacts['address'] != '')<p class="get-in-touch__locations-bottom-tagline"> 
                                     <i class="fa fa-map-marker-alt"></i> {{$contacts['address']}}
                                    </p>@endif
                                    @if($contacts['email'] != '')<p><a href="mailto:{{$contacts['email']}}" class="get-in-touch__locations-mail"><i class="far fa-envelope"></i> {{$contacts['email']}}</a></p>@endif
                                    @if($contacts['phone'] != '')<p><a href="tel:{{$contacts['phone']}}" class="get-in-touch__locations-phone"><i class="fa fa-phone-alt"></i> {{$contacts['phone']}}</a></p>@endif
                                    @if($contacts['mobile'] != '')<p><a href="tel:{{$contacts['mobile']}}" class="get-in-touch__locations-phone"><i class="fa fa-mobile"></i> {{$contacts['mobile']}}</a></p> @endif  
                                    
                                </div>
                            </div>
                             <div class="footer-widget__about-social-list"> 
                               @if($contacts['facebook'] != '')
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                @endif  
                                @if($contacts['linkedin'] != '')  
                                    <a  target="_blank" href="{{$contacts['linkedin']}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                @endif  
                                 @if($contacts['instagram'] != '')     
                                    <a  target="_blank" href="{{$contacts['instagram']}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                @endif   
                                @if($contacts['youtube'] != '') 
                                    <!--<a  target="_blank" href="{{$contacts['youtube']}}" class="clr-ins"><i class="fab fa-youtube"></i></a>-->
                                 @endif    
                                @if($contacts['twitter'] != '')
                                    <!--<a  target="_blank" href="{{$contacts['twitter']}}" class="clr-ins"><i class="fab fa-twitter"></i></a> -->
                                 @endif    
                                @if($contacts['pinterest'] != '') 
                                    <!--<a target="_blank" href="{{$contacts['pinterest']}}" class="clr-ins"><i class="fab fa-pinterest"></i></a>-->
                                @endif
                              </div>
                            
                        </div>
           
                        <div id="map{{$key}}" style="width:100%;">
                                        
                        </div>
                    </div>
                    
                </div>
            </div>               
            @endif
          @endforeach               
        </div>
      <?php 
            $location=json_encode($location);
      ?>
    </div>
</section>
<!--Contact Page Google Map End-->

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
                    <form action="{{route('frontend.contact_save')}}" method="post" class="comment-one__form" novalidate="novalidate">
                      @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="text" placeholder="First Name" name="first_name">
                                    @error('first_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                    @error('last_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box requirefeilds">
                                    <!--<input type="tel" id="phone">-->
                                    <input type="phone_number" name="phone"  placeholder="Enter Number Only" class="input form-control" autocomplete="off" id="phone">
                                    <input type="hidden" name="country_code" id="country_code" value="0">
                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                    @error('phone')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                               <div class="comment-form__input-box requirefeilds">
                                    <input type="email" placeholder="Email Address" name="email">
                                    @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="City" name="city">
                                    @error('city')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <textarea name="comment" placeholder="Comment"></textarea>
                                    @error('comment')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                 <h4>Privacy Information</h4>
                                 <p>We’re committed to your privacy. We use the information you provide to us to contact you about our relevant content, products, and services. You may unsubscribe from these communications at any time by emailing us. For more information, check out our Privacy policy.</p>
                                 <input type="checkbox" id="iaggree" name="terms_policy" value="1"> <label for="iaggree"> I agree to the Terms of Service and Privacy Policy.</label> <br>
                                 @error('terms_policy')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <br/>
                                <button type="submit" class="thm-btn faqs-contact__btn mt-2"><span>Send a
                                        message</span>
                                </button>
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
     //for google map show----------
    var location_new=<?php echo $location;?>;
    var i;
    //var position=location_new.split(",");
    
   for(i=0; i<location_new.length; i++) 
   {
        var map_value='map'+i;
        //var mpas_new='map'+i;
        //alert(map_value);
        var position=location_new[i].split(",");
        var lat=parseFloat(position[0]);
        var lang=parseFloat(position[1]);               
        function initAutocomplete() {

            var latlng = new google.maps.LatLng(position[0], position[1]);
            var mpas_new = new google.maps.Map(document.getElementById(map_value),{
            center: { lat:lat,lng:lang},
            zoom: 13,
            mapTypeId: "roadmap",
            });
            var marker=new google.maps.Marker({
            position:latlng,
            map:mpas_new,
            type:'info',
            
            });
        }  
   }

</script>
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