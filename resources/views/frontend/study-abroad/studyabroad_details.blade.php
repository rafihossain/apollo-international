@extends('frontend.layouts.app')

@section('title',html_entity_decode($studyabroad->meta_title))
@section('keywords', $studyabroad->meta_keyword)
@section('description', $studyabroad->meta_description)

@php
    $image1 = explode('/',$studyabroad->header_image);
    $image2 = explode('/',$studyabroad->studyabroad_image);
@endphp

@section('content')

<!--Page Header Start-->
 <section class="page-header" style="background-image: url({{ asset('admin/image/study-abroad/'.$image1[4]) }})">   
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{$studyabroad->title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->


<!--<section class="blog-details pt-5">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-127">-->
<!--                <div class="blgo-details__left"> -->
<!--                    <div class="blog-details__content">-->
<!--                        {!!$studyabroad->studyabroad_description!!} -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


<!--Service Details Start-->
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-md-6">
                <!-- <div class="blgo-details__left">
                    <div class="blog-details__img">
                        <img src="{{  asset('admin/image/study-abroad/'.$image2[4]) }}" alt="">
                    </div>
                    <div class="blog-details__content">
                        <p class="blog-details__text-1">{!!$studyabroad->studyabroad_description!!}</p>
                    </div>
                </div> -->
                <div class="row">
                @foreach($partners as $partner)
                    <div class="col-6 col-sm-3 col-md-3 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{ asset($partner->partner_image) }}"  class="img-fluid" style="max-height:100px" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>



            <div class="col-xl-5 col-md-6">
                <img src="{{  asset('admin/image/study-abroad/'.$image2[4]) }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<!--Service Details End-->



@endsection