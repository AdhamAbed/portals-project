<?php
$lang_f=lang();
$lang =$lang_f['lang'];
$float=$lang_f['float'];
$float_op=$lang_f['float_op'];
$dir=$lang_f['dir'];
?>

@extends('layout.app')

@section('css')


@endsection
@section('content')

    <!-- section 1-->
    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-center wow animated intro-text fadeInRightBig"
                     data-wow-delay=".4s" data-wow-duration="3s">
                    <div class="text-{{$float}}">
                        @isset($settings->header_title)
                        <h1>
                            {{ @$settings->header_title }}
                        </h1>
                        @endisset
                        <br>
                        @isset($settings->header_description)
                        <p>
                            {{ @$settings->header_description }}
                        </p>
                        @endisset
                    </div>
                    <div class="input-group md-form form-sm form-1 pl-0">
                        <input class="form-control my-0 py-1" id="search-input" type="text" placeholder="{{ __('cp.Search For Courses') }}"
                               aria-label="Search">
                        <div class="input-group-prepend">
                          <span class="input-group-text purple lighten-3" id="basic-text1">
                              <i class="fas fa-search text-white" aria-hidden="true"></i>
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7  wow animated fadeInLeftBig header-images" data-wow-delay=".4s" data-wow-duration="3s">
                    <div class="img-fluid">
                        @if($settings->efficiency != '')
                        <div class="card  qua-data  wow animated fadeInRightBig " data-wow-delay=".6s" data-wow-duration="4s" style="max-width: 540px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <p>{{ @$settings->efficiency }}</p>
                                </div>
                                <div class="col-md-2">
                                    <img src="{{url(assets('website'))}}/img/Menu.png" class="qua-img" alt="">
                                </div>
                            </div>
                        </div>
                        @endif
                    @if($settings->coaches != '')
                        <div class="card bell-data"   style="max-width: 540px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <p>{{ $settings->coaches }}</p>
                                </div>
                                <div class="col-md-2">
                                    <img src="{{url(assets('website'))}}/img/Ball_25.png" class="bell-img" alt="">

                                </div>
                            </div>
                        </div>
                    @endif
                        <!--                    </div>-->
                        <img src="{{url(assets('website'))}}/img/Box_5.png" class="box-img" alt="">
                    </div>
                    <div class="user-img">
                        <img src="{{url(assets('website'))}}/img/Mask.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="categoriesSlider owl-carousel wow animated fadeInRightBig"  data-wow-delay=".4s" data-wow-duration="3s" style="width: 100%;">

                        @foreach($categories as $category)
                        <div class="categoriesItem">
                            <div class="categoriesInfo">
                                <div class="categoryIcon">
                                    <img style="background-color: {{ $category->color ?? '#ADCDD7' }} !important;border-radius: 10px;" src="{{ $category->image }}" alt="">
                                </div>
                                <div class="categoryDetails">
                                    <h4> {{ $category->name }} </h4>
                                    <p> {{ \Illuminate\Support\Str::limit($category->description, 150) }} </p>
                                    <a href="{{ route('onlineCourses') }}" id="showMore"  style="color: {{ $category->color ?? '#ADCDD7' }} !important;"><i class="fa fa-arrow-circle-{{ $float_op }}"></i> </a>
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
    <div id="partners">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="partnersTitle" id="partnersTitle">
                        <h3>
                            {{ __('cp.partners-w') }}
                        </h3>
                    </div>
                </div>
                @isset($partners)
                <div class="col-md-12">
                    <div class="partnersSlider owl-carousel wow animated fadeInRightBig"  data-wow-delay=".4s" data-wow-duration="3s">
                        @foreach($partners as $partner)
                        <div class="partnersItem">
                            <div class="partnersImg">
                                <img src="{{ $partner->image }}" alt="{{ @$partner->name }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
    <!-- #End section 3-->

    <!-- section 4-->
    <div id="statistics">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" id="statistics_images">
                    <div class="img-fluid">
                        <img src="{{url(assets('website'))}}/img/baloon.png" class="baloon-img" alt="">
                        <img src="{{url(assets('website'))}}/img/cloud-2.png" class="cloud-img" alt="">
                        <img src="{{url(assets('website'))}}/img/cloud-2.png" class="cloud-se-img" alt="">
                    </div>
                    <div class="statisticsTitle" id="statisticsTitle">
                        <h3>
                            {{ __('cp.About the Institute of Life Industry') }}
                        </h3>
                    </div>
                </div>
                <div class="row" id="statistics_card">
                    <div class="card">
                        <img src="{{url(assets('website'))}}/img/Group_71.png" class="card-img-top" alt="...">
                        <div class="card-body">
{{--                            <h5 class="card-title" id="efficiency"> +<span class="count4"> {{intWithStyle(5555) }} </span></h5>--}}
                            <h5 class="card-title" id="efficiency"> +<span class="count"> {{ $settings->students_count ?? 0 }} </span></h5>
{{--                            <h5 class="card-title">+{{ $students }}</h5>--}}
                            <p class="card-text">{{ __('cp.Efficiency built') }}</p>
                        </div>
                        <div class="vl"></div>
                    </div>
                    <div class="card">
                        <img src="{{url(assets('website'))}}/img/Group_73.png" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" id="course"> +<span class="count"> {{ $settings->course_count ?? 0 }} </span></h5>
{{--                            <h5 class="card-title">+{{ $courses }}</h5>--}}
                            <p class="card-text">{{ __('cp.Training course') }}</p>
                        </div>
                        <div class="vl"></div>
                    </div>
                    <div class="card">
                        <img src="{{url(assets('website'))}}/img/Group_74.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" id="contract"> +<span class="count"> {{ $settings->contract_count ?? 0 }} </span></h5>
{{--                            <h5 class="card-title">+{{ count($customers) }}</h5>--}}
                            <p class="card-text">{{ __('cp.contract') }}</p>
                        </div>
                        <div class="vl"></div>
                    </div>
                    <div class="card">
                        <img src="{{url(assets('website'))}}/img/Group_75.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" id="partner"> +<span class="count"> {{ $settings->partner_count ?? 0 }} </span></h5>
{{--                            <h5 class="card-title">+{{ count($partners) }}</h5>--}}
                            <p class="card-text">{{ __('cp.success partner') }}</p>
                        </div>
                        <div class="vl"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- #End section 4-->

    <!-- section 5-->
    @isset($customers)
    <div id="customers">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="screensTitle" id="customersTitle">
                        <h3>
                            {{ __('cp.some customers') }}
                        </h3>
                    </div>
                </div>
{{--                <div class="row" id="customers_card">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                    <div class="card" id="partners">--}}
{{--                        <img src="{{ $customer->image }}" class="card-img-top" alt="{{ @$customer->name }}">--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                @isset($customers)
                    <div class="col-md-12">
                        <div class="partnersSlider owl-carousel wow animated fadeInRightBig"  data-wow-delay=".4s" data-wow-duration="3s">
                            @foreach($customers as $customer)
                                <div class="partnersItem">
                                    <div class="partnersImg" id="partners">
                                        <img src="{{ $customer->image }}" alt="{{ @$customer->name }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    @endisset
    <!-- #End section 5-->

@endsection

@section('script')

<script>
    // let counts=setInterval(updated);
    // let upto=0;
    // function updated(){
    //     var count= document.getElementById("partner");
    //     count.innerHTML=++upto;
    //     if(upto===1000)
    //     {
    //         clearInterval(counts);
    //     }
    // }

    // $('.count').each(function () {
    //     $(this).prop('Counter',0).animate({
    //         Counter: $(this).text()
    //     }, {
    //         duration: 4000,
    //         easing: 'swing',
    //         step: function (now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //     });
    // });

    // var target_top, screen_height;
    // $(function(){
    //     target_top=$('#statistics').offset().top;
    //     screen_height=$(window).height();
    //     // $('.header-section').append('<p>'+target_top+'px</p>');
    //     // $('.header-section').append('<p>'+screen_height+'px</p>');
    //     // $('.header-section').append('<p>'+Number(target_top-screen_height)+'px</p>');
    // });
    // $(window).scroll(function(){
    //     var scroll_amount=$(window).scrollTop();
    //     $('#scroll_amount').text(scroll_amount+'px');
    //     if(scroll_amount>=(target_top-screen_height)){
    //         $('.count').each(function () {
    //             $(this).prop('Counter',0).animate({
    //                 Counter: $(this).text()
    //             }, {
    //                 duration: 4000,
    //                 easing: 'swing',
    //                 step: function (now) {
    //                     $(this).text(Math.ceil(now));
    //                 }
    //             });
    //         });
    //
    //
    //     }
    // });


    // Checks if any particular element is in viewport
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementTop < viewportBottom;
    };

    // Animate numbers when scrolled into view
    // $(window).scroll(function() {
    //     var counters_triggered = false;
    //     var $counter_animated = $('.count');
    //     // var $counter_animated = $('.stat-counters > .stat > .counter > span');
    //
    //     if ($('#statistics').isInViewport() && !counters_triggered) {
    //         counters_triggered = true;
    //
    //         $.each($counter_animated, function() {
    //             var $counter = $(this);
    //             $counter.prop('Counter', 0).animate({
    //                 Counter: $counter.text()
    //             }, {
    //                 duration: 5000,
    //                 easing: 'swing',
    //                 step: function(now) {
    //                     $counter.text(Math.ceil(now));
    //                 }
    //             });
    //         });
    //     }
    // });


    // Animate numbers when scrolled into view
    $(window).scroll(function() {
        $('.count').each((i, el) => {
            // $('.stat-counters > .stat > .counter > span').each((i, el) => {
            var $counter = $(el);
            if (!$counter.isInViewport() || $counter.data('animation-started'))
                return;
            var $counter_animated = $('.count');

            $counter.data('animation-started', true).prop('Counter', 0).animate({
                Counter: $counter.text()
            }, {
                duration: 8000,
                easing: 'swing',
                step: function(now) {
                    $counter.text(Math.ceil(now));
                }
            });
        });
    });

</script>


@endsection

