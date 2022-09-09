@extends('frontend.layouts.app')

@section('title',html_entity_decode($other['meta_title']))
@section('keywords', $other['meta_keywords'])
@section('description', $other['meta_description'])

@section('content')
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('frontend/assets/images/header/Blog.jpg') }})">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Blogs</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Blog Page Start-->
<section class="blog-one blog-grid">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="row">

                    @foreach($blogPosts as $blog)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!--Blog One Single-->
                        <div class="blog-one__single wow fadeInUp" data-wow-delay="400ms">
                            <div class="blog-one__img-box">
                                <div class="blog-one__img">
                                    <img src="{{ asset($blog->blog_image) }}" alt="" width="419" height="277">
                                    <a href="{{ route('frontend.details-blog', ['slug'=> $blog->blog_slug ]) }}">
                                        <span class="blog-one__plus"></span>
                                    </a>
                                </div>
                                <div class="blog-one__date-box">
                                    <p><span>{{date('d', strtotime($blog->created_at))}}</span> {{date('F', strtotime($blog->created_at))}}</p>
                                </div>
                            </div>
                            <div class="blog-one__content">

                                <h3 class="blog-one__title">
                                    <a href="{{ route('frontend.details-blog', ['slug'=> $blog->blog_slug ]) }}">{{$blog->blog_title}}</a>
                                </h3>
                                <p class="blog-one__text">{!! strip_tags(Str::limit($blog->blog_description, 100, ' (...)')) !!}</p>

                                <div class="blog-one__bottom">
                                    <div class="blog-one__read-btn">
                                        <a href="{{ route('frontend.details-blog', ['slug'=> $blog->blog_slug ]) }}">Read more</a>
                                    </div>
                                    <div class="blog-one__arrow">
                                        <a href="{{ route('frontend.details-blog', ['slug'=> $blog->blog_slug ]) }}"><span class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($blogPosts->hasPages())
                    <div class="text-center m-3">
                        @if($blogPosts->onFirstPage())
                            <span href="{{ $blogPosts->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></span>
                        @else
                            <a href="{{ $blogPosts->previousPageUrl() }}"><span class="fw-bold fs-4"><i class="fa fa-angle-double-left"></i> Previous</span></a>
                        @endif

                        &nbsp; &nbsp;

                        @if($blogPosts->hasMorePages())
                            <a href="{{ $blogPosts->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></a>
                        @else
                            <span href="{{ $blogPosts->nextPageUrl() }}"><span class="fw-bold fs-4">Next <i class="fa fa-angle-double-right"></i></span></span>
                        @endif
                    </div>
                    @endif
                    

                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="sidebar__single sidebar__category">
                    <h3 class="sidebar__title">Categories</h3>
                    <ul class="sidebar__category-list list-unstyled">
                        <li><a href="{{ route('frontend.blog') }}">All</a></li>
                    </ul>
                    @foreach($blogCategories as $category)
                    <ul class="sidebar__category-list list-unstyled">
                        <li><a href="{{ route('frontend.category-post', ['slug'=> $category->category_slug ]) }}">{{ $category->category_name }}
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Page End-->
@endsection