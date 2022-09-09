@if(isset($faq, $faqs) && $faq != '' && $faqs != '')
<!--We Change Start-->
<section class="we-change">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="we-change__left-faqs">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ $faq->tagline }}</span>
                        <h2 class="section-title__title">{{ $faq->title }}</h2>
                    </div>
                    <div class="we-change__faqs">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            
                            @foreach($faqs as $faqresult)
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>{{ $faqresult->faq_question }}</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>{!! $faqresult->faq_answare !!}</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="we-change__right">
                    <div class="we-change__right-img">

                        <img class="lazy" data-original="{{ asset('admin/image/section/faq-image/')}}/{{$faq->faq_image}}" alt="">
                        <div class="we-change__agency">
                            <div class="we-change__agency-icon">
                                <span class="icon-development"></span>
                            </div>
                            <div class="we-change__agency-text">
                                <h3>{{ $faq->image_title }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--We Change End-->
@endif