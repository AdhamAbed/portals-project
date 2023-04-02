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
                    <h3> {{ __('cp.login') }} </h3>
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
                        <form class="register-form default-form" method="post" action="{{ route('loginUsers') }}"
                              enctype="multipart/form-data">
                            @csrf
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
                            <div class="form-group col-md-10 col-sm-12 col-xs-12 password-section">
                                <input class="text-{{ $float }}" type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}><span class="remember-me">{{__('cp.remember me')}}</span>
                                <a href="{{route('user.resetPassword')}}" class="text-{{ $float_op }} forget-password"> {{ __('cp.forget password') }}</a>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary text-center login">{{ __('cp.login') }}</button>
                            <br>
                            <a type="submit" class="btn btn-primary text-center google-login" href="{{ route('user.googleLogin') }}">
                                {{ __('cp.login by google') }}
                                <img src="{{url(assets('website'))}}/img/google.png">
{{--                                <i class="fa fa-google"></i>--}}
                            </a>
                            <small class="new-account text-center">
                                <p>
                                    {{ __('cp.do not have account ?') }}
                                    <a href="{{ route('user.register.form') }}" class="text-{{ $float_op }} create-account">{{ __('cp.create new account') }}</a>
                                </p>

                            </small>
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

