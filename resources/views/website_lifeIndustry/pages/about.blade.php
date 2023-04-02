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
    <div class="view-course-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('about') }}" class="link-page active">{{ __('cp.about-us') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} jobs-title">
                    <h3>
                        {{ __('cp.about-us') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="col-md-10 about_us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-{{ $float }}">
                    <h3>{{ $item->header_title }} </h3>
                    <p> {{ $item->header_description }}</p>
                </div>
                <div class="col-md-4 text-{{ $float_op }}">
                    <img src="{{ $item->header_image }}" class="card-img" alt="...">
                    {{--                    <img src="{{url(assets('website'))}}/img/about-user.png" class="card-img" alt="...">--}}
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->
    <div class="col-md-12 about_us_goals">
        <div class="container">
            <div class="row about-goals">
                <div class="goalsSlider owl-carousel">
                    @if(isset($main_goals))
                        @foreach($main_goals as $main_goal)
                            <div class="goalItem row">
                                @foreach($main_goal as $goal)
                                    <div class="card mb-2 first-goal" style="max-width: 370px;">
                                        @if(session()->get('locale') == 'en')
                                        <div class="row g-0">
                                            <div class="col-md-9">
                                                <div class="card-body" style="text-align: left">
                                                    @if(isset($goal->goal_title))
                                                    <h5 class="card-title">{{ $goal->goal_title }}</h5>
                                                     @endif
                                                    @if(isset($goal->goal_description))
                                                    <p class="card-text">
                                                        {{ \Illuminate\Support\Str::limit($goal->goal_description, 77) }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="background-img"></div>
                                                <img src="{{url(assets('website'))}}/img/about1.png"
                                                     class="img-fluid rounded-start" alt="...">
                                            </div>
                                        </div>
                                        @else
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <div class="background-img"></div>
                                                    <img src="{{url(assets('website'))}}/img/about1.png"
                                                         class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $goal->goal_title }}</h5>
                                                        <p class="card-text">
                                                            {{ \Illuminate\Support\Str::limit($goal->goal_description, 77) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 3-->
    <!-- section 4-->
    <section class="about-data">
        <div class="col-md-10 info_about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-{{ $float }}">
                        <img src="{{ $settings->colorful_logo }}" class="card-img" alt="...">
                        {{--                        <img src="{{url(assets('website'))}}/img/logo.png" class="card-img" alt="...">--}}
                    </div>
                    <div class="col-md-10 text-{{ $float_op }}">
                        <h3>{{ $item->title }} </h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="why_life_industry">
            <div class="container">
                <div class="row text-center">
                    <h3>{{ __('cp.why life') }}</h3>
                    <p>{{ $item->reasons_sub_description }}</p>
                </div>
                <div class="row text-center">
                    <div class="goalsSlider owl-carousel">
                        @if(isset($main_reasons))
                            @foreach($main_reasons as $main_reason)
                                <div class="goalItem row">
                                    @foreach($main_reason as $reason)
                                        <div class="card" style="width: 20rem;">
                                            <img src="{{url(assets('website'))}}/img/wh1.png" class="card-img-top"
                                                 alt="...">
                                            <div class="card-body">
                                                @if(isset($reason->reason_title))
                                                <h5 class="card-title">{{ $reason->reason_title }}</h5>
                                                @endif
                                                @if(isset($reason->reason_description))
                                                <p class="card-text">{{ $reason->reason_description }}</p>
                                                @endif
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
    </section>
    <!-- #End section 4-->
    <!-- section 5-->
    <div class="certificates">
        <div class="container">
            <div class="row text-center">
                <h3>{{ __('cp.certificates') }}</h3>
                <p>{{ $item->certificates_sub_description }}</p>
            </div>
            <div class="row text-center">
                <div class="goalsSlider owl-carousel">

                    @foreach($item->certificate_images as $one)
                        <div class="goalItem row">
                            <div class="card" style="width: 20rem;">
                                <img src="{{ $one->image }}" class="card-img-top" alt="...">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- #End section 5-->

@endsection




