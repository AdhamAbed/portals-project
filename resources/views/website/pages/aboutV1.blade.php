@extends('layout.app')

@section('content')

    <!-- section 1-->
    <div class="view-course-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('about') }}" class="link-page active">{{ __('cp.about-us') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-right jobs-title">
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
                <div class="col-md-8 text-right">
                    <h3>{{ $item->header_title }} </h3>
                    <p> {{ $item->header_description }}</p>
                </div>
                <div class="col-md-4 text-left">
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
                <div class="card mb-2 first-goal" style="max-width: 370px;">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="background-img"></div>
                            <img src="{{url(assets('website'))}}/img/about1.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->first_goal_title }}</h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($item->first_goal_description, 77) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2 second-goal" style="max-width: 370px;">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="background-img"></div>
                            <img src="{{url(assets('website'))}}/img/about2.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $item->second_goal_title }}</h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($item->second_goal_description, 77) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 third-goal" style="max-width: 370px;">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="background-img"></div>
                            <img src="{{url(assets('website'))}}/img/about3.png" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $item->third_goal_title }}</h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($item->third_goal_description, 77) }}
                                </p>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-2 text-right">
                        <img src="{{ $settings->colorful_logo }}" class="card-img" alt="...">
{{--                        <img src="{{url(assets('website'))}}/img/logo.png" class="card-img" alt="...">--}}
                    </div>
                    <div class="col-md-10 text-left">
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
                    <div class="card" style="width: 20rem;">
                        <img src="{{url(assets('website'))}}/img/wh1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->first_reason_title }}</h5>
                            <p class="card-text">{{ $item->first_reason_description }}</p>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img src="{{url(assets('website'))}}/img/wh2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->second_reason_title }}</h5>
                            <p class="card-text">{{ $item->second_reason_description }}</p>

                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img src="{{url(assets('website'))}}/img/wh3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->third_reason_title }}</h5>
                            <p class="card-text">{{ $item->third_reason_description }}</p>

                        </div>
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
                <div class="card" style="width: 20rem;">
                    <img src="{{ $item->first_certificate_image }}" class="card-img-top" alt="...">
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{ $item->second_certificate_image }}" class="card-img-top" alt="...">
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{ $item->third_certificate_image }}" class="card-img-top" alt="...">
                </div>
            </div>

        </div>
    </div>
    <!-- #End section 5-->

@endsection




