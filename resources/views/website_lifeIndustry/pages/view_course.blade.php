<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
//dd(mb_convert_encoding($course->title,'HTML-ENTITIES','UTF-8'));
//dd(iconv('UTF-8', 'WINDOWS-1256', $course->title));
//dd(mb_convert_encoding($course->title, "windows-1256"));
//dd(iconv($course->title, "CP1256"));
//dd(iconv('UTF-8','WINDOWS-1256',  'ÏæÑÉ ãåÇÑÇÊ ÇáÊÝæíÖ æÇáÊæÌíå'));
//dd(mb_convert_encoding($course->title, 'CP1256'));
?>

@extends('layout.app')

@section('css')


    @if(app()->getLocale() == 'ar')
        <style>
            .content-course-section {
                margin-top: 40px;
                margin-bottom: 60px;
                background-color: #FBFBFB;
            }

            .content-course-section .nav-tabs {
                border-bottom: none;
                width: 122%;
                margin-right: -123px;
                background-color: #F7F7F7;
                padding: 26px;
                padding-right: 185px;
            }

            .content-course-section .nav {
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
            }

            .content-course-section .nav-tabs > li {
                float: left;
                margin-bottom: -1px;
                margin-right: 42px;
            }

            .content-course-section .nav > li {
                position: relative;
                display: block;
                color: #363333;

            }

            .content-course-section .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover
            .nav-tabs > li.active > a.active {
                color: #F3895E;
                font-family: "Montserrat-Arabic-Regular";
                font-size: 14px;
            }

            .content-course-section .nav-tabs > li > a:hover {
                text-decoration: none;
            }

            .content-course-section .nav-tabs > li > a {
                margin-right: 2px;
                line-height: 1.42857143;
                border: 1px solid transparent;
                border-radius: 4px 4px 0 0;
                color: #363333;
                font-family: "Montserrat-Arabic-Regular";
                font-size: 14px;

            }

            .content-course-section .nav > li > a {
                position: relative;
                display: block;
                padding: 10px 15px;
            }


            @media not screen and (min-width: 600px) {
                .content-course-section .nav-tabs {
                    border-bottom: none;
                    width: 122%;
                    margin-right: -65px;
                    background-color: #F7F7F7;
                    padding: 26px;
                    padding-right: 143px;
                }
            }
        </style>

    @else
        <style>
            .content-course-section {
                margin-top: 40px;
                margin-bottom: 60px;
                background-color: #FBFBFB;
            }

            .content-course-section .nav-tabs {
                border-bottom: none;
                width: 100%;
                margin-left: -21px;
                background-color: #F7F7F7;
                padding: 26px;
                padding-right: 185px;
            }

            .content-course-section .nav {
                padding-right: 0;
                margin-bottom: 0;
                list-style: none;
            }

            .content-course-section .nav-tabs > li {
                float: right;
                margin-bottom: -1px;
                margin-left: 42px;
            }

            .content-course-section .nav > li {
                position: relative;
                display: block;
                color: #363333;

            }

            .content-course-section .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover
            .nav-tabs > li.active > a.active {
                color: #F3895E;
                font-family: "Montserrat-Arabic-Regular";
                font-size: 14px;
            }

            .content-course-section .nav-tabs > li > a:hover {
                text-decoration: none;
            }

            .content-course-section .nav-tabs > li > a {
                margin-left: 2px;
                line-height: 1.42857143;
                border: 1px solid transparent;
                border-radius: 4px 4px 0 0;
                color: #363333;
                font-family: "Montserrat-Arabic-Regular";
                font-size: 14px;

            }

            .content-course-section .nav > li > a {
                position: relative;
                display: block;
                padding: 10px 15px;
            }


            @media not screen and (min-width: 600px) {
                .content-course-section .nav-tabs {
                    border-bottom: none;
                    width: 122%;
                    margin-left: -65px;
                    background-color: #F7F7F7;
                    padding: 26px;
                    padding-left: 143px;
                }
            }
        </style>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
