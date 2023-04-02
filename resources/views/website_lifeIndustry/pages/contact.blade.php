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
                    <a href="{{ route('home') }}" class="link-page">  {{ __('cp.home') }}</a>
                /
                <a href="{{ route('contact') }}" class="link-page active">{{ $item->title }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-{{ $float }} jobs-title">
                <h3>
                    {{ $item->title }}
                </h3>
            </div>
        </div>
    </div>
</div>
<!-- #End section 1-->
<!-- section 2-->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-{{ $float }}">
                <img src="{{url(assets('website'))}}/img/whatsapp-logo.png" width="8%" class="image" alt="...">
{{--                <h5> {{ $item->header_title }} </h5>--}}
                <p>
                    {{ $item->header_description }}
                </p>
            </div>
        </div>
        <div class="row contacts-form" id="contact_form">
            <div class="col-md-12 text-{{ $float }}">
                @if ($errors->any())
                    <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                        {!! implode('', $errors->all('<div>- :message</div>')) !!}
                    </div>
                @endif
                <form method="post" action="{{ route('sendContactRequest') }}"
                      enctype="multipart/form-data"  class="contact-form default-form">
                    {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputName1" class="form-label">{{ __('cp.name') }}</label>
                        <input type="text" name="name" class="form-control text-{{ $float }}" id="exampleInputName1" placeholder="{{ __('cp.name') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputEmail1" class="form-label">{{ __('cp.email') }}</label>
                        <input type="email" name="email" class="form-control text-{{ $float }}" id="exampleInputEmail1" placeholder="{{ __('cp.email') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputSpecialization1" class="form-label">{{ __('cp.subject') }}</label>
                        <input type="text" name="subject" class="form-control text-{{ $float }}" id="exampleInputSpecialization1" placeholder="{{ __('cp.subject') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputPhone1" class="form-label">{{ __('cp.phone') }}</label>
                        <input type="text" name="phone" class="form-control text-{{ $float }}" id="exampleInputPhone1" placeholder="{{ __('cp.phone') }}">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label for="exampleFormControlTextarea1" class="form-label">{{ __('cp.any question') }}</label>
                        <textarea class="form-control text-{{ $float }}" name="message" placeholder="{{ __('cp.any question') }}" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-center send-job">{{ __('cp.send') }}</button>
{{--                    <div id="jobHelp" class="form-text text-center">{{ __('cp.We will get back to you within 1 to 2 business days') }}</div>--}}
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- #End section 2-->
<!-- section 3 -->
<section class="contact-data">
    <div class="contact-data-list">
        <div class="container">
            <div class="row text-center">
                <div class="card" style="width: 20rem;">
                    <img src="{{url(assets('website'))}}/img/whatsapp-logo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->first_goal_title }}</h5>
                        <p class="card-text">{{ $item->first_goal_description }}</p>
                        <a href="https://api.whatsapp.com/send?phone={{ $settings->whatsapp }}&text=Hi!" target="_blank" class="btn btn-primary support-center-btn">{{ __('cp.support center') }}</a>

                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{url(assets('website'))}}/img/contact2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->second_goal_title }}</h5>
                        <p class="card-text">{{ $item->second_goal_description }}</p>
                        <p class="card-text contact-phone">{{ $settings->phone }}</p>

                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{url(assets('website'))}}/img/contact3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->third_goal_title }}</h5>
                        <p class="card-text">{{ $item->third_goal_description }}</p>
                        <p class="card-text contact-email">
                            <a href="mailto:{{ @$settings->info_email }}"> {{ $settings->info_email }}</a>
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- #End section 3-->
<!-- section 4-->
<section class="about-data">
    <div class="job-search">
        <div class="container">
            <div class="row text-center">
                @isset($settings->stay_informed_title)
                    <h3>  {{ @$settings->stay_informed_title }}</h3>
                @endisset
                @isset($settings->stay_informed_description)
                    <p>
                        {{ @$settings->stay_informed_description }}
                    </p>
                @endisset
            </div>
            <div class="row text-center search-input">
                <div class="input-group col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control my-0 py-1" id="search_job" type="text"
                           placeholder="{{ __('cp.Enter your e-mail address') }}"
                           aria-label="Search">
                    <div class="input-group-prepend">
                          <span class="input-group-text purple lighten-3" id="basic_text_job">
                              <i class="fas fa-paper-plane text-white" aria-hidden="true"></i>
                          </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #End section 4-->

@endsection
