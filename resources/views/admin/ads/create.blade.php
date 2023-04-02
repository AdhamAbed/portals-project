@extends('layout.adminLayout')

@section('title')
 {{ __('cp.ads') }}

@endsection

@section('css')
@endsection

@section('content')

    <form method="post" action="{{ route('admin.ads.store') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}
        <div class="form-body">


            <!--<fieldset>-->
            <!--    <div class="form-group">-->
            <!--        <label class="col-sm-2 control-label" for="type">-->
        <!--            {{ __('cp.ads_place') }}-->
            <!--            <span class="symbol">*</span>-->
            <!--        </label>-->
            <!--        <div class="col-md-6">-->
            <!--            <select name="type" id="type" class="form-control">-->
        <!--                <option value="home"> {{ __('cp.home') }} </option>-->
        <!--                <option value="inside"> {{ __('cp.inside') }} </option>-->
            <!--            </select>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</fieldset>-->


            <!--<div class="form-group">-->
            <!--    <label class="col-sm-2 control-label" for="image_video">-->
            <!--        {{ __('cp.type') }}-->
            <!--        <span class="symbol">*</span>-->
            <!--    </label>-->
            <!--    <div class="col-md-6">-->
            <!--        <select name="image_video" id="image_video" class="form-control">-->
            <!--            <option value="image"> {{ __('cp.image') }}  </option>-->
            <!--            <option value="video"> {{ __('cp.video') }}  </option>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->

            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.title_'.$locale->lang)}}
                        <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                               placeholder=" {{__('cp.title')}} {{$locale->lang}}"
                               id="name_{{$locale->lang}}"
                               value="{{ old('title_'.$locale->lang) }}" required>
                    </div>
                </div>

            @endforeach

            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.details_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                            <textarea class="form-control" name="details_{{$locale->lang}}" rows="6"
                                      placeholder="{{__('cp.details_'.$locale->lang)}}">{{ old('details_'.$locale->lang) }}</textarea>
                    </div>
                </div>
            @endforeach

            <div class="form-group">
                <label class="col-sm-2 control-label" for="order">
                    {{__('cp.ads_url')}}
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="url" value="{{ old('url') }}" id="url"
                           placeholder=" {{__('cp.ads_url')}}">
                </div>
            </div>

            <!--<div class="video form-group display-hide">-->
            <!--    <label class="col-sm-2 control-label" for="file">-->
            <!--        {{__('cp.videoFile')}}-->
            <!--    </label>-->

            <!--    <div class="col-md-6">-->
            <!--        <input type="file" class="form-control" id="file" name="file">-->
            <!--    </div>-->
            <!--</div>-->

            <Br><br>
            <div class="img">
                <legend>{{__('cp.image')}}</legend>
                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-md-offset-3">
                        @if ($errors->has('logo'))
                            <span class="help-block">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                        @endif
                        <div class="fileinput-new thumbnail"
                             onclick="document.getElementById('edit_image').click()"
                             style="cursor:pointer">
                            <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage">

                        </div>
                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <input type="file" class="form-control" name="logo"
                               id="edit_image"
                               style="display:none">
                    </div>
                </div>
            </div>

            <Br><Br>
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                    <a href="{{ route('admin.ads.index') }}" class="btn btn-warning">
                        {{ __('cp.cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')

@endsection

@section('script')

    <script>

        $('#edit_image').on('change', function (e) {

            readURL(this, $('#editImage'));

        });


        $("#image_video").change(function () {
            var selected = $(this).children("option:selected").val();
            if (selected == 'image')//img
            {
                $('.img').removeClass('display-hide');
                $('.video').addClass('display-hide');

            } else if (selected == 'video')//video
            {
                $('.img').addClass('display-hide');
                $('.video').removeClass('display-hide');
            }
        });


        if ($("#image_video").val() == 'video') {
            $('.img').removeClass('display-hide');
            $('.video').addClass('display-hide');
        } else if ($("#image_video").val() == 2) {
            $('.img').addClass('display-hide');
            $('.video').removeClass('display-hide');
        }


    </script>





    <script>


        $('#type').on('change', function () {

            var gover = this.value;

            sessionStorage.setItem("type", this.value);


            if (gover == 1) {

                $('#gover_option').removeClass('hidden');

                $('#options').prop('required', true);

            } else {

                $('#gover_option').addClass('hidden');

                $('#options').prop('required', false);

            }


        });


        var FormValidation = function () {



            // basic validation

            var handleValidation1 = function () {

                // for more info visit the official plugin documentation:

                // http://docs.jquery.com/Plugins/Validation


                var form1 = $('#form_city');

                var error1 = $('.alert-danger', form1);

                var success1 = $('.alert-success', form1);


                form1.validate({

                    errorElement: 'span', //default input error message container

                    errorClass: 'help-block help-block-error', // default input error message class

                    focusInvalid: false, // do not focus the last invalid input

                    ignore: "",  // validate all fields including form hidden input

                    messages: {

                        select_multi: {

                            maxlength: jQuery.validator.format("Max {0} items allowed for selection"),

                            minlength: jQuery.validator.format("At least {0} items must be selected"),

                        },

                    },


                    rules: {

                        type: {required: true},

                        name_ar: {required: true},

                        name_en: {required: true},

                        gover_id: {
                            required: function () {
                                return $("#type").val() == "1";
                            }
                        },

                    },


                    invalidHandler: function (event, validator) { //display error alert on form submit

                        success1.hide();

                        error1.show();

                        App.scrollTo(error1, -200);

                    },


                    highlight: function (element) { // hightlight error inputs


                        $(element)

                            .closest('.form-group').addClass('has-error'); // set error class to the control group

                    },


                    unhighlight: function (element) { // revert the change done by hightlight

                        $(element)

                            .closest('.form-group').removeClass('has-error'); // set error class to the control group

                    },


                    success: function (label) {

                        label

                            .closest('.form-group').removeClass('has-error'); // set success class to the control group

                    },


                    submitHandler: function (form) {

                        success1.show();

                        error1.hide

                        e.submit()
                    }

                });

            };

            // console.log(sessionStorage.getItem("type"));


            return {

                //main function to initiate the module

                init: function () {


                    handleValidation1();


                }


            };


        }();


        jQuery(document).ready(function () {

            FormValidation.init();

        });


    </script>

@endsection

