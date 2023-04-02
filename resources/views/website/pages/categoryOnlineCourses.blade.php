<?php
$lang_f=lang();
$lang =$lang_f['lang'];
$float=$lang_f['float'];
$float_op=$lang_f['float_op'];
$dir=$lang_f['dir'];
?>



@extends('layout.app')

@section('content')

    <!-- section 1-->
    <div class="courses-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-{{ $float }}">
                    <a href="{{ route('home') }}" class="link-page">{{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('onlineCourses') }}" class="link-page"> {{ __('cp.Professional education courses') }}</a>
                    /
                    <a href="{{ route('categoryOnlineCourses' , ['id' => $course_category->id]) }}" class="link-page active"> {{ @$course_category->name }} </a>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} courses-title">
                    <h3>
                        {{ __('cp.Professional education courses') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="courses-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-{{ $float }}">
                    <div class="img-live">
                        <img src="{{url(assets('website'))}}/img/live_c.png">
                    </div>
                    <h5>  {{ @$course_category->name }} </h5>
                </div>
                <div class="col-md-4 text-{{$float_op}} course-category-name">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{ route('onlineCourses') }}" class="tap-active">
                                <input type="radio" name="active" checked>
                                <span>{{ __('cp.online') }}</span>
                            </a>
                        </li>
                        <h3> | </h3>
                        <li class="nav-item">
                            <a href="{{ route('selfLearningCourses') }}">
                                <input type="radio" name="not_active" checked>
                                <span>{{ __('cp.live') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row courses-list">
                @isset($courses)
                    @foreach($courses as $course)
                        <div class="card">
                            @if($course->discount != '')
                                <div class="sale-course"> {{ __('cp.discount_v') }}{{ $course->discount }}%</div>
                            @endif
                            <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                            <div class="card-body">
                                <h5 class="card-title course-title">{{ $course->title }}</h5>
                                <?php
                                $courses_rate = \App\Models\CourseComments::where('course_id' , $course->id)->get()
                                ?>
                                <div class="course-rate">
                                    @if(count($courses_rate) > 0 )
                                        <?php $rating = number_format($course->avg_rating , 2) ?>
                                        {{--                                            @foreach(range(1,5) as $i)--}}
                                        {{--                                                <span class="fa-stack" style="width:1em">--}}
                                        {{--                                                         <i class="far fa-star fa-stack-1x"></i>--}}
                                        {{--                                                          @if($rating >0)--}}
                                        {{--                                                        @if($rating >0.5)--}}
                                        {{--                                                            <i class="fas fa-star fa-stack-1x"></i>--}}
                                        {{--                                                        @else--}}
                                        {{--                                                            <i class="fas fa-star-half-empty fa-stack-1x"></i>--}}
                                        {{--                                                        @endif--}}
                                        {{--                                                    @endif--}}
                                        {{--                                                    @php $rating--; @endphp--}}
                                        {{--      </span>--}}
                                        {{--                                            @endforeach--}}

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
                                        {{ $course->price ?? '0'}} {{ __('cp.dollars') }}
                                    </p>
                                @endif
                                <a href="{{ route('view_course' , ['id' => $course->id]) }}" class="btn btn-primary course-register">{{ __('cp.Register now') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
    <!-- #End section 2-->

@endsection




