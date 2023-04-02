@extends('layout.app')

@section('css')
    <style>
        .pay-course-section .nav-tabs {
            border-bottom: 1px solid #ddd;
            width: 87%;
            margin-right: 29px;
        }

        .pay-course-section .nav {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .pay-course-section .nav-tabs > li {
            float: left;
            margin-bottom: -1px;
        }

        .pay-course-section .nav > li {
            position: relative;
            display: block;
        }

        .pay-course-section .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover
        .nav-tabs > li.active > a.active {
            color: #363333;
            /*cursor: default;*/
            background-color: #fff;
            /*border: 2px solid #0D5AB4;*/
            border-bottom: 4px solid #0D5AB4;
            font-family: "Montserrat-Arabic-Regular";
            font-size: 14px;
        }

        .pay-course-section .nav-tabs > li > a:hover {
            text-decoration: none;
        }
        .pay-course-section .nav-tabs > li > a {
            margin-right: 2px;
            line-height: 1.42857143;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
            color: #363333;
            font-family: "Montserrat-Arabic-Regular";
            font-size: 14px;

        }

        .pay-course-section .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 15px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


@endsection
@section('content')

    <!-- section 1-->
    <div class="view-course-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
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
                <div class="col-md-12 text-right view-course-title">
                    <h3>
                        {{ __('cp.courses_v') }} | {{ @$course->title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="pay-course-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-right ">
                    <div class="col-md-12 text-right">
                        <h3> {{ __('cp.Enter the payment method') }}</h3>
                        <small> {{ __('cp.Please fill in the information correctly') }}</small>
                    </div>

                    <div class="cache-form">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#cache" class="active">{{ __('cp.cache card') }}</a>
                        </li>
                        <li><a data-toggle="tab" href="#paypal">{{ __('cp.paypal') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="cache" class="tab-pane fade in active show">
                            <div class="row pay-course-information">
                                <div class="col-lg-7 col-md-4 course-data">
                                    <div class="col-md-12 text-right">
                                        <form class="pay-course-form default-form" method="POST" action="#"
                                              enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                   <img src="{{assets('website')}}/img/pay.png" style=" width: 100%;">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputName1" class="form-label">{{ __('cp.card number') }}</label>
                                                    <input type="text" class="form-control text-right"
                                                           id="exampleInputName1" placeholder="{{ __('cp.card number') }}">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputEmail1" class="form-label">{{ __('cp.card date') }}</label>
                                                    <input type="email" class="form-control text-right"
                                                           id="exampleInputEmail1" placeholder="{{ __('cp.card date') }}">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputSpecialization1"
                                                           class="form-label">{{ __('cp.card code number') }}</label>
                                                    <input type="text" class="form-control text-right"
                                                           id="exampleInputSpecialization1"
                                                           placeholder="{{ __('cp.card code number') }}">
                                                </div>

                                                <button type="submit"
                                                        class="btn btn-primary text-right pay-v-course">{{ __('cp.pay') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="paypal" class="tab-pane fade">
                            <div class="row pay-course-information">
                                <div class="col-lg-7 col-md-4 course-data">
                                    <div class="col-md-12 text-right">
                                        <form class="pay-course-form default-form" method="POST" action="#"
                                              enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputName1" class="form-label">الاسم</label>
                                                    <input type="text" class="form-control text-right"
                                                           id="exampleInputName1" placeholder="الاسم">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputEmail1" class="form-label">الايميل</label>
                                                    <input type="email" class="form-control text-right"
                                                           id="exampleInputEmail1" placeholder="الايميل">
                                                </div>
                                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                    <label for="exampleInputSpecialization1"
                                                           class="form-label">التخصص</label>
                                                    <input type="text" class="form-control text-right"
                                                           id="exampleInputSpecialization1"
                                                           placeholder="مصمم واجهة مستخدم">
                                                </div>

                                                <button type="submit"
                                                        class="btn btn-primary text-right pay-v-course">{{ __('cp.pay') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="request-details-pay-card">
                        <div class="card course-details">
                            <div class="card-header">
                                {{ __('cp.request details') }}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <small class="text-right"> {{ __('cp.course price') }}</small>
                                    <small class="text-left"> {{ $course->price }} </small>
                                </li>
                                <li class="list-group-item">
                                    <small class="text-right"> {{ __('cp.subtotal') }}</small>
                                    <small class="text-left"> {{ $course->price }} </small>
                                </li>
                                <li class="list-group-item">
                                    <small class="text-right"> {{ __('cp.course tax') }}</small>
                                    <small class="text-left"> {{ $course->price }} </small>
                                </li>
                                <li class="list-group-item">
                                    <small class="text-right"> {{ __('cp.request total') }}</small>
                                    <small class="text-left"> {{ $course->price }} </small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
