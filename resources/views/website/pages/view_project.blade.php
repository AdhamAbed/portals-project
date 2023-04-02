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
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}
                    </a>
                    /
                    <a href="{{ route('projects') }}" class="link-page active">{{ __('cp.manage_projects') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} projects-title">
                    <h3>
                        {{ __('cp.manage_projects') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="project-section-v">
        <div class="container">

{{--            <div class="row project-featured-image project-featured-image-2"--}}
{{--                 style="background-image: url({{ $project->image }});background-repeat: no-repeat;background-size: cover">--}}

               <div class="row">
                   <img class="project-featured-image project-featured-image-2" src="{{ $project->image }}">
                   <div class="featured-project-image"></div>
                   <div class="col-md-12 text-center">
                    <h3> {{ $project->title }} </h3>
                    <p> {{ \Illuminate\Support\Str::limit($project->subdescription, 100) }}</p>
                    <span class="
                    project-date">
                               <small>

                                  {{ \Carbon\Carbon:: parse($project->date)->toDateString() }}
                               </small>
                                |
                                 <small>
                                   {{ $project->customer_name }}
                               </small>
                            </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <h3> {{ $project->title }} </h3>
                    <p>
                        {{ $project->description }}
                        {{ $project->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- #End section 2-->
    <!-- #section 3-->
{{--    {{ dd(app()->getLocale())}}--}}
{{--    @if(app()->getLocale() == 'en')--}}
    <div class="project-image-list"
{{--         @if(str_word_count($project->description) <= 100) style="margin-top: 250px"--}}
{{--         @elseif(str_word_count($project->description) <= 200) style="margin-top: 550px"--}}
{{--         @elseif(str_word_count($project->description) <= 300) style="margin-top: 820px"--}}
{{--         @elseif(str_word_count($project->description) <= 400) style="margin-top: 1050px"--}}
{{--         @elseif(str_word_count($project->description) <= 500) style="margin-top: 1380px"--}}
{{--         @elseif(str_word_count($project->description) <= 600) style="margin-top: 1580px"--}}
{{--         @elseif(str_word_count($project->description) <= 700) style="margin-top: 1780px"--}}
{{--         @elseif(str_word_count($project->description) <= 800) style="margin-top: 2080px"--}}
{{--         @elseif(str_word_count($project->description) <= 900) style="margin-top: 2350px"--}}
{{--         @elseif(str_word_count($project->description) <= 1000) style="margin-top: 2650px"--}}
{{--         @elseif(str_word_count($project->description) >= 1000) style="margin-top: 3250px"--}}
{{--            @endif--}}
    >
{{--        @else--}}
{{--            <div class="project-image-list" @if(str_word_count($project->description) <= 100) style="margin-top: 150px"--}}
{{--                 @elseif(str_word_count($project->description) <= 200) style="margin-top: 310px"--}}
{{--                 @elseif(str_word_count($project->description) <= 300) style="margin-top: 320px"--}}
{{--                 @elseif(str_word_count($project->description) <= 400) style="margin-top: 450px"--}}
{{--                 @elseif(str_word_count($project->description) <= 500) style="margin-top: 580px"--}}
{{--                 @elseif(str_word_count($project->description) <= 600) style="margin-top: 640px"--}}
{{--                 @elseif(str_word_count($project->description) <= 700) style="margin-top: 780px"--}}
{{--                 @elseif(str_word_count($project->description) <= 800) style="margin-top: 880px"--}}
{{--                 @elseif(str_word_count($project->description) <= 900) style="margin-top: 950px"--}}
{{--                 @elseif(str_word_count($project->description) <= 1000) style="margin-top: 1050px"--}}
{{--                 @elseif(str_word_count($project->description) >= 1000) style="margin-top: 1350px"--}}
{{--                    @endif>--}}
{{--        @endif--}}
        <div class="container">
            <div class="row project-photos">
                <div class="col-md-12 col-sm-12">
                    <div class="courseChooseSlider owl-carousel">
                        @foreach($project->photos as $photo)
                            <div class="card">
                                <div class="single-project-image"></div>
                                <img src="{{ $photo->image }}" class="card-img-top" alt="{{ $project->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
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



