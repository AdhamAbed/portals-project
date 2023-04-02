@extends('layout.app')

@section('content')

    <!-- section 1-->
    <div class="courses-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-right">
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}
                    </a>
                    /
                    <a href="{{ route('user.profile') }}" class="link-page active">{{ __('cp.profile') }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-right projects-title">
                    <h3>
                        {{ __('cp.profile') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="profile-data">
        <div class="container">
            <form action="{{ route('user.profileImage.update' , [auth()->user()->id]) }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="row">
                    <div class="col-lg-4 col-md-4 course-data">
                        <div class="profile-image">
                            <input id="imgupload" style="display:none;" type="file" onchange="readURL(this);"/>
{{--                            <img class="img-circle" id="user_img"--}}
{{--                                 src="{{ url('uploads/users').'/'.auth()->user()->image ?? url(assets('website')).'/img/about-user.png' }}">--}}

                            {{--                        <input type="file" id="imgupload" style="display:none"/>--}}
                            {{--                        <button id="OpenImgUpload">Image Upload</button>--}}

                            @if(auth()->user()->google_id != '')
                                <img class="img-circle" id="user_img" src="{{auth()->user()->image ?? url(assets('website')).'/img/user_image.jpg' }}">
                            @else
                                <img class="img-circle" id="user_img"
                                     src="{{ url('uploads/users').'/'.auth()->user()->image ?? url(assets('website')).'/img/about-user.png' }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-right change-avatar">
                        <div class="add_avatar">
                            <label for="file-upload" class="custom-file-upload">
                                {{ __('cp.change image') }}
                            </label>
                            <input id="file-upload" type="file" onchange="readURL(this);"/>
                            {{--                        <input type="file" name="image" value="{{ auth()->user()->image }}" onchange="readURL(this);" />--}}
                        </div><!-- add_avatar -->
                        <button type="button" class="remove_avatar"
                                onclick="deleteImage()">{{ __('cp.remove image') }}</button>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <button type="submit" class="btn btn-primary update-image">
                            <i class="fa fa-pen-to-square"></i> {{ __('cp.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->
    @if ($errors->any())
        <div class="alert alert-warning text-right" style="background-color: #f55a5a;color: #ffffff" role="alert">
            {!! implode('', $errors->all('<div>- :message</div>')) !!}
        </div>
    @endif
    <form class="update-profile-form default-form" method="POST" action="{{ route('user.profileData.update') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="update-user-information">
            <div class="container">
                <div class="row user-information">
                    <div class="form-background">
                        <img src="{{url(assets('website'))}}/img/path.png">
                    </div>
                    <div class="col-lg-10 col-md-12">
                        <div class="col-md-12 text-right">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputName1" class="form-label">{{ __('cp.user name') }}</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name ?? ''}}"
                                           class="form-control text-right" id="exampleInputName1"
                                           placeholder="{{ __('cp.user name') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputEmail1" class="form-label">{{ __('cp.email') }}</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email ?? ''}}"
                                           class="form-control text-right" id="exampleInputEmail1"
                                           placeholder="{{ __('cp.email') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputEmail1" class="form-label">{{ __('cp.gender') }}</label>
                                    <select name="gender" class="form-control text-right">
                                        <option
                                            value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}> {{ __('cp.male') }}</option>
                                        <option
                                            value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}> {{ __('cp.female') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputSpecialization1"
                                           class="form-label">{{ __('cp.job title') }}</label>
                                    <input type="text" name="job_title" value="{{ auth()->user()->job_title ?? ''}}"
                                           class="form-control text-right" id="exampleInputSpecialization1"
                                           placeholder="{{ __('cp.job title') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputSpecialization1"
                                           class="form-label">{{ __('cp.company') }}</label>
                                    <input type="text" name="company_name"
                                           value="{{ auth()->user()->company_name ?? ''}}"
                                           class="form-control text-right" id="exampleInputSpecialization1"
                                           placeholder="{{ __('cp.company') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputPhone1" class="form-label">{{ __('cp.phone') }}</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone ?? ''}}"
                                           class="form-control text-right" id="exampleInputPhone1"
                                           placeholder="{{ __('cp.phone') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label for="exampleInputPhone1" class="form-label">{{ __('cp.country') }}</label>
                                    <select name="country_id" class="form-control text-right">
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->id }}" {{ auth()->user()->country_id == $country->id ? 'selected' : '' }}> {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr-profile">
        <div class="col-lg-4 col-md-4 text-left save-profile">
            <button type="submit" class="btn btn-primary update-profile-info">
                <i class="fa fa-pen-to-square"></i> {{ __('cp.save') }}
            </button>
        </div>

    </form>
    <!-- #End section 3-->


    <!-- section 4-->
{{--    <div id="pay_options">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-right">--}}
{{--                    <div class="partnersTitle" id="partnersTitle">--}}
{{--                        <h3>--}}
{{--                            {{ __('cp.pay options') }}--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="payOptionsSlider owl-carousel">--}}
{{--                        <div class="payItem">--}}
{{--                            <div class="payImg">--}}
{{--                                <img src="{{url(assets('website'))}}/img/visa.png" alt="...">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="payItem">--}}
{{--                            <div class="payImg">--}}
{{--                                <img src="{{url(assets('website'))}}/img/masterCard.png" alt="...">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="payItem">--}}
{{--                            <div class="payImg">--}}
{{--                                <img src="{{url(assets('website'))}}/img/paypal.png" alt="...">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- #End section 4-->

@endsection

@section('script')
    <script>

        function deleteImage() {
            document.getElementById("user_img").setAttribute("src", "http://localhost/lifeIndustry/public/website/assets/img/user_image.jpg");
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#user_img')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#user_img').click(function () {
            $('#imgupload').trigger('click');
        });
    </script>
@endsection



