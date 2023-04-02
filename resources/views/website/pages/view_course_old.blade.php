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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .course-page .course-data span{
            font: normal normal normal 14px/1 FontAwesome !important;
        }
    </style>


@endsection
@section('content')

    <div class="directory" style="margin-top: -46px !important">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span>  . </span>
            <a href="{{ route('courses') }}">Course</a>
            <span> . </span>
            <a href="">{{ $course->title }}</a>
        </div>
    </div>

    <main style="margin-top: 120px" class="course-page">
        <div class="container">

            <div class="row">
                <div class="course-data col-xl-7">

                    <h2>
                        {{ $course->title }}
                    </h2>
                    <p>
                        {{ $course->summary }}
                    </p>
                <?php
                $course_rate = \App\Models\CourseComments::where('course_id', $course->id)->get()
                ?>
                <!--<div class="stars">-->
                <!--     <?php $rating = number_format($course->avg_rating, 2) ?>-->
                <!--    <span style="margin-right: 5px; color: rgba(38, 50, 56, 1);">{{ $rating }}</span>-->
                <!--    @for ($i = 0; $i < 5; $i++)-->
                <!--        <span class="fa fa-star {{ 5-$rating <= $i? 'checked':'' }}"></span>-->
                    <!--    @endfor-->
                <!--    <span style="text-decoration: underline; margin-left: 10px;">({{ count($course_rate) }}) {{ __('cp.students') }}</span>-->

                    <!--</div>-->

