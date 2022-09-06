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
                <li>Contact Us</li>
            </ul>
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
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <form action="{{route('frontend.contact_save')}}" method="post" class="comment-one__form" novalidate="novalidate">
                      @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="First Name" name="first_name">
                                    @error('first_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                    @error('last_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <input type="number" placeholder="Phone number" name="phone">
                                    @error('phone')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                               <div class="comment-form__input-box">
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
                                 <input type="checkbox" name="terms_policy" value="1"> I agree to the Terms of Service and Privacy Policy. <br>
                                 @error('comment')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
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

<!--Contact Page Google Map Start-->
<section class="contact-page-google-map mb-5">
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
                                         {{$contacts['address']}}
                                    </p>
                                    <h3>
                                        <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail">{{$contacts['email']}}</a>
                                        <a href="tel:03 8414 2900" class="get-in-touch__locations-phone"> {{$contacts['phone']}}</a>
                                    </h3>
                                </div>
                            </div>   
                            <div class="footer-widget__about-social-list"> 
                                @if($contacts['facebook'] != '')
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                @endif  
                                @if($contacts['linkedin'] != '')  
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                @endif  
                                 @if($contacts['instagram'] != '')     
                                    <a  target="_blank" href="{{$contacts['instagram']}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                @endif   
                                @if($contacts['youtube'] != '') 
                                    <a  target="_blank" href="{{$contacts['youtube']}}" class="clr-ins"><i class="fab fa-youtube"></i></a>
                                 @endif    
                                @if($contacts['twitter'] != '')
                                    <a  target="_blank" href="{{$contacts['twitter']}}" class="clr-ins"><i class="fab fa-twitter"></i></a> 
                                 @endif    
                                @if($contacts['pinterest'] != '') 
                                    <a target="_blank" href="{{$contacts['pinterest']}}" class="clr-ins"><i class="fab fa-pinterest"></i></a>
                                @endif
                              </div>
                         
                        </div>
                        <div id="map{{$key}}" style="width:100%;height:400px;">
                                        
                        </div>
                    </div>
                    
                </div>
            </div>
            @else
            <div class="tab-pane fade show" id="tab{{$key}}" role="tabpanel" aria-labelledby="tab{{$key}}-tab">
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
                                      {{$contacts['address']}}
                                    </p>
                                    <h3>
                                        <a href="mailto:melbourne@apollointl.com.au" class="get-in-touch__locations-mail">{{$contacts['email']}}</a>
                                        <a href="tel:03 8414 2900" class="get-in-touch__locations-phone">{{$contacts['phone']}}</a>
                                    </h3>
                                </div>
                            </div>
                             <div class="footer-widget__about-social-list"> 
                               @if($contacts['facebook'] != '')
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                @endif  
                                @if($contacts['linkedin'] != '')  
                                    <a  target="_blank" href="{{$contacts['facebook']}}" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                @endif  
                                 @if($contacts['instagram'] != '')     
                                    <a  target="_blank" href="{{$contacts['instagram']}}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                @endif   
                                @if($contacts['youtube'] != '') 
                                    <a  target="_blank" href="{{$contacts['youtube']}}" class="clr-ins"><i class="fab fa-youtube"></i></a>
                                 @endif    
                                @if($contacts['twitter'] != '')
                                    <a  target="_blank" href="{{$contacts['twitter']}}" class="clr-ins"><i class="fab fa-twitter"></i></a> 
                                 @endif    
                                @if($contacts['pinterest'] != '') 
                                    <a target="_blank" href="{{$contacts['pinterest']}}" class="clr-ins"><i class="fab fa-pinterest"></i></a>
                                @endif
                              </div>
                            
                        </div>
                        <div id="map{{$key}}" style="width:100%;height:400px;">
                                        
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
@endsection