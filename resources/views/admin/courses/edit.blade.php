@extends('layout.adminLayout')
@section('title')
    {{__('cp.courses')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.courses.update',$item->id) }}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}


                        <input type="hidden" value="{{$item->id}}" name="course_id">
                        <div class="form-group" id="type">
                            <label class="col-sm-2 control-label">{{__('cp.type')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="type">
                                    <option
                                        {{ $item->type == 'live' ? 'selected' : '' }} value="live"> {{ __('cp.live') }} </option>
                                    <option
                                        {{ $item->type == 'online' ? 'selected' : '' }} value="online"> {{ __('cp.online') }} </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="course_language">
                            <label class="col-sm-2 control-label">{{__('cp.course language')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="course_language">
                                    <option
                                        {{ $item->type == 'arabic' ? 'selected' : '' }} value="arabic"> {{ __('cp.Arabic') }} </option>
                                    <option
                                        {{ $item->type == 'english' ? 'selected' : '' }} value="english"> {{ __('cp.English') }} </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="course_date_time"> {{__('cp.course_date_time')}} </label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" name="course_date_time"
                                       value="{{old('course_date_time', $item->course_date_time)}}">
                            </div>
                        </div>


                        <div class="form-group" id="type">
                            <label class="col-sm-2 control-label">{{__('cp.public_private')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="public_private">
                                    <option
                                        value="public" {{ $item->public_private == 'public' ? 'selected' : '' }}> {{ __('cp.public') }} </option>
                                    <option
                                        value="private"{{ $item->public_private == 'private' ? 'selected' : '' }}> {{ __('cp.private') }} </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="course_category_id">
                            <label class="col-sm-2 control-label">{{__('cp.category')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="course_category_id" id="course_category_id">
                                    <option value=""></option>
                                    @isset($courses_categories)
                                        @foreach($courses_categories as $one)
                                            <option
                                                {{ $item->course_category_id == $one->id? "selected" : "" }} value="{{ $one->id }}"> {{ $one->name }} </option>
                                        @endforeach
                                    @endisset
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
                                            <option
                                                    {{ $item->trainer_id == $one->id? "selected" : "" }} value="{{ $one->id }}"> {{ $one->name }} </option>

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
                                           id="title_{{$locale->lang}}"
                                           value="{{ old('title_'.$locale->lang, $item->translate($locale->lang)->title ?? '') }}"
                                           required>
                                </div>
                            </div>
                        @endforeach


                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="summary_{{$locale->lang}}"> {{__('cp.summary_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <textarea rows="6" class="form-control" name="summary_{{$locale->lang}}" required
                                              aria-required="true"> {{ old('summary_'.$locale->lang, $item->translate($locale->lang)->summary ?? '') }}</textarea>
                                </div>
                            </div>
                        @endforeach


                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="details_{{$locale->lang}}"> {{__('cp.details_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <textarea rows="6" class="form-control" name="details_{{$locale->lang}}"
                                              id="details_{{$locale->lang}}" required
                                              aria-required="true">{{ old('details_'.$locale->lang, $item->translate($locale->lang)->details ?? '') }}</textarea>
                                </div>
                            </div>
                        @endforeach


                        <hr>
                        <hr>
                        <div class="form-group" id="data1">
                            <label class="col-sm-2 control-label"> {{__('cp.course contents')}} </label>
                            <input type="hidden" id="languages" name="languages[]" value="{{ $locales}}">

                            @if(isset($contents[0]))
                                <?php $count = -1; ?>
                                <div class="form-group opAll" style="margin: 0 15px 0 31px;">
                                    <?php $count++ ?>
                                    @foreach($contents as $key=>$content)
                                        @foreach($locales as $locale)
                                            <div class="op content_{{ $content->id }}">
                                                <div class="op-sub">
                                                    <label class="col-md-3 control-label">{{ __('cp.content_title') }}
                                                        ({{ $locale->lang }}):</label>
                                                    <div class="col-md-7" style="display: inline-flex;margin-top: 5px">
                                                        <input type="text" step="1" class="col-md-9 form-control"
                                                               name="contents[{{ $content->id }}][content_title_{{$locale->lang}}]"
{{--                                                               name="content_title_{{$locale->lang}}[{{$count}}]"--}}
                                                               value="{{$content->translate($locale->lang)->content_title ?? '' }}">
                                                        {{--                                                               value="{{ @$content->content_title ?? '' }}">--}}
                                                        <a href="javascript:;"
                                                           class="col-md-2 remove_content_edit"
                                                           data-id={{$content->id}}
                                                               style="margin-top:10px"
                                                           title="remove">
                                                            <span aria-hidden="true"
                                                                  style="color: #ff4545; margin-right: 20px">{{ __('cp.remove') }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="op-sub">
                                                    <label
                                                        class="col-md-3 control-label">{{__('cp.content_description')}}
                                                        ({{ $locale->lang }}):</label>
                                                    <div class="col-md-7"
                                                         style="display: inline-flex ;margin-top: 5px">
                                                                    <textarea rows="6" class="form-control" type="text"
                                                                              name="contents[{{ $content->id }}][content_description_{{$locale->lang}}]">
{{--                                                                              name="content_description_{{$locale->lang}}[{{$count}}]">--}}
                                                                        {{ $content->translate($locale->lang)->content_description ?? '' }}
                                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="op_id[]" value="{{$content->id}}">
                                            <input type="hidden" name="cat_option_id"
                                                   value="{{$content->course_id}}">

                                        @endforeach
                                    @endforeach
                                </div>

                            @endif


                            @if(isset($requirements[0]))
                                <?php $count = -1; ?>
                                <div class="form-group opAll" style="margin: 0 15px 0 31px;">
                                    <?php $count++ ?>
                                    @foreach($requirements as $key=>$requirement)
                                        @foreach($locales as $locale)
                                            <div class="op requirement_{{ $requirement->id }}">
                                                <div class="op-sub">
                                                    <label class="col-md-3 control-label">{{ __('cp.requirement_title') }} ({{ $locale->lang }}):</label>
                                                    <div class="col-md-7" style="display: inline-flex;margin-top: 5px">
                                                        <input type="text" step="1" class="col-md-9 form-control"
                                                               name="requirements[{{ $requirement->id }}][requirement_title_{{$locale->lang}}]"
{{--                                                               name="content_title_{{$locale->lang}}[{{$count}}]"--}}
                                                               value="{{$requirement->translate($locale->lang)->requirement_title ?? '' }}">
                                                        {{--                                                               value="{{ @$content->content_title ?? '' }}">--}}
                                                        <a href="javascript:;"
                                                           class="col-md-2 remove_requirement_edit"
                                                           data-id={{$requirement->id}}
                                                               style="margin-top:10px"
                                                           title="remove">
                                                            <span aria-hidden="true"
                                                                  style="color: #ff4545; margin-right: 20px">{{ __('cp.remove') }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="requirement_id[]" value="{{$requirement->id}}">
                                            <input type="hidden" name="cat_requirement_id"
                                                   value="{{$requirement->course_id}}">

                                        @endforeach
                                    @endforeach
                                </div>

                            @endif


                            <div class="modal-body">
                                <div class="form-group ">
                                    <div id="data" class="field_wrapper" style="margin: auto">
                                    </div>
                                    <div class="col"
                                         style="margin-bottom: 5px;    margin-left: 15px;">
                                        <a href="javascript:" class="edit_option_button btn btn-primary"
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
                                        <a href="javascript:" class="edit_requirements_button btn btn-primary" title="{{ __('cp.Add course requirements') }}">
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
                                       value="{{old('course_link', $item->course_link)}}">
                            </div>
                        </div>
                        <div class="form-group" id="price">
                            <label class="col-sm-2 control-label"
                                   for="price"> {{__('cp.price')}} </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price"
                                       value="{{old('price', $item->price)}}">
                            </div>
                        </div>
                        <div class="form-group" id="discount">
                            <label class="col-sm-2 control-label"
                                   for="discount"> {{__('cp.discount')}} </label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="discount"
                                       value="{{old('discount', $item->discount)}}">
                            </div>
                        </div>
                        <div class="form-group" id="price_after_discount">
                            <label class="col-sm-2 control-label"
                                   for="price_after_discount"> {{__('cp.price_after_discount')}} </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_after_discount"
                                       value="{{old('price_after_discount', $item->price_after_discount)}}">
                            </div>
                        </div>
                        <div class="form-group" id="hours">
                            <label class="col-sm-2 control-label"
                                   for="hours"> {{__('cp.hours')}} </label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="hours"
                                       value="{{old('hours', $item->hours)}}">
                            </div>
                        </div>


                        <div class="form-group" id="share_post">
                            <label class="col-sm-2 control-label">{{__('cp.share_post')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="share_post">
                                    <option
                                        {{ $item->share_post == 'yes' ? 'selected' : '' }} value="yes"> {{ __('cp.yes') }} </option>
                                    <option
                                        {{ $item->share_post == 'no' ? 'selected' : '' }} value="no"> {{ __('cp.no') }} </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group" id="accept_comments">
                            <label
                                class="col-sm-2 control-label">{{__('cp.accept_comments')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02" name="accept_comments">
                                    <option
                                        {{ $item->accept_comments == 'yes' ? 'selected' : '' }} value="yes"> {{ __('cp.yes') }} </option>
                                    <option
                                        {{ $item->accept_comments == 'no' ? 'selected' : '' }} value="no"> {{ __('cp.no') }} </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group" id="file_type">
                            <label class="col-sm-2 control-label">{{__('cp.file type')}} </label>
                            <div class="col-md-6 input-field">
                                <select class="form-control select02 fileType" name="file_type">
                                    <option value="">{{__('cp.select')}}</option>
                                    <option  {{ $item->file_type == 'image' ? 'selected' : '' }}
                                        value="image"> {{ __('cp.image') }} </option>
                                    <option  {{ $item->file_type == 'file' ? 'selected' : '' }}
                                        value="file"> {{ __('cp.file') }} </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group" id="type_file" @if($item->file_type == 'image' && $item->file_type != 'file') style="display: none;" @endif>
                            <label class="col-sm-2 control-label">{{__('cp.file')}} </label>
                            <div class="col-md-6 input-field">
                                <input type="file" class="form-control" name="type_file">
                            </div>
                        </div>
                        <div class="form-group" id="type_image" @if($item->file_type == 'file' && $item->file_type != 'image') style="display: none;" @endif>
                            <label class="col-sm-2 control-label">{{__('cp.image')}} </label>
                            <div class="col-md-6 input-field">
                                <input type="file" class="form-control" name="type_image" accept="image/*">
                            </div>
                        </div>

{{--                        <div class="form-group" id="video">--}}
{{--                            <label class="col-sm-2 control-label">{{__('cp.video')}} </label>--}}
{{--                            <div class="col-md-6 input-field">--}}
{{--                                <input type="file" class="form-control" name="video">--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <legend>{{__('cp.image')}}</legend>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('edit_image').click()"
                                     style="cursor:pointer; max-width:500px;">
                                    <img src="{{url($item->image)}}" id="editImage"
                                         style="max-width: 600px;">
                                </div>
                                <input type="file" class="form-control" name="image" id="edit_image"
                                       style="display:none">
                            </div>
                        </div>


                        <br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit"
                                            class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                    <a href="{{ route('admin.courses.index') }}"
                                       class="btn btn-warning"> {{ __('cp.cancel') }} </a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>







@endsection
@section('script')
    <script>
        var contentTitle = '{{ __('cp.content title') }}';
        var requirementTitle = '{{ __('cp.requirement title') }}';
        var courseDates = '{{ __('cp.course dates') }}';
        var courseTimes = '{{ __('cp.course times') }}';
        var contentDesc = '{{ __('cp.content description') }}';
        var deleteRow = '{{ __('cp.remove') }}';
        var CancelMessage = '{{ __('cp.Cancel') }}';
        var SureMessage = '{{ __('cp.Sure') }}';
        var deleteMessage  = '{{ __('cp.Are you sure to delete this data?') }}';
        UrlForScripts = '{{url('/')}}'
    </script>
    <script type="text/javascript" src=" {{ url('new_assets/assets/js/custom.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

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

        csrf_token = $('meta[name="csrf-token"]').attr('content');
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
                            // dataType: 'json',
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (){
                                    $('.alert').hide();
                                    $('.row_' + id).remove()
                            }
                        });
                    }
                }
            });


        });

        $(document).on('click', '.remove_date_edit', function (event) {

            var _this = $(this);
            event.preventDefault();

            id = $(this).attr('data-id');
            console.log(id);
            // $(this).document.getElementById('rows['+id+']').remove();
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
                            url: UrlForScripts + '/admin/courses/date/' + id ,
                            {{--dataType: 'json',--}}
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (){
                                $('.date_'+id).remove()
                            }
                        });
                    }
                }
            });


        });
        $(document).on('click', '.remove_content_edit', function (event) {

            var _this = $(this);
            event.preventDefault();

            id = $(this).attr('data-id');
            // console.log(id , 'sssssssssssssssssss');
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
                            url: UrlForScripts + '/admin/courses/content/' + id ,
                            type: 'DELETE',
                            // dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function () {
                                $('.alert').hide();
                                $('.content_' + id).remove()

                                if (data = 1) {
                                    $('.alert').hide();
                                    $('.content_' + id).remove()

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

        $(document).on('click', '.remove_requirement_edit', function (event) {

            var _this = $(this);
            event.preventDefault();

            id = $(this).attr('data-id');

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
                            url: UrlForScripts + '/admin/courses/requirement/' + id ,
                            type: 'DELETE',
                            // dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function () {
                                $('.alert').hide();
                                $('.requirement_' + id).remove()

                                if (data = 1) {
                                    $('.alert').hide();
                                    $('.requirement_' + id).remove()

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
