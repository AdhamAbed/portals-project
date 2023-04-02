<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
?>

@extends('layout.app')

@section('content')

    <main style="margin-top: 75px">


        <div class="suggestion-block">
            <div class="py-5 mb-5" style="background-color: #F9F9F9;">
                <h2 class="page-header-2">
                    My Courses
                </h2>
                <h1 class="page-header">
                    My Courses
                </h1>
            </div>
            <div class="container ">
                <div class="row">
                    @foreach($paid_courses as $paid_course)
                        <div class="col-12 col-lg-4 col-md-6">
                            <div class="card">
                                <img class="card-img-top" src="{{ $paid_course->course->image ?? '' }}">
                                <div class="card-body">
                                    <a href="" class="tag marketing">{{ $paid_course->course->category->name ?? '' }}</a>
                                    <div>
                                        <h5 class="card-title">{{ $paid_course->course->name ?? '' }}</h5>
{{--                                        @if($paid_course->course->discount != '' && $paid_course->course->price_after_discount != '')--}}
{{--                                            <p><span>{{ $paid_course->course->price_after_discount ?? '0'}}</span>$</p>--}}
{{--                                        @else--}}
{{--                                            <p><span>{{ $paid_course->course->price ?? '0'}}</span>$</p>--}}
{{--                                        @endif--}}
                                    </div>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($paid_course->course->summary, 150) }} </p>
                                    <a href="{{ route('my_course' , ['id' => $paid_course->course->id]) }}" class="btn-filled">
                                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_858_2054)">
                                                <path d="M18.3933 4.40735L13.975 17.1007C13.7605 17.716 12.8799 17.7673 12.589 17.1886L10.1309 12.3178L18.3933 4.41467V4.40735Z"
                                                      stroke="white" stroke-width="1.3" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path d="M18.3934 4.40735L10.131 12.3105L5.03879 9.952C4.43385 9.67367 4.48745 8.82403 5.13067 8.61894L18.401 4.40002L18.3934 4.40735Z"
                                                      stroke="white" stroke-width="1.3" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_858_2054">
                                                    <rect width="23" height="22" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        {{ __('cp.Show') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>


        <div style="height: 200px;"></div>
    </main>


@endsection