{{--                    <div class=" course-author">--}}
{{--                        <img src="{{ $course->trainer->image ?? url(assets('website')).'/images/user_image.jpg' }}" alt="{{ $course->trainer->name }}">--}}
{{--                        <div>--}}
{{--                            <p class="author m-0">{{ __('cp.Created by') }} </p>--}}
{{--                            <span style="font-style: medium; color: #263238;">{{ $course->trainer->name ?? __('cp.No Trainer') }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @if($course->file_type == 'image' && $course->file_type != 'file')
                        <img src="{{ $course->file }}" class="mb-3" width="100%" style="border-radius: 15px;" >
                    @elseif($course->file_type == 'file' && $course->file_type != 'image')
                        <video class="mb-3" width="100%" style="border-radius: 15px;" controls>
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            <source src="{{ $course->file }}" type="video/mp4">
                            <source src="mov_bbb.ogg" type="video/ogg">
                            Your browser does not support HTML video.
                        </video>
                    @else
                        <img src="{{ $course->image }}" class="mb-3" width="100%" style="border-radius: 15px;" >
                    @endif
                    <div class="un-fixed fixed-card-data m-0 mt-4">
                        <div class="d-flex" style="margin-bottom:20px ;">
                            <span class="current-price">${{ $course->price_after_discount }}</span>
                            <div>
                                <span class="old-price">${{ $course->price }}</span>
                                <span class="discount">{{ $course->discount }}% off</span>
                            </div>
                        </div>
                        {{--                    <span class="remaining-time">--}}
                        {{--                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--                            <path d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z"--}}
                        {{--                                  stroke="#B32D0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                        {{--                            <path d="M12 8V13" stroke="#B32D0F" stroke-width="1.5" stroke-linecap="round"--}}
                        {{--                                  stroke-linejoin="round"/>--}}
                        {{--                            <path d="M9 2H15" stroke="#B32D0F" stroke-width="1.5" stroke-miterlimit="10"--}}
                        {{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
                        {{--                        </svg>--}}

                        {{--                        18 hours left at this price!--}}
                        {{--                    </span>--}}

                        {{--                    <button class="btn-filled w-100" style="height: 55px; margin-top: 27px; ">_('cp.Add to cart') }}</button>--}}
                        {{--                    <a href="{{ route('add_to_cart', $course->id) }}"--}}
                        {{--                       class="btn-filled w-100 add_to_cart" style="height: 55px; margin-top: 27px; " role="button"--}}
                        {{--                       @if($course->price == '' || $course->price == 0) disabled @endif>--}}
                        {{--                        {{ __('cp.Add to cart') }}--}}
                        {{--                    </a>--}}
                        <button class="btn-filled w-100 add_to_cart" type="submit"
                                @if($course->price == '' || $course->price == 0) disabled @endif
                                style="margin-top: 10px; height: 55px;">
                            {{ __('cp.Add to cart') }}
                        </button>
                        @if($course->price == '' || $course->price == 0)
                        @else
                            <a  class="btn-buy btn-filled btn-outlined w-100"
                                href="{{ route('course_checkout', $course->id) }}"
                                style="margin-top: 13px; height: 55px;">
                                Buy Now
                            </a>


                        @endif
                        <span class="gurantee">
                        30-Day Money-Back Guarantee
                    </span>

                    </div>


                </div>
                <div class="col-xl-1 col-0"></div>
                <div class="fixed-course-card col-xl-4" style="    box-shadow: 0px 4px 31px rgb(0 0 0 / 8%); padding:0px !important">

                    <div class="fixed-card-data py-4">
                        <div class="d-flex" style="margin-bottom:20px ;">
                            @if($course->discount != '' && $course->price_after_discount != '')
                                <span class="current-price">${{ $course->price_after_discount }}</span>
                                <div>
                                    <span class="old-price">${{ $course->price }}</span>
                                    <span class="discount" style="text-decoration-line:none !important;">{{ $course->discount }}% off</span>
                                </div>
                            @else
                                <span class="current-price">${{ $course->price }}</span>
                            @endif
                        </div>

                        <input id="course_id" type="hidden" value="{{ $course->id }}" data-id="{{ $course->id }}">
                        <button class="btn-filled w-100 add_to_cart" type="submit"
                                @if($course->price == '' || $course->price == 0) disabled @endif
                                style="margin-top: 10px; height: 55px;">
                            {{ __('cp.Add to cart') }}
                        </button>
                        @if($course->price == '' || $course->price == 0)
                            <a  class="btn-buy btn-filled btn-outlined w-100"

                                style="margin-top: 13px; height: 55px;">
                                Buy Now
                            </a>
                        @else
                            <a  class="btn-buy btn-filled btn-outlined w-100"
                                href="{{ route('course_checkout', $course->id) }}"
                                style="margin-top: 13px; height: 55px;">
                                Buy Now
                            </a>
                        @endif
                        <span class="gurantee">
                        30-Day Money-Back Guarantee
                    </span>

                        @if(count($course->course_statistics) > 0)
                            <h2 style="font-style: normal;font-size: 20px;line-height: 32px;color: #263238; margin-top:10px; margin-bottom:5px;">
                                This course includes:</h2>
                            <ul>
                                @foreach($course->course_statistics as $statistic)
                                    <li>
                                        <img src="{{ $statistic->image }}" alt="">
                                        {{--                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                            <path d="M12.53 20.42H6.21C3.05 20.42 2 18.32 2 16.21V7.78996C2 4.62996 3.05 3.57996 6.21 3.57996H12.53C15.69 3.57996 16.74 4.62996 16.74 7.78996V16.21C16.74 19.37 15.68 20.42 12.53 20.42Z"--}}
                                        {{--                                  stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{--                            <path d="M19.52 17.1L16.74 15.15V8.84001L19.52 6.89001C20.88 5.94001 22 6.52001 22 8.19001V15.81C22 17.48 20.88 18.06 19.52 17.1Z"--}}
                                        {{--                                  stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{--                            <path d="M11.5 11C12.3284 11 13 10.3284 13 9.5C13 8.67157 12.3284 8 11.5 8C10.6716 8 10 8.67157 10 9.5C10 10.3284 10.6716 11 11.5 11Z"--}}
                                        {{--                                  stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{--                        </svg>--}}


                                        {{ $statistic->count }} {{ $statistic->title }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-xl-7 tabs-warper">
                    <ul class="nav nav-pills mb-3 tabs line  " style="padding-left: 20px;" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                                    aria-selected="true">{{ __('cp.Overview') }}
                            </button>
                        </li>
                        <!--<li class="nav-item" role="presentation">-->
                        <!--    <button class="nav-link" id="pills-curriculum-tab" data-bs-toggle="pill"-->
                        <!--            data-bs-target="#pills-curriculum" type="button" role="tab"-->
                    <!--            aria-controls="pills-curriculum" aria-selected="false">{{ __('cp.Curriculum') }}-->
                        <!--    </button>-->
                        <!--</li>-->
                        <!--<li class="nav-item" role="presentation">-->
                        <!--    <button class="nav-link" id="pills-instructor-tab" data-bs-toggle="pill"-->
                        <!--            data-bs-target="#pills-instructor" type="button" role="tab"-->
                    <!--            aria-controls="pills-instructor" aria-selected="false">{{ __('cp.Instructor') }}-->
                        <!--    </button>-->
                        <!--</li>-->
                        <!--<li class="nav-item" role="presentation">-->
                        <!--    <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill"-->
                        <!--            data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews"-->
                    <!--            aria-selected="false">{{ __('cp.Reviews') }}-->
                        <!--    </button>-->
                        <!--</li>-->
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade  show active" id="pills-overview" role="tabpanel"
                             aria-labelledby="pills-overview-tab">

                            @if(count($course->contents) > 0)
                                <div id="overview" class="learn-block ">
                                    <h2>
                                        {{ __('cp. What you\'ll learn') }}
                                    </h2>
                                    <ul>
                                        @foreach($course->contents as $content)
                                            <li>{{ $content->content_title }}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                            <div class="decription-block">
                                <h2>
                                    {{ __('cp.Description') }}
                                </h2>
                                <div class="expandedPara">
                                    {!! $course->details !!}
                                </div>

                                <button class="expandBtn">See more</button>
                            </div>
                            @if(count($course->requirements) > 0)
                                <div class="requirments-block">
                                    <h2>
                                        {{ __('cp.Requirements') }}
                                    </h2>
                                    <ul>
                                        @foreach($course->requirements as $requirement)
                                            <li>{{ $requirement->requirement_title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                        </div>
                        <div class="tab-pane fade p-0 " id="pills-curriculum" role="tabpanel"
                             aria-labelledby="pills-curriculum-tab">
                            <div id="curriculum" class="content-block">
                                <h2 style="padding: 10px 36px 0 36px">
                                    Course content
                                </h2>
                                <div class="d-flex justify-content-between" style="padding: 0 36px;">
                                    <li><span>{{ count($course->units) }}</span> {{ __('cp.sections') }} • <span>{{ $course->lessons_count }}</span> {{ __('cp.lectures') }} • <span>14h 42m</span> {{ __('cp.total length') }}

                                    </li>
                                    <button id="expandSections" onclick="expand() ">{{ __('cp.Expand all sections') }}</button>
                                    <button id="collapseSections" onclick="collapse() " style="display: none;">{{ __('cp.Collapse all sections') }}
                                    </button>
                                </div>
                                <div class="accordion  mt-3" id="myAccordion">
                                    @foreach($course->units as $unit)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{$unit->id}}">
                                                <button type="button" class="accordion-button collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse{{$unit->id}}">
                                                    <div class="card-title-data">
                                                        {{ $unit->title }}
                                                        <P><span> {{ count($unit->lessons) }}</span> {{ __('cp.lectures') }} • <span>6</span> min</P>
                                                    </div>

                                                </button>
                                            </h2>
                                            <div id="collapse{{$unit->id}}" class="accordion-collapse collapse"
                                                 data-bs-parent="#myAccordion">
                                                <div class="card-body">
                                                    <ul>
                                                    @foreach($unit->lessons as $lesson)
                                                        <!--                                                        --><?php
                                                            //                                                        $ffmpeg = FFMpeg\FFMpeg::create();
                                                            //                                                        $video = $ffmpeg->open($lesson->file);
                                                            //                                                        $duration = $video->getDuration();
                                                            //                                                        $minutes = floor($duration / 60);
                                                            //                                                        dd($minutes)
                                                            //                                                        ?>
                                                            <li> {{ $lesson->title }} <span> 4:01 </span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-instructor" role="tabpanel"
                             aria-labelledby="pills-instructor-tab">
                            <div id="instructor" class="instructors-block">
                                <h2>
                                    {{ __('cp.Instructors') }}
                                </h2>

                                <div class="author-card">
                                    <img src="{{ $course->trainer->image ?? url(assets('website')).'/images/user_image.jpg' }}" alt="{{ $course->trainer->name }}">
                                    <div class="my-3">
                                        <h3>
                                            {{ $course->trainer->name }}
                                        </h3>
                                        <p>
                                            {{ $course->trainer->subDescription }}
                                        </p>
                                        <ul class="row">
                                            <li class="col-6">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.8696 2.77872L12.2629 5.56538C12.4529 5.9533 12.9596 6.32538 13.3871 6.39663L15.9125 6.81622C17.5275 7.08538 17.9075 8.25705 16.7438 9.41288L14.7804 11.3762C14.4479 11.7087 14.2658 12.35 14.3688 12.8091L14.9308 15.2395C15.3742 17.1633 14.3529 17.9075 12.6508 16.902L10.2838 15.5008C9.85625 15.2475 9.15167 15.2475 8.71625 15.5008L6.34917 16.902C4.655 17.9075 3.62584 17.1554 4.06917 15.2395L4.63125 12.8091C4.73417 12.35 4.55209 11.7087 4.21959 11.3762L2.25625 9.41288C1.10042 8.25705 1.4725 7.08538 3.0875 6.81622L5.61292 6.39663C6.0325 6.32538 6.53917 5.9533 6.72917 5.56538L8.1225 2.77872C8.8825 1.26663 10.1175 1.26663 10.8696 2.77872Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                <span>4.4</span> {{ __('cp.Instructor Rating') }}
                                            </li>
                                            <li class="col-6">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 13.75C14.4173 13.75 17.1875 11.0824 17.1875 7.79171C17.1875 4.50101 14.4173 1.83337 11 1.83337C7.58274 1.83337 4.8125 4.50101 4.8125 7.79171C4.8125 11.0824 7.58274 13.75 11 13.75Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M6.89332 12.3933L6.88417 19.1583C6.88417 19.9833 7.46167 20.3866 8.17667 20.0474L10.6333 18.8833C10.835 18.7824 11.1742 18.7824 11.3758 18.8833L13.8417 20.0474C14.5475 20.3774 15.1342 19.9833 15.1342 19.1583V12.2283"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                <span>74,332</span> {{ __('cp.Reviews') }}
                                            </li>
                                            <li class="col-6">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.1167 18.0166C14.3833 18.2333 13.5167 18.3333 12.5 18.3333H7.5C6.48333 18.3333 5.61666 18.2333 4.88333 18.0166C5.06666 15.85 7.29166 14.1416 10 14.1416C12.7083 14.1416 14.9333 15.85 15.1167 18.0166Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M12.5 1.66675H7.5C3.33334 1.66675 1.66667 3.33341 1.66667 7.50008V12.5001C1.66667 15.6501 2.61667 17.3751 4.88334 18.0167C5.06667 15.8501 7.29167 14.1417 10 14.1417C12.7083 14.1417 14.9333 15.8501 15.1167 18.0167C17.3833 17.3751 18.3333 15.6501 18.3333 12.5001V7.50008C18.3333 3.33341 16.6667 1.66675 12.5 1.66675ZM10 11.8084C8.35 11.8084 7.01667 10.4668 7.01667 8.81676C7.01667 7.16676 8.35 5.83341 10 5.83341C11.65 5.83341 12.9833 7.16676 12.9833 8.81676C12.9833 10.4668 11.65 11.8084 10 11.8084Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M12.9833 8.8166C12.9833 10.4666 11.65 11.8082 10 11.8082C8.35 11.8082 7.01666 10.4666 7.01666 8.8166C7.01666 7.1666 8.35 5.83325 10 5.83325C11.65 5.83325 12.9833 7.1666 12.9833 8.8166Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                <span>899,161</span> {{ __('cp.Students') }}
                                            </li>
                                            <li class="col-6">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.5 18.3334H12.5C16.6667 18.3334 18.3333 16.6667 18.3333 12.5001V7.50008C18.3333 3.33341 16.6667 1.66675 12.5 1.66675H7.5C3.33334 1.66675 1.66667 3.33341 1.66667 7.50008V12.5001C1.66667 16.6667 3.33334 18.3334 7.5 18.3334Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M7.58333 9.99999V8.76666C7.58333 7.17499 8.70833 6.53333 10.0833 7.32499L11.15 7.94166L12.2167 8.55833C13.5917 9.34999 13.5917 10.65 12.2167 11.4417L11.15 12.0583L10.0833 12.675C8.70833 13.4667 7.58333 12.8167 7.58333 11.2333V9.99999Z"
                                                          stroke="#59CCC7" stroke-width="1.5" stroke-miterlimit="10"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span>{{ $course->trainer->trainer_course_count }}</span> {{ __('cp.Courses') }}
                                            </li>
                                        </ul>
                                    </div>


                                </div>

                                <div class="mt-3 expandedPara" style="max-height: 56px;">
                                    {!! $course->trainer->description !!}

                                </div>
                                <button class="expandBtn">{{ __('cp.See more') }}</button>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                            <div class="feedback-block">
                                <h2>
                                    Student feedback

                                </h2>
                                <div class="mt-5 row">
                                    <div class="col-md-3 col-12 d-flex flex-column justify-content-center align-items-center">
                                    <span style="
                                        font-style: normal;
                                        font-weight: 600;
                                        font-size: 80px;
                                        line-height: 32px;
                                        display: flex;
                                        align-items: center;
                                        color: #263238;
                                        /* margin-top: 25px; */
                                        ">
                                        <?php
                                        $course_rate = $course->reviews->count();
                                        $course_rate_1 = \App\Models\CourseComments::where('course_id', $course->id)
                                            ->whereBetween('rate', [0, 1.5])
                                            ->count();
                                        $course_rate_2 = \App\Models\CourseComments::where('course_id', $course->id)
                                            ->whereBetween('rate', [1.6, 2.5])
                                            ->count();
                                        $course_rate_3 = \App\Models\CourseComments::where('course_id', $course->id)
                                            ->whereBetween('rate', [2.6, 3.5])
                                            ->count();
                                        $course_rate_4 = \App\Models\CourseComments::where('course_id', $course->id)
                                            ->whereBetween('rate', [3.6, 4.5])
                                            ->count();
                                        $course_rate_5 = \App\Models\CourseComments::where('course_id', $course->id)
                                            ->whereBetween('rate', [4.6, 5])
                                            ->count();
                                        ?>

                                        <?php $rating = number_format($course->avg_rating, 2) ?>
                                        {{ $rating }}
                                    </span>
                                        <div class="stars m-0 mt-3">
                                            @for ($i = 0; $i < 5; $i++)
                                                <span class="fa fa-star {{ 5-$rating <= $i? 'checked':'' }}" @if(5-$rating > $i) style="color: rgba(38, 50, 56, 0.5)" @endif></span>
                                            @endfor

                                        </div>
                                        <p style="
                                        font-style: normal;
                                        font-weight: 400;
                                        font-size: 17px;
                                        line-height: 32px;
                                        color: rgba(144, 144, 144, 0.5);
                                    ">Course Rating</p>
                                    </div>
                                    <div class="col-md-9 col-12 mb-5">
                                        <div class="bar-block">
                                            <div class="progress mt-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0" style="width: {{ $course_rate > 0 ? $course_rate_1 / $course_rate * 100 : 0 }}%;"
                                                     aria-valuemin="10" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stars m-0 ">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span style="
                                                font-style: normal;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 32px;
                                                color: #263238;">{{ $course_rate_1 }}
                                            </span>

                                            </div>
                                        </div>
                                        <div class="bar-block">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $course_rate > 0 ? $course_rate_2 / $course_rate * 100 : 0 }}%"
                                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stars m-0 ">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span style="
                                                font-style: normal;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 32px;
                                                color: #263238;">{{ $course_rate_2 }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="bar-block">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $course_rate > 0 ? $course_rate_3 / $course_rate * 100 : 0 }}%"
                                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stars m-0">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span style="
                                                font-style: normal;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 32px;
                                                color: #263238;">{{ $course_rate_3 }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="bar-block">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $course_rate > 0 ? $course_rate_4 / $course_rate * 100 : 0 }}%"
                                                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stars m-0">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span style="
                                                font-style: normal;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 32px;
                                                color: #263238;">{{ $course_rate_4 }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="bar-block">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $course_rate > 0 ? $course_rate_5 / $course_rate * 100 : 0 }}%"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="stars m-0">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span style="
                                                font-style: normal;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 32px;
                                                color: #263238;">{{ $course_rate_5 }}
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if(count($course->reviews) > 0)
                                <div id="reviews" class="reviews-block">
                                    <h2>
                                        Reviews
                                    </h2>

                                    @foreach($course->reviews as $review)
                                        <div class="review mb-4">
                                            <img src="{{ $review->user_id && $review->user->image ? $review->user->image : url(assets('website'))."/images/imgg108.png"  }}"  alt="">
                                            <div>
                                                <span class="name">{{ $review->user_id ? $review->user->name : $review->user_name}}</span>
                                                <div class="d-flex">
                                                    <div class="stars m-0">
                                                        @for($i=0; $i < 5; $i++)
                                                            <span class="fa fa-star {{ 5-$review->rate <= $i? 'checked':'' }}" @if(5-$review->rate > $i) style="color: rgba(38, 50, 56, 0.5)" @endif></span>
                                                        @endfor
                                                    </div>

                                                    <span class="time">{{ $review->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="review-para m-0">
                                                    “{{ $review->comment }}“
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>
                    </div>
                </div>


                @if(count($coursesChoose) > 0)
                    <div class="suggestion-block col-xl-7">
                        <h2>
                            {{ __('cp.Students also bought') }}
                        </h2>
                        <div class="row">
                            @foreach($coursesChoose as $one_course)
                                <div class="col-12 col-lg-6">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $one_course->image }}">
                                        <div class="card-body">
                                        <!--<a href="" class="tag">{{ $course->category->name }}</a>-->
                                            <div>
                                                <h5 class="card-title" style="font-weight: bold !important;">{{ $one_course->title }}</h5>
                                                @if($course->discount != '' && $course->price_after_discount != '')
                                                    <p><span>{{ $course->price_after_discount ?? '0'}}</span>$</p>
                                                @else
                                                    <p><span>{{ $course->price ?? '0'}}</span>$</p>
                                                @endif
                                            </div>
                                            <p class="card-text">{{ \Illuminate\Support\Str::limit($one_course->summary, 150) }} </p>
                                            <a href="{{ route('view_course' , ['id' => $one_course->id]) }}" class="btn-filled">


                                                {{ __('cp.Register now') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        </div>




        <div class="container ">


        </div>


        <div style="height: 200px;"></div>
    </main>

@endsection

@section('script')

    {{--    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>--}}
    <script>
        $(".expandBtn").click(function () {
            $(this.previousElementSibling).toggleClass("expand");

            if ($(this.previousElementSibling).hasClass("expand")) {
                $(this).text("See Less");
            } else {
                $(this).text("See More");
            }
        });

        $("#expandSections").click(function () {

        });

        const expandAll = document.getElementById("expandSections")
        const collapseAll = document.getElementById("collapseSections")

        function expand() {
            expandAll.style.display = 'none'
            collapseAll.style.display = 'block'

            $('.collapse').collapse('show');

        }

        function collapse() {
            expandAll.style.display = 'block'
            collapseAll.style.display = 'none'
            $('.collapse').collapse('hide');
        }

    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add_to_cart').click( function() {
                // var course_id = $(this).data('id');
                var course_id = $('#course_id').attr('data-id');
                var url = "{{ route('add_to_cart' , $course->id) }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: "POST",
                    url: url,
                    data: {
                        course_id: course_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        // console.log(data , 'ddddddd');
                        // alert('add to cart success');
                        $('#cart_count').html(data.count_cart);
                        Swal.fire({
                            icon: 'success',
                            title: '{{ __('cp.Success') }}',
                            text: '{{ __('cp.The course has been added to your cart') }}!',
                            // footer: '<a href="javascript:;">Responderemos assim que possível.</a>',
                            timer: 1500,
                            timerProgressBar: true
                        })


                    },
                    error: function (data) {
                        console.log('Error:', data);
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __('cp.Error') }}',
                            text: '{{ __('cp.The course has not been added to your cart') }}!',
                            // footer: '<a href="javascript:;">Responderemos assim que possível.</a>',
                            timer: 2000,
                            timerProgressBar: true
                        })
                    }
                });
            });
        });
    </script>
    {{--    <script>--}}
    {{--        window.onscroll = function () {--}}
    {{--            myFunction()--}}
    {{--        };--}}

    {{--        var navbar = document.getElementById("stickyNavBar");--}}
    {{--        var sticky = navbar.offsetTop;--}}

    {{--        function myFunction() {--}}
    {{--            if (window.pageYOffset >= sticky) {--}}
    {{--                navbar.classList.add("sticky")--}}
    {{--            } else {--}}
    {{--                navbar.classList.remove("sticky");--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection



