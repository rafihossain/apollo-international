@extends('frontend.layouts.app')

@section('title', $other['meta_title'])
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content') 
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/resources/FAQS-BAR.jpg') }});">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Frequently Asked Questions (FAQs)</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
 <!--FAQs Page Start-->
    <section class="faqs-page">
        <div class="faqs-page-bg" style="background-image: url({{ asset('frontend/assets/images/backgrounds/faqs-page-bg.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="faqs-page__single">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            @foreach($faqs as $fag)
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>{{ $fag->faq_question }}</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>{!! $fag->faq_answare !!}</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            @endforeach


                            {{-- @if($faqs->hasPages())
                            <div class="text-center m-3">
                                @if($faqs->onFirstPage())
                                    <span href="{{ $faqs->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></span>
                                @else
                                    <a href="{{ $faqs->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></a>
                                @endif

                                &nbsp; &nbsp;

                                @if($faqs->hasMorePages())
                                    <a href="{{ $faqs->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></a>
                                @else
                                    <span href="{{ $faqs->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></span>
                                @endif
                            </div>
                            @endif
                            
                            --}}


                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!--FAQs Page End-->
@endsection