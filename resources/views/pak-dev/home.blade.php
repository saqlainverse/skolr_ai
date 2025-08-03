@extends('pak-dev.layouts.main')
@section('page-title')
    <div class="page-title-home2">
        <div class="tf-container">
            <div class="row items-center">
                <div class="col-lg-6">
                    <div class="content">
                        <div class="widget box-sub-tag wow fadeInUp" data-wow-delay="0s">
                            <div class="sub-tag-icon">
                                <i class="icon-flash"></i>
                            </div>
                            <div class="sub-tag-title">
                                <p>The Leader in Online Learning</p>
                            </div>
                        </div>
                        <h1 class="fw-7 wow fadeInUp" data-wow-delay="0.2s">Learning That Gets You</h1>
                        <h6 class="wow fadeInUp" data-wow-delay="0.3s">
                            Skills for your present (and your future).
                            Get started with us.
                        </h6>
                        <div class="bottom-btns">
                            <a href="#" class="tf-btn wow fadeInUp" data-wow-delay="0.4s">Explore Courses<i
                                    class="icon-arrow-top-right"></i></a>
                            <div class="widget-video wow fadeInUp" data-wow-delay="0.5s">
                                <a href="https://www.youtube.com/watch?v=MLpWrANjFbI" class="popup-youtube">
                                    <i class="flaticon-play fs-18"></i>
                                </a>
                                <h6 class="mb-0">Watch Demo</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image">
                        <div class="image1 align-items-end">
                            <img class="lazyload"
                                data-src="{{ static_asset('pak-dev/images/logo/pic4.svg') }}"
                                src="{{ static_asset('pak-dev/images/logo/pic4.svg') }}"
                                alt="" />
                            <div class="box box1">
                                <div class="icon">
                                    <i class="flaticon-online-training"></i>
                                </div>
                                <h2 class="fw-7">35K</h2>
                                <p class="fz-15">Happy Students</p>
                            </div>
                        </div>
                        <div class="image2">
                            <div class="box box2">
                                <div class="icon">
                                    <i class="flaticon-graduation"></i>
                                </div>
                                <h2 class="fw-7">500K</h2>
                                <p class="fz-15">Graduated</p>
                            </div>
                            <img class="lazyload"
                                data-src="{{ static_asset('pak-dev/images/logo/pic2.svg') }}"
                                src="{{ static_asset('pak-dev/images/logo/pic2.svg') }}"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-brand">
                <div class="slide-brand style-2 swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-1.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-2.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-3.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-4.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-4.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-5.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-5.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-6.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-6.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <img class="lazyload" src="{{ static_asset('pak-dev/images/brand/brand-7.png') }}"
                                    data-src="{{ static_asset('pak-dev/images/brand/brand-7.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @foreach($sections as $key=> $section)
        <!--====== Start Top Courses Section ======-->
        @if($section->section == 'top_courses')
            @include('frontend.homePage.top_course')
        @endif
        <!--====== End Top Courses Section ======-->

        @if($section->section == 'fun_fact')
            <!--====== Start Achievement Section ======-->
            <section class="achievement-section overflow-hidden color-bg-off-white p-t-80 p-b-80 p-t-sm-40 p-b-sm-50  m-10">
                <div class="tf-container container-1278">
                    <div class="row justify-content-center d-block d-lg-none">
                        <div class="col-lg-6">
                            <div class="common-heading text-center m-b-40">
                                <h3>{{__($section->contents['title']) }}</h3>
                                <p>{{__($section->contents['sub_title']) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-xs-6">
                            <div class="achievement-content-block">
                                <div class="common-heading d-none d-lg-block m-b-50">
                                    <h3>{{__($section->contents['title']) }}</h3>
                                    <p>{{__($section->contents['sub_title']) }}</p>
                                </div>
                                <div class="row gx-3 counter-items-v3">
                                    <div class="col-6">
                                        <div class="counter-item m-b-45 m-b-sm-30" data-aos="fade-up" data-aos-delay="200">
                                            <div class="icon">
                                                <img src="{{ static_asset('frontend/img/icons/user-2.svg') }}" alt="user">
                                            </div>
                                            <div class="content">
                                                <div class="counter-wrap">
                                                    <span class="counter">{{ $total_instructors  }}</span>
                                                    <span class="suffix">+</span>
                                                </div>
                                                <p class="title">{{__('teacher') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="counter-item m-b-45 m-b-sm-30" data-aos="fade-up" data-aos-delay="400">
                                            <div class="icon">
                                                <img src="{{ static_asset('frontend/img/icons/live-streaming.svg') }}" alt="live streaming">
                                            </div>
                                            <div class="content">
                                                <div class="counter-wrap">
                                                    <span class="counter">{{ $total_videos }}</span>
                                                    <span class="suffix">+</span>
                                                </div>
                                                <p class="title">{{__('video') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="counter-item m-b-45 m-b-sm-0" data-aos="fade-up" data-aos-delay="600">
                                            <div class="icon">
                                                <img src="{{ static_asset('frontend/img/icons/user-3.svg') }}" alt="user">
                                            </div>
                                            <div class="content">
                                                <div class="counter-wrap">
                                                    <span class="counter">{{ $total_students }}</span>
                                                    <span class="suffix">+</span>
                                                </div>
                                                <p class="title">{{__('student') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="counter-item m-b-45 m-b-sm-0" data-aos="fade-up" data-aos-delay="800">
                                            <div class="icon">
                                                <img src="{{ static_asset('frontend/img/icons/rocket.svg') }}" alt="rocket">
                                            </div>
                                            <div class="content">
                                                <div class="counter-wrap">
                                                    <span class="counter">4576543</span>
                                                    <span class="suffix">+</span>
                                                </div>
                                                <p class="title">{{__('apps_user')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="masonry-images">
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block">
                                        <div class="left-content" data-aos="fade-up" data-aos-delay="200">
                                            <img src="{{ getFileLink('266x250', $section->image_1) }}" class="main-image" alt="Benefit Image">
                                            <div class="element-wrapper">
                                                <span class="element"></span>
                                                <img src="{{ static_asset('frontend/img/particle/dot-pattern.svg') }}" class="animate-float-bob-y" alt="Dot Pattern">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 align-self-end">
                                        <div class="right-content" data-aos="fade-up" data-aos-delay="400">
                                            <div class="element-wrapper">
                                                <span class="element"></span>
                                                <span class="element-two d-block d-lg-none"></span>
                                                <img src="{{ static_asset('frontend/img/particle/dot-pattern.svg') }} " class="animate-float-bob-x" alt="Dot Pattern">
                                            </div>
                                            <img src="{{ getFileLink('296x285', $section->image_2) }}" class="main-image" alt="Benefit Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--====== End Achievement Section ======-->
        @endif
        <!--====== Start Course Subject Section ======-->
        @if($section->section == 'subject')
            @include('frontend.homePage.subject')
        @endif
        <!--====== End Course Subject Section ======-->

        <!--====== Start Pricing Section ======-->
        {{--        @if($section->section == 'service_pricing')--}}
        {{--            @include('frontend.homePage.pricing')--}}
        {{--        @endif--}}
        <!--====== End Pricing Section ======-->

        <!--====== Start Success Story Section ======-->
        @if($section->section == 'success_story')
            @include('frontend.homePage.success')
        @endif
        <!--====== End Success Story Section ======-->

        <!--====== Start Counter Section ======-->
        @if($section->section == 'counter_section')
            @include('frontend.homePage.counter')
        @endif
        <!--====== End Counter Section ======-->

        <!--====== Start Our Instructor Section ======-->
        @if($section->section == 'instructors')
            @include('frontend.homePage.instructor')
        @endif
        <!--====== End Our Instructor Section ======-->

        <!--====== Start Lesson with Mentor Section ======-->
        @if($section->section == 'lesson_with_mentor')
            @include('frontend.homePage.lesson_with_mentor')
        @endif
        <!--====== End Lesson with Mentor Section ======-->

        <!--====== Start Recent Videos Section ======-->
        @if($section->section == 'video_slider')
            @include('frontend.homePage.video', compact('section'))
        @endif
        <!--====== End Recent Videos Section ======-->
        <!--====== Start Course Lesson Section ======-->
        @if($section->section == 'single_course')
            @include('frontend.homePage.single_course')
        @endif
        <!--====== End Course Lesson Section ======-->
        <!--====== Start Featured Course Section ======-->
        @if($section->section == 'featured_course')
            @include('frontend.homePage.featured_course')
        @endif
        <!--====== End Featured Course Section ======-->

        <!--====== Start Featured Blog Section ======-->
        @if($section->section == 'blog_news')
            @include('frontend.homePage.blog_news')
        @endif
        <!--====== End Featured Blog Section ======-->

        <!--====== start Student testimonial Section ======-->
        @if($section->section == 'testimonial')
            @include('frontend.homePage.testimonial')
        @endif
        <!--====== End Student testimonial Section ======-->

        <!--====== Start Become Instructor Section ======-->
        @if(!Auth::check() || auth()->user()->role_id == 3)
            @if($section->section == 'become_instructor')
                @include('frontend.homePage.become_instructor', compact('section'))
            @endif
        @endif
        <!--====== End Become Instructor Section ======-->

        <!--====== Start Brands Section ======-->
        @if($section->section == 'partner_logo')
            @include('frontend.homePage.partner', compact('section'))
        @endif
        <!--====== End Brands Section ======-->
    @endforeach
@endsection
