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
                    <a href="{{ route('customers') }}" class="link-page active"> {{ __('cp.customers') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-{{ $float }} courses-title">
                    <h3>
                        {{ __('cp.customers') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    @if(count($items) > 0)
    @isset($items)
        <div class="partners-list">
            <div class="container">
                <div class="row">
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <div class="screensTitle" id="customersTitle">--}}
{{--                            <h3>--}}
{{--                                {{ __('cp.some customers') }}--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row partner_card">
                        @foreach($items as $item)
                            <div class="card">
                                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->image }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endisset
     @else
       @include('website.pages.no_data')
    @endif
    <!-- #End section 2-->

@endsection