@section('content')

    <!-- section 1-->
    <div class="view-course-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}</a>
                    /
                    @if($course->type == 'live')
                        <a href="{{ route('selfLearningCourses') }}"
                           class="link-page"> {{ __('cp.Professional education courses') }}</a>
                    @else
                        <a href="{{ route('onlineCourses') }}"
                           class="link-page"> {{ __('cp.Professional education courses') }}</a>
                    @endif
                    /
                    <a href="{{ route('view_course' , ['id' => $course->id]) }}"
                       class="link-page active">{{ @$course->title }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-{{ $float }} view-course-title">
                    <h3>
                        {{ __('cp.courses_v') }} | {{ @$course->title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="view-course-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <h3> {{ __('cp.courses_v') }} | {{ @$course->title }}</h3>
                </div>
            </div>
            <div class="row course-information">
                <div class="col-lg-8 col-md-4 course-data">
                    <div class="course-rate-v">
                        <?php
                        $course_rate = \App\Models\CourseComments::where('course_id', $course->id)->get()
                        ?>
                        @if(count($course_rate) > 0 )
                            <?php $rating = number_format($course->avg_rating, 2) ?>
                            @if($rating == 1 || $rating< 1.5)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating > 1.5 && $rating < 2)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-half-empty"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating == 2 || $rating< 2.5)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating > 2.5 && $rating< 3)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-half-empty"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating == 3 || $rating< 3.5)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating > 3.5 && $rating< 4)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-half-empty"></span>
                                <span class="fa fa-star"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating == 4 || $rating< 4.5)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating > 4.5 && $rating< 5)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-half-empty"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @elseif($rating == 5 || $rating < 6)
                                <span class="user-rate-count-v"> <small> {{ $rating }}</small></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span
                                        class="user-rate-count-v"> <small> ({{ count($course_rate) }})  {{ __('cp.opinions') }}</small></span>
                            @endif
                        @else
                            <span class="user-rate-count-v"> <small> 0 </small></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="user-rate-count-v"><small> (0) {{ __('cp.opinions') }}</small></span>
                        @endif
                    </div>
                    <p>
                        {{ @$course->summary }}
                    </p>
                    <div class="row course-statistics">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{url(assets('website'))}}/img/cv1.png" class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ __('cp.Credit Hours') }}</h6>
                                        <p class="card-text first-text">
                                            <small>( {{ $course->hours ??  __('cp.unknown') }} {{ __('cp.hour') }}
                                                )</small></p>
                                    </div>
                                    <div class="vlv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{url(assets('website'))}}/img/cv2.png" class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ __('cp.course language') }}</h6>
                                        <p class="card-text">
                                            <small>({{ $course->course_language ??  __('cp.unknown')  }} )</small></p>
                                    </div>
                                    <div class="vlv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{url(assets('website'))}}/img/cv3.png" class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ __('cp.views') }}</h6>
                                        <p class="card-text"><small>({{ $course->views_count ??  __('cp.unknown')  }}
                                                )</small></p>
                                    </div>
                                    <div class="vlv"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{url(assets('website'))}}/img/cv4.png" class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ __('cp.likes') }}</h6>
                                        <p class="card-text"><small>({{ count($course->reviews) ??  __('cp.unknown')  }}
                                                )</small></p>
                                    </div>
                                    <div class="vlv"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="course-price-card">
                    <div class="card course-card-v">
                        <div class="card-body">
                            @if($course->discount != '')
                                <div class="sale-course-v"> {{ __('cp.discount_v') }}{{ $course->discount }}%</div>
                            @endif
                            <h5 class="card-title course-title-v"> {{ __('cp.course price') }} </h5>
                            @if($course->discount != '' && $course->price_after_discount != '')
                                <p class="card-text course-price-v">
                                    {{ $course->price_after_discount }} <small>{{ __('cp.dollars') }} </small>
                                </p>
                            @else
                                <p class="card-text course-price-v">
                                    {{ $course->price ?? 0}} <small>{{ __('cp.dollars') }} </small>
                                </p>
                            @endif
                            <span class="course-category">
                                 <ul class="nav">
                                     @if($course->type == 'live')
                                         <li class="nav-item">
                                        <a href="{{ route('onlineCourses') }}" class="tap-active"
                                           style="color: #707070;"
                                        >
                                            <input type="radio" name="active" checked
                                                   style="accent-color: #707070;">
                                            <span>{{ __('cp.online') }}</span>
                                        </a>
                                    </li>
                                         <li class="nav-item">
                                        <a href="{{ route('selfLearningCourses') }}"
                                           style="color: #363333;">
                                            <input type="radio" name="not_active" checked
                                                   style="accent-color: auto;">
                                            <span>{{ __('cp.live') }}</span>
                                        </a>
                                    </li>
                                     @else
                                         <li class="nav-item">
                                        <a href="{{ route('onlineCourses') }}" class="tap-active">
                                            <input type="radio" name="active" checked>
                                            <span>{{ __('cp.online') }}</span>
                                        </a>
                                    </li>
                                         <li class="nav-item">
                                        <a href="{{ route('selfLearningCourses') }}">
                                            <input type="radio" name="not_active" checked>
                                            <span>{{ __('cp.live') }}</span>
                                        </a>
                                    </li>
                                     @endif
                                 </ul>
                            </span>
                            <hr>
                            <a href="{{ route('view_course_register' , ['id' => $course->id]) }}"
                               class="btn btn-primary course-register-v">{{ __('cp.Register now') }}</a>
                            <a href="#content_course"
                               class="btn btn-primary course-more-info"> {{ __('cp.additional information') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 2-->

    <!-- section 3 -->
    <div class="content-course-section" id="content_course">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    {{--                <div class="col-md-12 text-{{ $float }} content-course-info">--}}
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#content" class="active">{{ __('cp.course content') }}</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#schedule">{{ __('cp.course schedule') }}</a>
                        </li>
                        <li><a data-toggle="tab" href="#test">{{ __('cp.test and certification') }}</a></li>
                        <li><a data-toggle="tab" href="#faqs">{{ __('cp.course FAQS') }}</a></li>
                        <li><a data-toggle="tab" href="#recommendations">{{ __('cp.recommendations and opinions') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="content" class="tab-pane fade in active show">
                            <div class="row course-goals">
                                <h4 class="my-4">{{ __('cp.course content') }}</h4>

                                @if(isset($courseContents))
                                    @foreach($courseContents as $content)
                                        <div class="col-md-12 text-{{ $float }}">
                                            <h5>
                                                <img src="{{url(assets('website'))}}/img/coursegoal-2.png">
                                                {{ $content->content_title }}
                                            </h5>
                                            <p> {{ $content->content_description }}</p>
                                        </div>
                                    @endforeach
                                @endif
                                @if($course->file_type != '' && $course->file != '')
                                    <div class="col-md-12 text-{{ $float }}" style="padding-bottom: 50px">
                                        <h5>
                                            <img src="{{url(assets('website'))}}/img/coursegoal-1.png">
                                            {{ __('cp.attached') }}
                                        </h5>
                                        <a href="{{ $course->file }}" target="_blank"
                                           style="padding: 20px"> {{ __('cp.Show') }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="schedule" class="tab-pane fade">
                            <div class="row schedule-course">
                                <div class="col-md-8 text-{{ $float }}">
                                    <h3> {{ __('cp.training days') }}</h3>
                                    @if(isset($courseDates))
                                        <ul class="course-data-time">
                                            <li>
                                                <h5>
                                                    <img src="{{url(assets('website'))}}/img/date.png">
                                                    <?php \Carbon\Carbon::setLocale('ar'); ?>
                                                    {{--                                                                {{ date('l jS \\of F Y', strtotime($courseDate->date)) }}--}}
                                                    {{ \Carbon\Carbon::parse($courseDates->date)->translatedFormat('l , j F Y') }}
                                                    {{--                                                                {{ $courseDate->date }}--}}
                                                    {{--                                                                {{ $courseDate->date->format('l jS \\of F Y h:i:s A') }}--}}

                                                </h5>
                                            </li>
                                            <li>

                                                <h5>
                                                    <img src="{{url(assets('website'))}}/img/clock.png">
                                                    {{ date("h:i", strtotime($courseDates->time_to)) }}
                                                    - {{ date("h:i A", strtotime($courseDates->time_from))  }}
                                                </h5>
                                            </li>
                                        </ul>
                                    @endif
                                    {{--                                                @foreach($courseDates as $courseDate)--}}
                                    {{--                                                    <ul class="course-data-time">--}}
                                    {{--                                                        <li>--}}
                                    {{--                                                            <h5>--}}
                                    {{--                                                                <img  src="{{url(assets('website'))}}/img/date.png" >--}}
                                    {{--                                                                <?php \Carbon\Carbon::setLocale('ar'); ?>--}}
                                    {{--                                                                {{ date('l jS \\of F Y', strtotime($courseDate->date)) }}--}}
                                    {{--                                                                {{ \Carbon\Carbon::parse($courseDate->date)->translatedFormat('l , j F Y') }}--}}
                                    {{--                                                                {{ $courseDate->date }}--}}
                                    {{--                                                                {{ $courseDate->date->format('l jS \\of F Y h:i:s A') }}--}}

                                    {{--                                                            </h5>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                        <li>--}}

                                    {{--                                                            <h5>--}}
                                    {{--                                                                <img  src="{{url(assets('website'))}}/img/clock.png" >--}}
                                    {{--                                                                {{ date("h:i", strtotime($courseDate->time_to)) }} - {{ date("h:i A", strtotime($courseDate->time_from))  }}--}}
                                    {{--                                                            </h5>--}}
                                    {{--                                                        </li>--}}
                                    {{--                                                    </ul>--}}
                                    {{--                                                @endforeach--}}

                                </div>
                                <div class="col-md-4 text-{{ $float_op }}">
                                    <img src="{{url(assets('website'))}}/img/sh_co.png" class="card-img" alt="...">
                                </div>
                            </div>
                        </div>
                        <div id="test" class="tab-pane fade">
                            <div class="row test-course">
                                <div class="col-md-8 text-{{ $float }}">
                                    <h3> {{ __('cp.test and certification') }}</h3>

                                </div>
                                <div class="col-md-4 text-{{ $float_op }}">
                                    <img src="{{url(assets('website'))}}/img/test.png" class="card-img" alt="...">
                                </div>
                            </div>
                        </div>
                        <div id="faqs" class="tab-pane fade">
                            <div class="row content-course">
                                <div class="col-md-12 text-{{ $float }} course-data">
                                    <div class="bg-light-gray py-5 course-contents" id="show_content">
                                        <div class="container container-mobile">
                                            <h4 class="my-4">{{ __('cp.course FAQS') }}</h4>
                                            <div class="content">
                                                @if(isset($faqs))
                                                    @foreach($faqs as $faq)
                                                        <div class="parent">
                                                            <input type="checkbox" id="{{ $faq->id }}"
                                                                   name="q" class="questions">
                                                            <label for="{{ $faq->id }}" class="question">
                                                                {{ $faq->question }}
                                                                <div for="{{ $faq->id }}" class="plus">+
                                                                </div>
                                                                <div for="{{ $faq->id }}" class="hide">-
                                                                </div>
                                                            </label>
                                                            <div class="answers course-content-section">
                                                                <p>{{ $faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="recommendations" class="tab-pane fade">
                            <div class="row course-recommendations">
                                <h4 class="my-4">{{ __('cp.recommendations and opinions') }}</h4>
                                <div class="col-md-12 col-sm-12">
                                    <div class="recommendationsSlider owl-carousel">
                                        @if(isset($main_comments))
                                            @foreach($main_comments as $main_comment)
                                                <div class="carouselItem row">
                                                    @foreach($main_comment as $comment)
                                                        <div class="col-md-4">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <q class="card-text">
                                                                        {{ $comment->comment ?? '' }}
                                                                        @if($comment->file_type != '' && $comment->file != '')
                                                                            <br>
                                                                            <a href="{{ $comment->file }}"
                                                                               target="_blank"
                                                                               style="padding: 20px"> {{ __('cp.Show') }}</a>
                                                                        @endif

                                                                    </q>


                                                                    <div class="course-rate">
                                                                        @if($comment->rate == 0 || $comment->rate == '')
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate == 1 || $comment->rate< 1.5)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate > 1.5 && $comment->rate < 2)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star-half-empty"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate == 2 || $comment->rate< 2.5)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate > 2.5 && $comment->rate< 3)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star-half-empty"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($rating == 3 || $rating< 3.5)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate > 3.5 && $comment->rate< 4)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star-half-empty"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate == 4 || $comment->rate< 4.5)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @elseif($comment->rate > 4.5 && $comment->rate< 5)
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star-half-empty"></span>
                                                                            <br>
                                                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                                        @elseif($comment->rate == 5 || $comment->rate < 6)
                                                                            <span class="user-rate-count"> <small> {{ $comment->user->name ?? '' }} </small></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <span class="fa fa-star checked"></span>
                                                                            <br>
                                                                            <small>{{ $comment->user->country->name ?? '' }} </small>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- #End section 3 -->

        <!-- section 4-->
        <div class="suggestions-courses-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-5 text-{{ $float }}">
                        <h3>{{ __('cp.we chose for you') }} </h3>
                    </div>
                    <div class="col-md-4 col-sm-5 text-{{ $float_op }}">
                        @if($course->type == 'live')
                            <a href="{{ route('selfLearningCourses') }}">{{ __('cp.see more') }} </a>
                        @else
                            <a href="{{ route('onlineCourses') }}">{{ __('cp.see more') }} </a>
                        @endif
                    </div>
                </div>
                <div class="row courses-choose">
                    <div class="col-md-12 col-sm-12">
                        <div class="courseChooseSlider owl-carousel">
                            @foreach($coursesChoose as $course)
                                <div class="card">
                                    @if($course->discount != '')
                                        <div class="sale-course"> {{ __('cp.discount_v') }}{{ $course->discount }}%
                                        </div>
                                    @endif
                                    <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title course-title">{{ $course->title }}</h5>
                                        <?php
                                        $courses_rate = \App\Models\CourseComments::where('course_id', $course->id)->get()
                                        ?>
                                        <div class="course-rate">
                                            @if(count($courses_rate) > 0 )
                                                <?php $rating = number_format($course->avg_rating, 2) ?>
                                                @if($rating == 1 || $rating< 1.5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating > 1.5 && $rating < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-half-empty"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating == 2 || $rating< 2.5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating > 2.5 && $rating< 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-half-empty"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating == 3 || $rating< 3.5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating > 3.5 && $rating< 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-half-empty"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating == 4 || $rating< 4.5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating > 4.5 && $rating< 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star-half-empty"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @elseif($rating == 5 || $rating < 6)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                                @endif
                                            @else
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="user-rate-count"> <small>0 (0)</small></span>
                                            @endif
                                        </div>
                                        @if($course->discount != '' && $course->price_after_discount != '')
                                            <p class="card-text course-price">
                                                {{ $course->price_after_discount }} {{ __('cp.dollars') }}
                                                <span class="old-price">
                                              <del> <small>{{ $course->price }} {{ __('cp.dollars') }}</small></del>
                                        </span>
                                            </p>
                                        @else
                                            <p class="card-text course-price">
                                                {{ $course->price ?? 0}} {{ __('cp.dollars') }}
                                            </p>
                                        @endif
                                        <a href="{{ route('view_course' , ['id' => $course->id]) }}"
                                           class="btn btn-primary course-register">
                                            {{ __('cp.Register now') }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #End section 4-->
        @endsection

        @section('script')
            <script>
                const tab = document.querySelectorAll(".tab");
                const tabContent = document.querySelectorAll(".tab-content");

                for (let i = 0; i < tab.length; i++) {
                    tab[i].onclick = tabActive;
                }

                function tabActive() {
                    for (let i = 0; i < tab.length; i++) {
                        this.classList.add("tab-active");

                        if (tab[i] !== this) {
                            tab[i].classList.remove("tab-active");
                        }
                    }

                    for (let i = 0; i < tabContent.length; i++) {
                        tabContent[i].classList.add("tab-content-active");

                        if (tab[i] !== this) {
                            tabContent[i].classList.remove("tab-content-active");
                        }
                    }
                }

                var color = ['orange', 'gray']
                var icon = document.querySelectorAll(".icon-card");
                // console.log(icon);

                //
                // $('.plus').click(function () {
                //     $(".hide").show();
                //     $(".plus").hide();
                // });
                // $('.hide').click(function () {
                //     $(".hide").hide();
                //     $(".plus").show();
                // });
            </script>
@endsection



