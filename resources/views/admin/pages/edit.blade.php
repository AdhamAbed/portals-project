@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.pages'))}} / {{ $item->title }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.pages.update', $item->id) }}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}

                        <div class="form-body">


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                                        {{__('cp.title_'.$locale->lang)}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="title_{{$locale->lang}}"
                                               value="{{$item->translate($locale->lang)->title}}"
                                               id="title_{{$locale->lang}}" {{ old('title_'.$locale->lang) }}>
                                    </div>
                                </div>
                            @endforeach


                            @if($item->id == 2)
                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('cp.description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control ckeditor"
                                                      name="description_{{$locale->lang}}" id="order"
                                                      placeholder=" {{__('cp.description_'.$locale->lang)}}" {{ old('description_'.$locale->lang) }}>{{$item->translate($locale->lang)->description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('cp.description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control" name="description_{{$locale->lang}}"
                                                      id="order"
                                                      placeholder=" {{__('cp.description_'.$locale->lang)}}" {{ old('description_'.$locale->lang) }}>{{$item->translate($locale->lang)->description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{--******************************************    About us   ****************************************************--}}
                            @if($item->id == 1)


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="header_title_{{$locale->lang}}">
                                            {{__('cp.header_title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   name="header_title_{{$locale->lang}}"
                                                   value="{{$item->translate($locale->lang)->header_title}}"
                                                   id="header_title_{{$locale->lang}}" {{ old('header_title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="header_description_{{$locale->lang}}">
                                            {{__('cp.header_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="header_description_{{$locale->lang}}"
                                                      id="header_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.header_description_'.$locale->lang)}}" {{ old('header_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->header_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="form-group" id="data1">
                                    <label class="col-sm-2 control-label"> {{__('cp.Goals & Reasons')}} </label>
                                    <input type="hidden" id="languages" name="languages[]" value="{{ $locales}}">

                                    @if(isset($goals[0]))
                                        <?php $count = -1; ?>
                                        <div class="form-group opAll" style="margin: 0 15px 0 31px;">
                                            <?php $count++ ?>
                                            @foreach($goals as $key=>$goal)
                                                @foreach($locales as $locale)
{{--                                                    @if(isset($goal->translate($locale->lang)->goal_title)  ||--}}
{{--                                                         isset($goal->translate($locale->lang)->goal_description))--}}
                                                        <div class="op goal_{{ $goal->id }}">
{{--                                                            @if(isset($goal->translate($locale->lang)->goal_title))--}}
                                                                <div class="op-sub">
                                                                    <label class="col-md-3 control-label">{{ __('cp.goal_title') }}
                                                                        ({{ $locale->lang }}):</label>
                                                                    <div class="col-md-7"
                                                                         style="display: inline-flex;margin-top: 5px">
                                                                        <input type="text" step="1"
                                                                               class="col-md-9 form-control"
                                                                               name="goals[{{ $goal->id }}][goal_title_{{$locale->lang}}]"
                                                                               value="{{$goal->translate($locale->lang)->goal_title ?? '' }}">
                                                                        <a href="javascript:;"
                                                                           class="col-md-2 remove_goal_edit"
                                                                           data-id={{$goal->id}}
                                                                                   style="margin-top:10px"
                                                                           title="remove">
                                                            <span aria-hidden="true"
                                                                  style="color: #ff4545; margin-right: 20px">{{ __('cp.remove') }}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
{{--                                                            @endif--}}
{{--                                                            @if(isset($goal->translate($locale->lang)->goal_description))--}}
                                                                <div class="op-sub">
                                                                    <label
                                                                            class="col-md-3 control-label">{{__('cp.goal_description')}}
                                                                        ({{ $locale->lang }}):</label>
                                                                    <div class="col-md-7"
                                                                         style="display: inline-flex ;margin-top: 5px">
                                                                    <textarea rows="6" class="form-control" type="text"
                                                                              name="goals[{{ $goal->id }}][goal_description_{{$locale->lang}}]">
                                                                        {{ $goal->translate($locale->lang)->goal_description ?? '' }}
                                                                    </textarea>
                                                                    </div>
                                                                </div>
{{--                                                            @endif--}}
                                                        </div>
                                                        <input type="hidden" name="op_id[]" value="{{$item->id}}">
                                                        <input type="hidden" name="goal_id"
                                                               value="{{$goal->page_id}}">
{{--                                                    @endif--}}
                                                @endforeach
                                            @endforeach
                                        </div>

                                    @endif

                                    @if(isset($reasons[0]))
                                        <?php $count = -1; ?>
                                        <div class="form-group opAll" style="margin: 0 15px 0 31px;">
                                            <?php $count++ ?>
                                            @foreach($reasons as $key=>$reason)
                                                @foreach($locales as $locale)
{{--                                                    @if(isset($reason->translate($locale->lang)->reason_title)  ||--}}
{{--                                                             isset($reason->translate($locale->lang)->reason_description))--}}
                                                        <div class="op reason_{{ $reason->id }}">
{{--                                                            @if(isset($reason->translate($locale->lang)->reason_title))--}}
                                                                <div class="op-sub">
                                                                    <label class="col-md-3 control-label">{{ __('cp.reason_title') }}
                                                                        ({{ $locale->lang }}):</label>
                                                                    <div class="col-md-7"
                                                                         style="display: inline-flex;margin-top: 5px">
                                                                        <input type="text" step="1"
                                                                               class="col-md-9 form-control"
                                                                               name="reasons[{{ $reason->id }}][reason_title_{{$locale->lang}}]"
                                                                               value="{{$reason->translate($locale->lang)->reason_title ?? '' }}">
                                                                        <a href="javascript:;"
                                                                           class="col-md-2 remove_reason_edit"
                                                                           data-id={{$reason->id}}
                                                                                   style="margin-top:10px"
                                                                           title="remove">
                                                            <span aria-hidden="true"
                                                                  style="color: #ff4545; margin-right: 20px">{{ __('cp.remove') }}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
{{--                                                            @endif--}}
{{--                                                            @if(isset($reason->translate($locale->lang)->reason_description))--}}
                                                                <div class="op-sub">
                                                                    <label
                                                                            class="col-md-3 control-label">{{__('cp.reason_description')}}
                                                                        ({{ $locale->lang }}):</label>
                                                                    <div class="col-md-7"
                                                                         style="display: inline-flex ;margin-top: 5px">
   <textarea rows="6" class="form-control" type="text"
             name="reasons[{{ $reason->id }}][reason_description_{{$locale->lang}}]">
       {{ $reason->translate($locale->lang)->reason_description ?? '' }}
   </textarea>
                                                                    </div>
                                                                </div>
{{--                                                            @endif--}}
                                                        </div>
                                                        <input type="hidden" name="op_id[]" value="{{$item->id}}">
                                                        <input type="hidden" name="reason_id"
                                                               value="{{$reason->page_id}}">
{{--                                                    @endif--}}
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
                                                <a href="javascript:" class="edit_goal_button btn btn-primary"
                                                   title="{{ __('cp.Add Goal') }}">
                                                    <i class="fa fa-plus"></i>
                                                    {{ __('cp.Add Goal') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group ">
                                            <div id="data" class="field_wrapper" style="margin: auto">
                                            </div>
                                            <div class="col"
                                                 style="margin-bottom: 5px;    margin-left: 15px;">
                                                <a href="javascript:" class="edit_reason_button btn btn-primary"
                                                   title="{{ __('cp.Add Reason') }}">
                                                    <i class="fa fa-plus"></i>
                                                    {{ __('cp.Add Reason') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <hr>


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="first_goal_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.first_goal_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="first_goal_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->first_goal_title}}" id="first_goal_title_{{$locale->lang}}" {{ old('first_goal_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="first_goal_description_">--}}
                                {{--                                                 {{__('cp.first_goal_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="first_goal_description_{{$locale->lang}}" id="first_goal_description_{{$locale->lang}}" placeholder=" {{__('cp.first_goal_description_'.$locale->lang)}}" {{ old('first_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->first_goal_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="second_goal_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.second_goal_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="second_goal_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->second_goal_title}}" id="second_goal_title_{{$locale->lang}}" {{ old('second_goal_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="second_goal_description_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.second_goal_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="second_goal_description_{{$locale->lang}}" id="second_goal_description_{{$locale->lang}}" placeholder=" {{__('cp.second_goal_description_'.$locale->lang)}}" {{ old('second_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->second_goal_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="third_goal_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.third_goal_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="third_goal_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->third_goal_title}}" id="third_goal_title_{{$locale->lang}}" {{ old('third_goal_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="third_goal_description_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.third_goal_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="third_goal_description_{{$locale->lang}}" id="third_goal_description_{{$locale->lang}}" placeholder=" {{__('cp.third_goal_description_'.$locale->lang)}}" {{ old('third_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->third_goal_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="first_reason_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.first_reason_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="first_reason_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->first_reason_title}}" id="first_reason_title_{{$locale->lang}}" {{ old('first_reason_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="first_reason_description_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.first_reason_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="first_reason_description_{{$locale->lang}}" id="first_reason_description_{{$locale->lang}}" placeholder=" {{__('cp.first_reason_description_'.$locale->lang)}}" {{ old('first_reason_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->first_reason_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="second_reason_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.second_reason_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="second_reason_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->second_reason_title}}" id="second_reason_title_{{$locale->lang}}" {{ old('second_reason_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="second_reason_description_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.second_reason_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="second_reason_description_{{$locale->lang}}" id="second_reason_description_{{$locale->lang}}" placeholder=" {{__('cp.second_reason_description_'.$locale->lang)}}" {{ old('second_reason_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->second_reason_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}


                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="third_reason_title_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.third_reason_title_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol">*</span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <input type="text" class="form-control" name="third_reason_title_{{$locale->lang}}" value="{{$item->translate($locale->lang)->third_reason_title}}" id="third_reason_title_{{$locale->lang}}" {{ old('third_reason_title_'.$locale->lang) }}>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                {{--                                     @foreach($locales as $locale)--}}
                                {{--                                         <div class="form-group">--}}
                                {{--                                             <label class="col-sm-2 control-label" for="third_reason_description_{{$locale->lang}}">--}}
                                {{--                                                 {{__('cp.third_reason_description_'.$locale->lang)}}--}}
                                {{--                                                 <span class="symbol"> * </span>--}}
                                {{--                                             </label>--}}
                                {{--                                             <div class="col-md-8">--}}
                                {{--                                                 <textarea rows="5" class="form-control" name="third_reason_description_{{$locale->lang}}" id="third_reason_description_{{$locale->lang}}" placeholder=" {{__('cp.third_reason_description_'.$locale->lang)}}" {{ old('third_reason_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->third_reason_description}}</textarea>--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                     @endforeach--}}

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="certificates_sub_description_{{$locale->lang}}">
                                            {{__('cp.certificates_sub_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="certificates_sub_description_{{$locale->lang}}"
                                                      id="certificates_sub_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.certificates_sub_description_'.$locale->lang)}}" {{ old('certificates_sub_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->certificates_sub_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="reasons_sub_description_{{$locale->lang}}">
                                            {{__('cp.reasons_sub_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="reasons_sub_description_{{$locale->lang}}"
                                                      id="reasons_sub_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.reasons_sub_description_'.$locale->lang)}}" {{ old('reasons_sub_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->reasons_sub_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                <legend> {{ __('cp.header_image') }} </legend>
                                <div class="form-group {{ $errors->has('header_image') ? ' has-error' : '' }}">
                                    <div class="col-md-8 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="@if($item->header_image){{$item->header_image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif"
                                                 id="editImage" style="max-width:500px;">
                                        </div>
                                        <input type="file" class="form-control" name="header_image" id="edit_image"
                                               style="display:none">
                                    </div>
                                </div>
                                {{--                                         <legend> {{ __('cp.first_certificate_image') }} </legend>--}}
                                {{--                                         <div class="form-group {{ $errors->has('first_certificate_image') ? ' has-error' : '' }}">--}}
                                {{--                                             <div class="col-md-8 col-md-offset-3">--}}
                                {{--                                                 <div class="fileinput-new thumbnail"--}}
                                {{--                                                      onclick="document.getElementById('edit_image1').click()"--}}
                                {{--                                                      style="cursor:pointer">--}}
                                {{--                                                     <img src="@if($item->first_certificate_image){{$item->first_certificate_image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif" id="editImage1" style="max-width:500px;">--}}
                                {{--                                                 </div>--}}
                                {{--                                                 <input type="file" class="form-control" name="first_certificate_image" id="edit_image1" style="display:none">--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                         <legend> {{ __('cp.second_certificate_image') }} </legend>--}}
                                {{--                                         <div class="form-group {{ $errors->has('second_certificate_image') ? ' has-error' : '' }}">--}}
                                {{--                                             <div class="col-md-8 col-md-offset-3">--}}
                                {{--                                                 <div class="fileinput-new thumbnail"--}}
                                {{--                                                      onclick="document.getElementById('edit_image2').click()"--}}
                                {{--                                                      style="cursor:pointer">--}}
                                {{--                                                     <img src="@if($item->second_certificate_image){{$item->second_certificate_image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif" id="editImage2" style="max-width:500px;">--}}
                                {{--                                                 </div>--}}
                                {{--                                                 <input type="file" class="form-control" name="second_certificate_image" id="edit_image2" style="display:none">--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}
                                {{--                                         <legend> {{ __('cp.third_certificate_image') }} </legend>--}}
                                {{--                                         <div class="form-group {{ $errors->has('third_certificate_image') ? ' has-error' : '' }}">--}}
                                {{--                                             <div class="col-md-8 col-md-offset-3">--}}
                                {{--                                                 <div class="fileinput-new thumbnail"--}}
                                {{--                                                      onclick="document.getElementById('edit_image3').click()"--}}
                                {{--                                                      style="cursor:pointer">--}}
                                {{--                                                     <img src="@if($item->third_certificate_image){{$item->third_certificate_image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif" id="editImage3" style="max-width:500px;">--}}
                                {{--                                                 </div>--}}
                                {{--                                                 <input type="file" class="form-control" name="third_certificate_image" id="edit_image3" style="display:none">--}}
                                {{--                                             </div>--}}
                                {{--                                         </div>--}}


                                <legend>{{__('cp.certificates images')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="imageupload" style="display:flex;flex-wrap:wrap">
                                            @foreach($item->certificate_images as $one)
                                                <div class="imageBox text-center"
                                                     style="width:150px; height:190px; margin:5px;">
                                                    <img src="{{$one->image}}"
                                                         style="width:150px;height:150px; padding:5px;">
                                                    <button class="btn btn-danger deleteImage"
                                                            type="button">{{__("cp.remove")}}</button>
                                                    <input class="attachedValues form-control" type="hidden"
                                                           name="oldImages[]" value="{{$one->id}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="file-field input-field input-group control-group increment">
                                            <div class="btn amber"
                                                 onclick="document.getElementById('all_images').click()">
                                                <span> {{__("cp.addImages")}} </span>
                                                <button class="btn btn-success" type="button"><i
                                                            class="glyphicon glyphicon-plus"></i> {{__("cp.addImages")}}
                                                </button>
                                                <input type="file" class="form-control hidden" style="display:none;"
                                                       accept="image/*" id="all_images" multiple/>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endif


                            {{--**********************************************************************************************--}}
                            {{--******************************************    Contact us   ****************************************************--}}
                            @if($item->id == 4)


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="header_title_{{$locale->lang}}">
                                            {{__('cp.header_title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   name="header_title_{{$locale->lang}}"
                                                   value="{{$item->translate($locale->lang)->header_title}}"
                                                   id="header_title_{{$locale->lang}}" {{ old('header_title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="header_description_{{$locale->lang}}">
                                            {{__('cp.header_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="header_description_{{$locale->lang}}"
                                                      id="header_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.header_description_'.$locale->lang)}}" {{ old('header_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->header_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="first_goal_title_{{$locale->lang}}">
                                            {{__('cp.support_title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   name="first_goal_title_{{$locale->lang}}"
                                                   value="{{$item->translate($locale->lang)->first_goal_title}}"
                                                   id="first_goal_title_{{$locale->lang}}" {{ old('first_goal_title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="first_goal_description_">
                                            {{__('cp.support_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="first_goal_description_{{$locale->lang}}"
                                                      id="first_goal_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.first_goal_description_'.$locale->lang)}}" {{ old('first_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->first_goal_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="second_goal_title_{{$locale->lang}}">
                                            {{__('cp.mobile_number_title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   name="second_goal_title_{{$locale->lang}}"
                                                   value="{{$item->translate($locale->lang)->second_goal_title}}"
                                                   id="second_goal_title_{{$locale->lang}}" {{ old('second_goal_title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="second_goal_description_{{$locale->lang}}">
                                            {{__('cp.mobile_number_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="second_goal_description_{{$locale->lang}}"
                                                      id="second_goal_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.second_goal_description_'.$locale->lang)}}" {{ old('second_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->second_goal_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="third_goal_title_{{$locale->lang}}">
                                            {{__('cp.email_title_'.$locale->lang)}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                                   name="third_goal_title_{{$locale->lang}}"
                                                   value="{{$item->translate($locale->lang)->third_goal_title}}"
                                                   id="third_goal_title_{{$locale->lang}}" {{ old('third_goal_title_'.$locale->lang) }}>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"
                                               for="third_goal_description_{{$locale->lang}}">
                                            {{__('cp.email_description_'.$locale->lang)}}
                                            <span class="symbol"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control"
                                                      name="third_goal_description_{{$locale->lang}}"
                                                      id="third_goal_description_{{$locale->lang}}"
                                                      placeholder=" {{__('cp.third_goal_description_'.$locale->lang)}}" {{ old('third_goal_description_'.$locale->lang) }}>{{$item->translate($locale->lang)->third_goal_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                <legend> {{ __('cp.header_image') }} </legend>
                                <div class="form-group {{ $errors->has('header_image') ? ' has-error' : '' }}">
                                    <div class="col-md-8 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="@if($item->header_image){{$item->header_image}} @else  {{ url(admin_assets('/images/ChoosePhoto.png'))}} @endif"
                                                 id="editImage" style="max-width:500px;">
                                        </div>
                                        <input type="file" class="form-control" name="header_image" id="edit_image"
                                               style="display:none">
                                    </div>
                                </div>

                            @endif


                            {{--**********************************************************************************************--}}


                            <br>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                        <a href="{{ route('admin.pages.index') }}"
                                           class="btn btn-warning">{{__('cp.cancel')}}</a>
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
        var goalTitle = '{{ __('cp.goal_title') }}';
        var goalDesc = '{{ __('cp.goal_description') }}';
        var reasonTitle = '{{ __('cp.reason_title') }}';
        var reasonDesc = '{{ __('cp.reason_description') }}';
        var deleteRow = '{{ __('cp.remove') }}';
        var CancelMessage = '{{ __('cp.Cancel') }}';
        var SureMessage = '{{ __('cp.Sure') }}';
        var deleteMessage = '{{ __('cp.Are you sure to delete this data?') }}';
        UrlForScripts = '{{url('/')}}'
    </script>
    <script type="text/javascript" src=" {{ url('new_assets/assets/js/custom.js') }}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

    <script>
        $(document).on('click', '.remove_goal_edit', function (event) {

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
                            url: UrlForScripts + '/admin/pages/goal/' + id,
                            type: 'DELETE',
// dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function () {
                                $('.alert').hide();
                                $('.goal_' + id).remove()

                                if (data = 1) {
                                    $('.alert').hide();
                                    $('.goal_' + id).remove()

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
        $(document).on('click', '.remove_reason_edit', function (event) {

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
                            url: UrlForScripts + '/admin/pages/reason/' + id,
                            type: 'DELETE',
// dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function () {
                                $('.alert').hide();
                                $('.reason_' + id).remove()

                                if (data = 1) {
                                    $('.alert').hide();
                                    $('.reason_' + id).remove()

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
