@extends('layout.app')

@section('content')

    <!-- section 1-->
{{--    <div class="courses-header-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-5 text-right">--}}
{{--                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}--}}
{{--                    </a>--}}
{{--                    /--}}
{{--                    <a href="{{ route('user.change_password') }}" class="link-page active">{{ __('cp.Change password') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-5 text-right projects-title">--}}
{{--                    <h3>--}}
{{--                        {{ __('cp.Change password') }}--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="profile-data"  style="margin-top:120px;">
        <div class="container edit-profile">
            @if ($errors->any())
                <div class="alert alert-warning text-right" style="background-color: #f55a5a;color: #ffffff" role="alert">
                    {!! implode('', $errors->all('<div>- :message</div>')) !!}
                </div>
            @endif
            <form action="{{ route('user.change_password.update' , [auth()->user()->id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="name" class="form-label">{{ __('cp.New Password') }}</label>
                        <input type="password" name="password"
                               class="form-control text-right" id="password"
                               placeholder="{{ __('cp.New Password') }}" required>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="name" class="form-label">{{ __('cp.Confirm Password') }}</label>
                        <input type="password" name="confirm_password"
                               class="form-control text-right" id="confirm_password"
                               placeholder="{{ __('cp.Confirm Password') }}" required>
                    </div>



                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <button type="submit" class="btn btn-primary" >{{ __('cp.Save') }} </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->





@endsection

@section('script')


@endsection



