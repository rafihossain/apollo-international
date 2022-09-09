@extends('frontend.layouts.app')
@section('content')

@section('title',html_entity_decode($blog->meta_title))
@section('description', $blog->meta_description)
@section('keywords', $blog->meta_keywords)

@php
    $image = explode('/',$blog->blog_image)
@endphp
<!--Page Header Start-->
<section class="page-header" style="background-image: url({{ asset('admin/image/blog/'.$image[4]) }})">
    <div class="page-header-shape-1"></div>
    <div class="page-header-shape-2"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{$blog->blog_title}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Blog Details Start-->
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blgo-details__left">
                    <div class="blog-details__img">
                        <img src="{{ asset('admin/image/blog/'.$image[4]) }}" alt="">
                        <div class="blog-details__date-box">
                            <p><span>{{date('d', strtotime($blog->created_at))}}</span> {{date('F', strtotime($blog->created_at))}}</p>
                        </div>
                    </div>

                    <div class="blog-details__content">
                        <p class="blog-details__text-1">{!!$blog->blog_description!!}</p>
                    </div>

                    <div class="related_blog_post">
                        <h2>Related Posts</h2>
                        <div class="row">

                            @foreach($relatedBlogs as $blog)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <!--Blog One Single-->
                                <div class="blog-one__single wow fadeInUp" data-wow-delay="400ms">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="{{ asset($blog->blog_image) }}" alt="">
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
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Posts</h3>
                        @foreach($relatedBlogs as $blog)
                        <ul class="sidebar__post-list list-unstyled">
                            <li class="mb-3">
                                <div class="sidebar__post-image">
                                    <img src="{{ asset($blog->blog_image) }}" height="60" alt="">
                                </div>
                                <div class="sidebar__post-content mb-2">
                                    <h3>
                                        <a class="text-truncate-container" href="{{ route('frontend.details-blog', ['slug'=> $blog->blog_slug ]) }}">{{$blog->blog_title}}</a>
                                    </h3>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
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
    </div>
</section>
<!--Blog Details End-->
@endsection