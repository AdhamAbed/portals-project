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
<div class="projects-section">
    <div class="container">
        <div class="row projects-list">
            @if(count($projects) > 0)
            @foreach($projects as $project)
            <div class="card">
                <a href="{{ route('view_project' , ['id' => $project->id]) }}" class="btn btn-primary project-register">
                    <img src="{{ $project->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title project-title">
{{--                        {{ \Illuminate\Support\Str::limit($project->description, 60) }}--}}
                        {{ $project->title}}
                    </h3>
                    <h6 class="card-title project-customer-name">
                        <small>
                            {{ __('cp.customer_name') }}/
                        </small>
                        {{ $project->customer_name}}
                    </h6>
                </div>
                </a>
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
