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
    <div class="container-fluid p-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                @foreach($headerSlider as $one)
                <div class="carousel-item @if($loop->first) active  @endif">
                    <img src="{{ $one->image }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption p-0 d-none d-md-block">

                        <h5>{{ $one->title }}</h5>
{{--                        <h5>{{ $one->translation()->title }}</h5>--}}
                        <p>{!!  $one->description !!}</p>
{{--                        <p>{!!  $one->translation()->description !!}</p>--}}
                    </div>
                    <div id="Start-btn" class="carousel-caption p-0 d-none d-md-block">
                        <a class="mt-3" href="">{{ __('cp.Start With Us') }}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('cp.Next') }}</span>
            </button>

            <button class="carousel-control-prev"  data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <a class="whatsApp-link" href="">
                <img src="{{url(assets('website'))}}/images/whats-app-icon.svg" alt="">
            </a>
        </div>
    </div>


    <!-- Training Section -->
    <div id="training-section" class="container pt-5 mt-5">
        <div class="Training-Container">
            <div class="Training-header">
                <h5>{{ $settings->training_features_subtitle }}</h5>
                <h1>{{ $settings->training_features_title }}</h1>
            </div>
            <div class="row p-2 mt-3">
                @foreach($features as $feature)
                <div class="col-lg-3 col-sm-12">
                    <div class="training-card-container ">
                        <div class="training-card">
                            <div class="training-logo mb-4" style="background-color: {{ $feature->color }} !important;">
                                <h3>{{ $loop->iteration }}</h3>
                            </div>
                            <h1>{{ $feature->title }}</h1>
                            <p>{!!  $feature->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="course-cont" class="container-fluid p-0">
        <div class="container pt-5 mt-5">
            <div class="Training-courses">
                <div class="Training-courses-header">
                    <h5>{{ $settings->training_courses_subtitle }}</h5>
                    <h1>{{ $settings->training_courses_title }}</h1>
                </div>
            </div>
            <div class="Subscription-options pt-4">
                <a class="Free me-3" href="">{{ __('cp.Free') }}</a>
                <a class="Paid" href="">{{ __('cp.Paid') }}</a>
            </div>


            <div class="row pb-3 pt-5">
                <div class="col-lg-3 col-sm-12">
                    <div class="Course-Card pb-3 ">
                        <div class="card ">
                            <img src="{{url(assets('website'))}}/images/Course-image.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span>Marketing</span>
                                <div class="course-content">
                                    <h5 class="card-title">Content writing course</h5>
                                    <p class="price">100$</p>

                                </div>
                                <p id="course-card-text" class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
                                <a href="#" class="register-btn">
                                    <img class="me-2" src="{{url(assets('website'))}}/images/Register.svg" alt="">
                                    Register now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-12">
                    <div class="Course-Card  pb-3 ">
                        <div class="card ">
                            <img src="{{url(assets('website'))}}/images/Course-image.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span>Marketing</span>
                                <div class="course-content">
                                    <h5 class="card-title">Content writing course</h5>
                                    <p class="price">100$</p>
                                </div>
                                <p id="course-card-text" class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
                                <a href="#" class="register-btn">
                                    <img class="me-2" src="{{url(assets('website'))}}/images/Register.svg" alt="">
                                    Register now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-12">
                    <div class="Course-Card  pb-3 ">
                        <div class="card ">
                            <img src="{{url(assets('website'))}}/images/Course-image-2.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span>Marketing</span>
                                <div class="course-content">
                                    <h5 class="card-title">Content writing course</h5>
                                    <p class="price">100$</p>
                                </div>
                                <p id="course-card-text" class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
                                <a href="#" class="register-btn">
                                    <img class="me-2" src="{{url(assets('website'))}}/images/Register.svg" alt="">
                                    Register now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-12">
                    <div class="Course-Card  pb-3 ">
                        <div class="card ">
                            <img src="{{url(assets('website'))}}/images/Course-image-2.svg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span>Marketing</span>
                                <div class="course-content">
                                    <h5 class="card-title">Content writing course</h5>
                                    <p class="price">100$</p>
                                </div>
                                <p id="course-card-text" class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
                                <a href="#" class="register-btn">
                                    <img class="me-2" src="{{url(assets('website'))}}/images/Register.svg" alt="">
                                    Register now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="consultants-section" class="container">
        <div class="consultants-container pt-5 mt-5">
            <div class="consultants-header">
                <h5>{{ $settings->training_consultants_subtitle }}</h5>
                <h1>{{ $settings->training_consultants_title }}</h1>
            </div>

            <div class="row pt-5 mt-5">
                <div class="col-lg-12 col-sm-12 pb-3">
                    <div class="owl-carousel owl-theme">
                        @foreach($consultants as $consultant)
                        <div class="item ">
                            <div class="consultants-people-container">
                                <div class="consultants-people  ">
                                    <div class="const-image">
                                        <img src="{{ $consultant->image }}" alt="">
                                    </div>
                                    <h1>{{ $consultant->name }}</h1>
                                    <p class="w-75">{!! $consultant->description !!}</p>
{{--                                    <h1>Marketing Consultant</h1>--}}
{{--                                    <p class="w-75">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="opinions-section" class="container">
        <div class="Trainees-opinions-container pt-5 mt-5">
            <div class="Trainees-header">
                <h5>{{ $settings->trainees_subtitle }}</h5>
                <h1>{{ $settings->trainees_title }}</h1>
            </div>

            <div class="row pt-4">
                <div class="col-lg-4 col-sm-12 pb-5">
                    <div class="card trainner-card ">
                        <div class="card-body">
                            <div class="card-content pb-4">
                                <p class="card-text">"</p>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text float-end pb-3">"</p>
                            </div>
                            <div class="tainner-pic">
                                <img src="{{url(assets('website'))}}/images/trainner-picture.svg" alt="">
                                <div class="trainner-pic-info ms-3">
                                    <h1>Sami Aljarosha</h1>
                                    <p>Creative Design</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 pb-5">
                    <div class="card trainner-card ">
                        <div class="card-body">
                            <div class="card-content pb-4">
                                <p class="card-text">"</p>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text float-end pb-3">"</p>
                            </div>
                            <div class="tainner-pic">
                                <img src="{{url(assets('website'))}}/images/trainner-pic-2.svg" alt="">
                                <div class="trainner-pic-info ms-3">
                                    <h1>Sami Aljarosha</h1>
                                    <p>Creative Design</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 pb-5">
                    <div class="card trainner-card ">
                        <div class="card-body">
                            <div class="card-content pb-4">
                                <p class="card-text">"</p>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text float-end pb-3">"</p>
                            </div>
                            <div class="tainner-pic">
                                <img src="{{url(assets('website'))}}/images/trainner-pic-3.svg" alt="">
                                <div class="trainner-pic-info ms-3">
                                    <h1>Sami Aljarosha</h1>
                                    <p>Creative Design</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="happy-clients" class="container-fluid p-0">
        <div class="container pt-5 mt-5">
            <div class="happy-header">
                <h5>Join Over</h5>
                <h1>+1500 Happy Clients!</h1>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-12 pb-3">
                    <div class="happy-clients-card ">
                        <div  class="card shadow-none">
                            <div class="card-body">
                                <h5 class="card-title">600+</h5>
                                <p class="card-text pt-3">Happy Clients</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 pb-3">
                    <div class="happy-clients-card ">
                        <div class="card shadow-none">
                            <div class="card-body">
                                <h5 id="trusted-title" class="card-title ">150+</h5>
                                <p  class="card-text  pt-3">Trusted Users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 pb-3">
                    <div class="happy-clients-card ">
                        <div class="card shadow-none">
                            <div class="card-body">
                                <h5 id=" projects-title" class="card-title">750+</h5>
                                <p class="card-text pt-3">Projects</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 pb-3">
                    <div class="happy-clients-card ">
                        <div class="card shadow-none">
                            <div class="card-body">
                                <h5 id="courses-title" class="card-title ">25+</h5>
                                <p class="card-text pt-3">Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bolg Section -->
    <div id="blog-section" class="container ">
        <div class="blog-header pt-5 mt-5">
            <h5>{{ $settings->blog_subtitle }}</h5>
            <h1> <span class="content1">
                {{ $settings->blog_title }}
                </span>
            </h1>
        </div>

        <div class="row pt-4">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-sm-12 pb-4 ">
                <div class="Blog-Card ">
                    <div class="card ">
                        <img src="{{ $blog->image }}" class="card-img-top" alt="...">
                        <div class="blog-card-body">
                            <div class="card-body">
                                <div class="blog-content">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <p id="card-text" class="card-text">{{ $blog->subdescription }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="see-more-articals pt-3">
            <div class="See-more-link">
                <a href="">See more articles</a>
            </div>
        </div>
    </div>


    <!-- common questions Section -->
    <div class="container">
        <div class="questions pt-5 mt-5">
            <div class="questions-header">
                <h5>{{ $settings->faqs_subtitle }}</h5>
                <h1>{{ $settings->faqs_title }}</h1>
            </div>

            <div class="accordion w-75 m-auto" id="accordionExample">
                @foreach($faqs as $faq)
                <div class="questions-accordion mb-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$faq->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {!! $faq->answer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div  class="container-fluid  p-0">
        <div class="shape-image">
            <div class="container d-flex justify-content-center align-items-center h-100">
                <div class="contact-section shadow ">
                    <div class="row">
                        <div class="col-lg-12 pt-5 pb-5 ">
                            <div class="contact-container w-75 m-auto">
                                <img src="{{url(assets('website'))}}/images/Contact-us-icon.svg" alt="">
                                <div  class="contact-content ">
                                    <p>Connect with us</p>
                                    <h1>Want your project to be unique?</h1>
                                </div>
                            </div>

                            <div class="input-field mt-5 pb-3">
                                <div class="field">
                                    <input type="text" placeholder="Email Address">
                                </div>
                                <div class="subscribe-btn">
                                    <a href="">Subscribe</a>
                                </div>
                            </div>
                            <div class="under-subscribe">
                                <p>Your email is safe with us, we dont spam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

