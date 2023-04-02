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
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('onlineCourses') }}" class="link-page active">{{ __('cp.Professional education courses') }}</a>
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
<!--    --><?php
//    $images = [
//        'Rectangle27.png' , 'Rectangle28.png' , 'Rectangle29.png'
//        ]
//    ?>
{{--    @foreach($images as $image)--}}
{{--        <?php  $rand =  url(assets('website')).'/img/'.$image; ?>--}}
{{--        {{ dd($rand) }}--}}
{{--    @endforeach--}}
    <div class="course-categories-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="courseCategoriesSlider owl-carousel">
                        @foreach($courses_categories as $courses_category)
                            <div class="course-categories-item">
                                <div class="course-categories-info">
                                    <div class="course-category-img"
                                     style="background-color: {{ $courses_category->color ?? '#ADCDD7' }};
                                    background-repeat: no-repeat;
                                    background-size: cover;">
                                        <img src=" {{ $courses_category->image }}" alt=" {{ $courses_category->name }}">
                                    </div>
                                    <div class="course-category-info">
                                        <a href="{{ route('categoryOnlineCourses' , ['id' => $courses_category->id]) }}">
                                            <h6> {{ @$courses_category->name }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->
    <div class="courses-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-{{ $float }}">
                    <h3>  {{ __('cp.Professional education courses') }}</h3>
                </div>
                <div class="col-md-4 text-{{ $float_op }} course-category-name">
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
                            @else
                                <div class="course-type">
                                    <a class="tap-active">
                                        <input type="radio" id="online_course_type" checked>
                                        <span>{{ __('cp.online') }}</span>
                                    </a>
                                </div>
                            @endif
                                <div class="on-course-favorite">
                                    <form action="{{ route('user.add_favorite' , ['id' =>$course->id]) }}"
                                          method="post">
                                        @csrf
                                        @if(auth()->check())
                                        @if(count($course->favorite) > 0)
                                            <button type="submit" class="dropdown-item text-{{ $float_op }}">
                                                <i class="fas fa-heart fav"></i></button>
                                        @else
                                            <button type="submit" class="dropdown-item text-{{ $float_op }}">
                                                <i class="fas fa-heart"></i></button>
                                        @endif
                                        @else
                                            <button type="submit" class="dropdown-item text-{{ $float_op }}">
                                                <i class="fas fa-heart"></i></button>
                                        @endif
                                    </form>
                                </div>
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
    <!-- #End section 3-->

@endsection




