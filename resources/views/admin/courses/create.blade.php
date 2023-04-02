@extends('layout.adminLayout')

@section('title')
    {{__('cp.courses')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data"
                          class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label">{{__('cp.type')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="type">
                                        <option value="live"> {{ __('cp.live') }} </option>
                                        <option value="online"> {{ __('cp.online') }} </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="course_language">
                                <label class="col-sm-2 control-label">{{__('cp.course language')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="course_language">
                                        <option value="arabic"> {{ __('cp.Arabic') }} </option>
                                        <option value="english"> {{ __('cp.English') }} </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="course_date_time"> {{__('cp.course_date_time')}} </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="course_date_time"
                                           value="{{old('course_date_time')}}">
                                </div>
                            </div>


                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label">{{__('cp.public_private')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="public_private">
                                        <option value="public"> {{ __('cp.public') }} </option>
                                        <option value="private"> {{ __('cp.private') }} </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="trainer_id">
                                <label class="col-sm-2 control-label">{{__('cp.trainer')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="trainer_id"
                                            id="trainer_id">
                                        <option value=""></option>
                                        @isset($trainers)
                                            @foreach($trainers as $one)
                                                <option value="{{ $one->id }}"> {{ $one->name }} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="course_category_id">
                                <label class="col-sm-2 control-label">{{__('cp.category')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="course_category_id"
                                            id="course_category_id">
                                        <option value=""></option>
                                        @isset($courses_categories)
                                            @foreach($courses_categories as $one)
                                                <option value="{{ $one->id }}"> {{ $one->name }} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"
                                           for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title_{{$locale->lang}}"
                                               id="title_{{$locale->lang}}" value="{{ old('title_'.$locale->lang) }}"
                                               required>
                                    </div>
                                </div>
                            @endforeach


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"
                                           for="summary_{{$locale->lang}}"> {{__('cp.summary_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <textarea rows="6" class="form-control" name="summary_{{$locale->lang}}"
                                                  required aria-required="true"></textarea>
                                    </div>
                                </div>
                            @endforeach


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"
                                           for="details_{{$locale->lang}}"> {{__('cp.details_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <textarea rows="6" class="form-control" name="details_{{$locale->lang}}"
                                                  id="kt_docs_ckeditor_classic_{{$locale->lang}}" required
                                                  aria-required="true"></textarea>
                                    </div>
                                </div>
                            @endforeach

                            <hr>
                            <hr>
                            <div class="form-group" id="data1">


                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="details_{{$locale->lang}}"> {{__('cp.course content '.$locale->lang)}} </label>
                                <input type="hidden" id="languages" name="languages[]" value="{{ $locales}}">

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div id="data" class="field_wrapper" style="margin: auto">
                                        </div>
                                        <div class="col" style="margin-bottom: 5px;    margin-left: 15px;">
                                            <a href="javascript:" class="new_option_button btn btn-primary"
{{--                                            <a href="javascript:" class="option_button btn btn-primary"--}}
                                               title="{{ __('cp.Add course content') }}">
                                                <i class="fa fa-plus"></i>
                                                {{ __('cp.Add course content') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div id="data" class="field_wrapper" style="margin: auto">
                                        </div>
                                        <div class="col" style="margin-bottom: 5px;    margin-left: 15px;">
                                            <a href="javascript:" class="requirements_button btn btn-primary"
                                               title="{{ __('cp.Add course requirements') }}">
                                                <i class="fa fa-plus"></i>
                                                {{ __('cp.Add course requirements') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <hr>


                            <div class="form-group" id="course_link">
                                <label class="col-sm-2 control-label"
                                       for="course_link"> {{__('cp.course_link')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="course_link"
                                           value="{{old('course_link')}}">
                                </div>
                            </div>

                            <div class="form-group" id="price">
                                <label class="col-sm-2 control-label" for="price"> {{__('cp.price')}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                </div>
                            </div>

                            <div class="form-group" id="discount">
                                <label class="col-sm-2 control-label" for="discount"> {{__('cp.discount')}} </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="discount"
                                           value="{{old('discount')}}">
                                </div>
                            </div>

                            <div class="form-group" id="price_after_discount">
                                <label class="col-sm-2 control-label"
                                       for="price_after_discount"> {{__('cp.price_after_discount')}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price_after_discount"
                                           value="{{old('price_after_discount')}}">
                                </div>
                            </div>

                            <div class="form-group" id="hours">
                                <label class="col-sm-2 control-label" for="hours"> {{__('cp.hours')}} </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="hours" value="{{old('hours')}}">
                                </div>
                            </div>


                            <div class="form-group" id="share_post">
                                <label class="col-sm-2 control-label">{{__('cp.share_post')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="share_post">
                                        <option value="yes"> {{ __('cp.yes') }} </option>
                                        <option value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="accept_comments">
                                <label class="col-sm-2 control-label">{{__('cp.accept_comments')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="accept_comments">
                                        <option value="yes"> {{ __('cp.yes') }} </option>
                                        <option value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="file_type">
                                <label class="col-sm-2 control-label">{{__('cp.file type')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02 fileType" name="file_type">
                                        <option value="">{{__('cp.select')}}</option>
                                        <option value="image"> {{ __('cp.image') }} </option>
                                        <option value="file"> {{ __('cp.file') }} </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="type_file" style="display: none;">
                                <label class="col-sm-2 control-label">{{__('cp.file')}} </label>
                                <div class="col-md-6 input-field">
                                    <input type="file" class="form-control" name="type_file">
                                </div>
                            </div>
                            <div class="form-group" id="type_image" style="display: none;">
                                <label class="col-sm-2 control-label">{{__('cp.image')}} </label>
                                <div class="col-md-6 input-field">
                                    <input type="file" class="form-control" name="type_image" accept="image/*">
                                </div>
                            </div>

                            {{--                              <div class="form-group" id="video">--}}
                            {{--                                <label class="col-sm-2 control-label" >{{__('cp.video')}} </label>--}}
                            {{--                                <div class="col-md-6 input-field">--}}
                            {{--                                    <input type="file" class="form-control" name="video">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                            <legend> {{ __('cp.image') }} </legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail"
                                         onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                        <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage"
                                             value="{{old('image')}}" style="max-width:500px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" accept="image/*"
                                           value="{{old('image')}}" id="edit_image" required style="display:none">
                                </div>
                            </div>
                            <br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.courses.index') }}"
                                           class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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
        var contentTitle = '{{ __('cp.content title') }}';
        var requirementTitle = '{{ __('cp.requirement title') }}';
        var courseTimes = '{{ __('cp.course times') }}';
        var courseDates = '{{ __('cp.course dates') }}';
        var contentDesc = '{{ __('cp.content description') }}';
        var deleteRow = '{{ __('cp.remove') }}';
        var CancelMessage = '{{ __('cp.Cancel') }}';
        var SureMessage = '{{ __('cp.Sure') }}';
    </script>
    <script type="text/javascript" src=" {{ url('new_assets/assets/js/custom.js') }}"></script>

    <script>

        $(document).on('change','.fileType',function(e){
            var file_type = $(this).val();

            if(file_type == 'image'){
                $('#type_image').show(1000);
                $('#type_file').hide(1000);
                return false;
            }
            if(file_type == 'file'){
                $('#type_image').hide(1000);
                $('#type_file').show(1000);
                return false;
            }
            else{
                $('#type_image').hide(1000);
                $('#type_file').hide(1000);
                return false;
            }
        });

        $(document).on('click', '.remove_option', function (e) {

            e.preventDefault();

            console.log("s");
            $(this).closest('.op').find('.op-sub').remove();
        });

        $(document).on('click', '.remove_option_edit', function (event) {

            var _this = $(this);
            event.preventDefault();

            id = $(this).attr('data-id');
            console.log(id);
            // $(this).document.getElementById('row['+id+']').remove();
            // $(this).closest('.op').find(id).remove();


            bootbox.confirm({
                message: deleteMessage,
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-remove"></i>' + CancelMessage,
                        className: 'btn-danger'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i>' + SureMessage,
                        className: 'btn-success'
                    },

                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: UrlForScripts + '/cp_admin/settings/option/' + id,
                            type: 'DELETE',
                            dataType: 'json',
                            data: {'_token': csrf_token},
                            success: function (data) {

                                if (data.status) {
                                    $('.alert').hide();
                                    $('.row_' + id).remove()

                                } else {
                                    toastr['error'](data.message);
                                    return false;
                                }
                            }
                        });
                    }
                }
            });


        });

    </script>
@endsection

