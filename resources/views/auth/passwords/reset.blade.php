@extends('layout.app')

@section('content')


    <div class="register-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <h3> {{ __('cp.reset password') }} </h3>
                </div>
            </div>
            <div class="row register-information">
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-right">
                        @if ($errors->any())
                            <div class="alert alert-warning text-right" style="background-color: #f55a5a;color: #ffffff"
                                 role="alert">
                                {!! implode('', $errors->all('<div>- :message</div>')) !!}
                            </div>
                        @endif
                        <form class="register-form default-form" method="post" action="{{ route('user.reset') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <?php
                            $url = explode('http://localhost/lifeIndustry/public/change_password', url()->current());
                            $code = explode('/', $url[1]);
                            ?>
                            {{--                        <input type="hidden" name="token" value="{{ csrf_token() }}">--}}
                            <input type="hidden" name="forgetCode" value="{{ $code[1] }}">
                            <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                <div class="input-group mb-3">
                                    <input type="email" name="email"
                                           class="form-control text-right {{ $errors->has('email') ? ' has-error' : '' }}"
                                           id="exampleInputEmail1"
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
                                    <input type="password" name="password"
                                           class="form-control text-right{{ $errors->has('password') ? ' has-error' : '' }}"
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
                                    <input  type="password"  name="password_confirmation" class="form-control text-right"
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
                            <button type="submit"
                                    class="btn btn-primary text-center login">{{ __('cp.reset password') }}</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="col-md-12 text-left">
                        <div class="login-image">
                            <img src="{{url(assets('website'))}}/img/login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
