<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
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
<div class="register-course-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-{{ $float }}">
                <h3> {{ __('cp.courses_v') }} | {{ @$course->title }}</h3>
                <small> {{ __('cp.Please fill out the course registration form') }}</small>
            </div>
        </div>
        <div class="row register-course-information">
            <div class="col-lg-7 col-md-4 course-data">
                <div class="col-md-12 text-{{ $float }}">
                    @if ($errors->any())
                        <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                            {!! implode('', $errors->all('<div>- :message</div>')) !!}
                        </div>
                    @endif
                    <form class="register-course-form default-form" method="POST" action="{{ route('course_register' , ['id' => $course->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputCourseName1" class="form-label">{{ __('cp.course name') }}</label>
                               <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <input type="text" class="form-control text-{{ $float }}" id="exampleInputCourseName1"
                                       placeholder="{{ __('cp.course name') }}" value="{{ $course->title }}" disabled>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputType1" class="form-label">{{ __('cp.course type') }}</label>

                                @if($course->type == 'online')
                                <input type="text" class="form-control text-{{ $float }}" id="exampleInputType1"
                                       value=" {{ __('cp.online') }}" disabled>
                                @else
                                <input type="text" class="form-control text-{{ $float }}" id="exampleInputType1"
                                       value="{{ __('cp.live') }}" disabled>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputName1" class="form-label">{{ __('cp.user name') }}</label>
                                <input type="text" name="name" class="form-control text-{{ $float }}" id="exampleInputName1"
                                       placeholder="{{ __('cp.user name') }}" @if(Auth::check()) value="{{ auth()->user()->name }}" @endif>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputEmail1" class="form-label">{{ __('cp.email') }}</label>
                                <input type="email" name="email" class="form-control text-{{ $float }}" id="exampleInputEmail1"
                                       placeholder="{{ __('cp.email') }}" @if(Auth::check()) value="{{ auth()->user()->email }}" @endif>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputEmail1" class="form-label">{{ __('cp.gender') }}</label>
                                <select name="gender" class="form-control text-{{ $float }}">
                                    <option value="male"> {{ __('cp.male') }}</option>
                                    <option value="female"> {{ __('cp.female') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputSpecialization1" class="form-label">{{ __('cp.job title') }}</label>
                                <input type="text" name="job_title" class="form-control text-{{ $float }}" id="exampleInputSpecialization1"
                                       placeholder="{{ __('cp.job title') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputSpecialization1" class="form-label">{{ __('cp.company') }}</label>
                                <input type="text" name="company_name" class="form-control text-{{ $float }}" id="exampleInputSpecialization1"
                                       placeholder="{{ __('cp.company') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputPhone1" class="form-label">{{ __('cp.phone') }}</label>
                                <input type="text" name="phone" class="form-control text-{{ $float }}" id="exampleInputPhone1"
                                       placeholder="{{ __('cp.phone') }}" @if(Auth::check()) value="{{ auth()->user()->phone }}" @endif>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputPhone1" class="form-label">{{ __('cp.country') }}</label>
                                <select name="country_id" class="form-control text-{{ $float }}">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 course-subscribe">
                                <label class="form-label">{{ __('cp.course subscribe') }}</label>
                                <input type="checkbox" name="yes" value="yes" checked><span> {{ __('cp.I want to receive news') }}</span>
                                <br><br>
                                <input type="checkbox" name="no" value="no"><span> {{ __('cp.By registering with us') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary text-{{ $float }} pay-course">{{ __('cp.register and pay') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="request-details-card">
                <div class="card course-details">
                        <div class="card-header">
                            {{ __('cp.request details') }}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <small class="text-{{ $float }}"> {{ __('cp.course price') }}</small>
                                <small class="text-{{ $float_op }}"> {{ $course->price }} </small>
                            </li>
                            <li class="list-group-item">
                                <small class="text-{{ $float }}"> {{ __('cp.subtotal') }}</small>
                                <small class="text-{{ $float_op }}"> {{ $course->price }} </small>
                            </li>
                            <li class="list-group-item">
                                <small class="text-{{ $float }}"> {{ __('cp.course tax') }}</small>
                                <small class="text-{{ $float_op }}"> {{ $course->price }} </small>
                            </li>
                            <li class="list-group-item">
                                <small class="text-{{ $float }}"> {{ __('cp.request total') }}</small>
                                <small class="text-{{ $float_op }}"> {{ $course->price }} </small>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #End section 2-->


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
