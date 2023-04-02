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
    <div class="consulting-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-{{ $float }}">
                    <a href="{{ route('home') }}" class="link-page">   {{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('consultations') }}" class="link-page active"> {{ __('cp.consulting') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} courses-title">
                    <h3>
                        {{ __('cp.consulting') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="consulting-section">
        <div class="container">
            <div class="row consulting-list">
                @if(count($categories) > 0)
                @foreach($categories as $category)
                <div class="card">
                    <div class="consulting-img">
                        <img src="{{ $category->image }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title consulting-title">{{ $category->name }}</h5>
                        <p>
                            {{ $category->sub_description }}
                        </p>
                        <a href="{{ route('view_consulting' , ['id' => $category->id ]) }}" class="btn btn-primary consulting-read">إقرأ المزيد </a>
                    </div>
                </div>
                @endforeach
                @else
                    @include('website.pages.no_data')
                @endif



            </div>
        </div>
    </div>
    <!-- #End section 2-->

@endsection




