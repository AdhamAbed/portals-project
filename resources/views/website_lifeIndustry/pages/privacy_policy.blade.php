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
                    <a href="{{ route('privacy') }}" class="link-page active">{{ __('cp.privacy policy') }}</a>
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
    <div class="privacy-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <h3>{{ $item->title }} </h3>
                    <p> {!! $item->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->
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
    <!-- #End section 3-->

@endsection
