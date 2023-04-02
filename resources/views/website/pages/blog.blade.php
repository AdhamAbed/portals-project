<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
?>

@extends('layout.app')
@section('css')
    <style>

        p.card-text {
            height: auto !important;
        }
    </style>

@endsection

@section('content')

    <main style="margin-top: 75px">


        <div class="suggestion-block">
            <div class="py-5 mb-5" style="background-color: #F9F9F9;">
                <h2 class="page-header-2">
                    {{ __('cp.Blog') }}
                </h2>
                <h1 class="page-header">
                    {{ __('cp.Latest Press Release News & Articles') }}
                </h1>
            </div>
            <div class="container ">
                <div class="row">
                    @foreach($items as $blog)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card">
                            <a href="{{ route('show_blog' , $blog->id) }}">
                            <img class="card-img-top" src="{{ $blog->image }}" alt="{{ $blog->image }}">
                            <div class="card-body p-4" style="height: 140px; overflow: hidden;">
                                <p class="card-text">
                                    {{ date('d M, Y', strtotime($blog->date)) }}
                                </p>
                                <h5 class="card-title">
                                    {{ $blog->title }}
{{--                                    {{ \Illuminate\Support\Str::limit($blog->subdescription, 250) }}--}}
                                </h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div style="height: 200px;"></div>
    </main>


@endsection




