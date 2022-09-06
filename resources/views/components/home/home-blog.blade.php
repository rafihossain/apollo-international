@if(isset($blog, $blogSections) && $blog != '' && $blogSections != '')
<!--Blog One Start-->
<section class="blog-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">{{ $blog->blog_sub_title }}</span>
            <h2 class="section-title__title">{{ $blog->blog_title }}</h2>
        </div>
        <div class="row">
            @foreach($blogSections as $blogSection)
            <div class="col-xl-4 col-lg-4">
                <!--Blog One Single-->
                <div class="blog-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="blog-one__img-box">
                        <div class="blog-one__img">
                            <img class="lazy" data-original="{{ asset($blogSection->blog_image) }}" alt="">
                            <a href="{{ route('frontend.details-blog', ['slug'=> $blogSection->blog_slug ]) }}">
                                <span class="blog-one__plus"></span>
                            </a>
                        </div>
                        <div class="blog-one__date-box">
                            <p><span>{{date('d', strtotime($blogSection->created_at))}}</span> {{date('F', strtotime($blogSection->created_at))}}</p>
                        </div>
                    </div>
                    <div class="blog-one__content">

                        <h3 class="blog-one__title">
                            <a href="{{ route('frontend.details-blog', ['slug'=> $blogSection->blog_slug ]) }}">{{ $blogSection->blog_title }}</a>
                        </h3>
                        <p class="blog-one__text">{!! strip_tags(Str::limit($blogSection->blog_description, 100, ' (...)')) !!}</p>
                        <div class="blog-one__bottom">
                            <div class="blog-one__read-btn">
                                <a href="{{ route('frontend.details-blog', ['slug'=> $blogSection->blog_slug ]) }}">Read more</a>
                            </div>
                            <div class="blog-one__arrow">
                                <a href="{{ route('frontend.details-blog', ['slug'=> $blogSection->blog_slug ]) }}"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--Blog One End-->
@endif