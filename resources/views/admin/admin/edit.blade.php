@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.edit_admin'))}}
@endsection
@section('css')

    <style type="text/css">
        .input-controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }

        #searchInput:focus {
            border-color: #4d90fe;
        }

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form method="post" action="{{ url('admin/admins/'.$item->id) }}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('cp.name')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"  value="{{ $item->name }}"
                                               placeholder="{{__('cp.name')}}" {{ old('name') }} required>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('cp.mobile')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile" value="{{ $item->mobile }}"
                                               placeholder="{{__('cp.mobile')}}" {{ old('mobile') }} required>
                                    </div>
                                </div>
                            </fieldset>


                        
    


                    @if($item->id != 1)
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        {{__('cp.roles')}}
                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control changePermission" id="permissions" name="role_id" required>
                                            @foreach($roles as $one)
                                                <option value="{{ $one->id }}" {{ $one->id == $item->role_id? 'selected' : ''}} > {{ $one->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        @endif

             
                        




                                <div class="form-actions">
                                    <div class="row">
                                    


                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                            <a href="{{url(getLocal().'/admin/admins')}}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                                        </div>


                                    </div>
                                </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
@endsection
@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });



        var FormValidation = function () {

            // basic validation
            var handleValidation1 = function () {
                // for more info visit the official plugin documentation:
                // http://docs.jquery.com/Plugins/Validation

                var form1 = $('#form_category');
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
                        title_ar: {required: true},
                        title_en: {required: true},
                        logo: {required: true},
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
