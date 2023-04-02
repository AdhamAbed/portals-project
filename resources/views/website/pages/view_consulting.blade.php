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
                    <a href="{{ route('consultations') }}" class="link-page active">{{ __('cp.consulting') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} projects-title">
                    <h3>
                        {{ __('cp.consulting') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="consulting-section-v">
        <div class="container">

{{--            <div class="row consulting-featured-image consulting-featured-image-2"--}}
{{--                 style="background-image: url({{ $category->header_image }});background-repeat: no-repeat;background-size: cover">--}}
               <div class="row">
                   <img class="consulting-featured-image consulting-featured-image-2" src="{{ $category->header_image }}">
                   <div class="featured-consulting-image"></div>
                   <div class="col-md-12 text-center image-description">
                    <h3>{{ $category->name }} </h3>
                       <p>
                           {{ $category->sub_description }}
                       </p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-{{ $float }} consulting-description">
                    <h3>{{ $category->name }} </h3>
                    <p>
                        {{ $category->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 2-->
    </div>
    <!-- #section 3-->
{{--    @if(app()->getLocale() == 'en')--}}
    <div class="jobs-section"
{{--         @if(str_word_count($category->description) <= 100) style="margin-top: 250px"--}}
{{--         @elseif(str_word_count($category->description) <= 200) style="margin-top: 350px"--}}
{{--         @elseif(str_word_count($category->description) <= 300) style="margin-top: 520px"--}}
{{--         @elseif(str_word_count($category->description) <= 400) style="margin-top: 650px"--}}
{{--         @elseif(str_word_count($category->description) <= 500) style="margin-top: 780px"--}}
{{--         @elseif(str_word_count($category->description) <= 600) style="margin-top: 880px"--}}
{{--         @elseif(str_word_count($category->description) <= 700) style="margin-top: 980px"--}}
{{--         @elseif(str_word_count($category->description) <= 800) style="margin-top: 1080px"--}}
{{--         @elseif(str_word_count($category->description) <= 900) style="margin-top: 1150px"--}}
{{--         @elseif(str_word_count($category->description) <= 1000) style="margin-top: 1250px"--}}
{{--         @elseif(str_word_count($category->description) >= 1000) style="margin-top: 1450px"--}}
{{--         @endif--}}
         id="sendConsulting">
{{--        @else--}}
            <div class="jobs-section"
{{--                 @if(str_word_count($category->description) <= 100) style="margin-top: 150px"--}}
{{--                 @elseif(str_word_count($category->description) <= 200) style="margin-top: 220px"--}}
{{--                 @elseif(str_word_count($category->description) <= 300) style="margin-top: 280px"--}}
{{--                 @elseif(str_word_count($category->description) <= 400) style="margin-top: 330px"--}}
{{--                 @elseif(str_word_count($category->description) <= 500) style="margin-top: 390px"--}}
{{--                 @elseif(str_word_count($category->description) <= 600) style="margin-top: 450px"--}}
{{--                 @elseif(str_word_count($category->description) <= 700) style="margin-top: 480px"--}}
{{--                 @elseif(str_word_count($category->description) <= 800) style="margin-top: 480px"--}}
{{--                 @elseif(str_word_count($category->description) <= 900) style="margin-top: 550px"--}}
{{--                 @elseif(str_word_count($category->description) <= 1000) style="margin-top: 600px"--}}
{{--                 @elseif(str_word_count($category->description) >= 1000) style="margin-top: 1000px"--}}
{{--                    @endif--}}
                 id="sendConsulting">
{{--                @endif--}}
        <div class="container">
            <div class="row jobs-form">
                <div class="col-md-12 text-{{ $float }}">
                    @if ($errors->any())
                        <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                            {!! implode('', $errors->all('<div>- :message</div>')) !!}
                        </div>
                    @endif
{{--                    <form class="job-form default-form" method="POST" action="#" enctype="multipart/form-data">--}}
                        <form method="post" action="{{ route('storeConsultations') }}"
                              enctype="multipart/form-data"  class="job-form default-form">
                            {{ csrf_field() }}
                      <input type="hidden" value="{{ $category->id }}" name="consultation_category_id">
                        <div class="row clearfix">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputName1" class="form-label">{{ __('cp.name') }}</label>
                                <input type="text" class="form-control text-{{ $float }}" name="name" id="exampleInputName1" placeholder="{{ __('cp.name') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputEmail1" class="form-label">{{ __('cp.email') }}</label>
                                <input type="email" class="form-control text-{{ $float }}" name="email" id="exampleInputEmail1" placeholder="{{ __('cp.email') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputSpecialization1" class="form-label">{{ __('cp.subject') }}</label>
                                <input type="text" class="form-control text-{{ $float }}" name="question" id="exampleInputSpecialization1" placeholder="{{ __('cp.consulting subject') }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <label for="exampleInputPhone1" class="form-label">{{ __('cp.phone number') }}</label>
                                <input type="text" class="form-control text-{{ $float }}" name="phone" id="exampleInputPhone1" placeholder="{{ __('cp.phone number') }}">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label for="exampleFormControlTextarea1" class="form-label">{{ __('cp.any question') }}</label>
                                <textarea class="form-control text-{{ $float }}" name="details" placeholder="{{ __('cp.any question') }}" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary text-center send-job">{{ __('cp.send question') }}</button>
{{--                            <div id="jobHelp" class="form-text text-center">{{ __('cp.We will get back to you within 1 to 2 business days') }}</div>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 3-->

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



