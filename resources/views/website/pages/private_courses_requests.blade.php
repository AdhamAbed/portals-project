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
                <a href="{{ route('privateCoursesRequest') }}" class="link-page active">{{ __('cp.private Course Request') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-{{ $float }} jobs-title">
                <h3>
                    {{ __('cp.private Course Request') }}
                </h3>
            </div>
        </div>
    </div>
</div>
<!-- #End section 1-->
<!-- section 2-->
<div class="contact-section">
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-md-12 text-{{ $float }}">--}}
{{--                <h5> {{ ('cp.private Course Request') }} </h5>--}}
{{--                <p>--}}
{{--                    {{ __('cp.private Course Request description') }}--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row contacts-form" id="contact_form">
            <div class="col-md-12 text-{{ $float }}">
                @if ($errors->any())
                    <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                        {!! implode('', $errors->all('<div>- :message</div>')) !!}
                    </div>
                @endif
                <form method="post" action="{{ route('sendPrivateCourseRequest') }}"
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
                        <label for="exampleInputSpecialization1" class="form-label">{{ __('cp.company') }}</label>
                        <input type="text" name="company" class="form-control text-{{ $float }}" id="exampleInputSpecialization1" placeholder="{{ __('cp.company') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputPhone1" class="form-label">{{ __('cp.mobile') }}</label>
                        <input type="text" name="mobile" class="form-control text-{{ $float }}" id="exampleInputPhone1" placeholder="{{ __('cp.mobile') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleInputLocation1" class="form-label">{{ __('cp.location') }}</label>
                        <input type="text" name="location" class="form-control text-{{ $float }}" id="exampleInputLocation1" placeholder="{{ __('cp.location') }}">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label for="exampleFormControlTextarea1" class="form-label">{{ __('cp.details') }}</label>
                        <textarea class="form-control text-{{ $float }}" name="details" placeholder="{{ __('cp.details') }}" id="exampleFormControlTextarea1" rows="3"></textarea>
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

@endsection
