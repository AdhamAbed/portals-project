<?php
$lang_f=lang();
$lang =$lang_f['lang'];
$float=$lang_f['float'];
$float_op=$lang_f['float_op'];
$dir=$lang_f['dir'];
?>


@extends('layout.app')



@section('content')

    <div class="register-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-{{ $float }}">
                    <h3 class="register-title"> {{ __('cp.register') }} </h3>
                </div>
            </div>
            <div class="row register-information">
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-{{ $float }}">
                        @if ($errors->any())
                            <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                                {!! implode('', $errors->all('<div>- :message</div>')) !!}
                            </div>
                        @endif
                        <form class="register-form default-form" method="POST" action="{{ route('user.register') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                            <div class="form-group col-md-5 col-sm-6 col-xs-12 first-name-input">
                                    <input type="text" name="first_name" class="form-control text-{{ $float }} @error('first_name') is-invalid @enderror" id="exampleInputName1"
                                           placeholder="{{ __('cp.first_name') }}" required>


                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 col-sm-6 col-xs-12 last-name-input">
                                    <input type="text" name="last_name" class="form-control text-{{ $float }} @error('last_name') is-invalid @enderror" id="exampleInputName1"
                                           placeholder="{{ __('cp.last_name') }}" required>


                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control text-{{ $float }} @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="{{ __('cp.email') }}" required>
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>


                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control text-{{ $float }} @error('password') is-invalid @enderror"
                                           id="exampleInputPassword1"
                                           placeholder="{{ __('cp.password') }}" required>
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                <div class="input-group mb-3">
                                    <input  type="password"  name="password_confirmation" class="form-control text-{{ $float }}"
                                            id="password-confirm"
                                           placeholder="{{ __('cp.password_confirmation') }}" required>

                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-10 col-sm-12 col-xs-12  terms-conditions">
                                <input class="text-{{ $float }}" type="checkbox"
                                       name="terms_conditions" required>
                                <span class="agree-terms">{{__('cp.Agree to')}}</span>
                                <a href="{{ route('privacy') }}" class="text-{{ $float }}  terms-and-conditions"> {{ __('cp.the terms and conditions') }}</a>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary text-center login">{{ __('cp.register now') }}</button>
                            <small class="new-account text-center">
                                <p>
                                    {{ __('cp.do have account ?') }}
                                    <a href="{{ route('user.login.form') }}" class="text-{{ $float_op }} create-account">{{ __('cp.login') }}</a>
                                </p>

                            </small>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-{{ $float_op }}">
                        <div class="login-image">
                            <img src="{{url(assets('website'))}}/img/register.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

