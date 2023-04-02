<?php
$lang_f=lang();
$lang =$lang_f['lang'];
$float=$lang_f['float'];
$float_op=$lang_f['float_op'];
$dir=$lang_f['dir'];
?>

@extends('layout.app')


@section('content')

    <div class="reset-password-section">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row register-information">
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-{{ $float }}">
                        <form class="register-form default-form" method="POST" action="{{ route('user.forget') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 text-{{ $float }} reset-title">
                                <h3>{{ __('cp.reset password') }} </h3>
                                <p> {{ __('cp.Enter your email address') }}</p>
                            </div>
                            <div class="form-group col-md-10 col-sm-6 col-xs-12 reset-form">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control text-{{ $float }} {{ $errors->has('email') ? ' has-error' : '' }}"
                                           id="exampleInputEmail1"
                                           placeholder="{{ __('cp.email') }}" required>

                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <button type="submit"
                                    class="btn btn-primary text-center login">{{ __('cp.send code') }}</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-{{ $float_op }}">
                        <div class="login-image">
                            <img src="{{url(assets('website'))}}/img/login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

