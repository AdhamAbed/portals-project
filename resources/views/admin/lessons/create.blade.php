@extends('layout.adminLayout')

@section('title')
    {{ __('cp.lessons') }}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.lessons.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">

                            <input type="hidden" name="unit_id" value="{{ $unit_id }}">
                            
                            
                            
                            
            <!--<fieldset>-->
            <!--    <div class="form-group">-->
            <!--        <label class="col-sm-2 control-label" for="lesson_type">-->
            <!--        {{ __('cp.type') }}-->
            <!--            <span class="symbol">*</span>-->
            <!--        </label>-->
            <!--        <div class="col-md-6">-->
            <!--            <select name="lesson_type" id="type" class="form-control">-->
            <!--            <option value="video"> {{ __('cp.video') }} </option>-->
            <!--            <option value="attached_file"> {{ __('cp.attached_file') }} </option>-->
            <!--            </select>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</fieldset>-->
                            

                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}"value="{{ old('title_'.$locale->lang) }}" required>
                                </div>
                            </div>
                            @endforeach


                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="details_{{$locale->lang}}"> {{__('cp.details_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <textarea rows="6" class="form-control" name="details_{{$locale->lang}}" id="kt_docs_ckeditor_classic_{{$locale->lang}}" required aria-required="true"></textarea>
                                </div>
                            </div>
                            @endforeach


                            <div class="form-group" id="video">
                                <label class="col-sm-2 control-label"> فيديو </label>
                                <div class="col-md-6 input-field">
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>

                                      
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.lessons.index', ['id' => $unit_id]) }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </form>
                    
{{--                    <h2>create zoom meet</h2>--}}
{{--                    <form method="post" action="{{ route('admin.lessons.saveMeeting', $unit_id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-body">--}}
{{--                            @foreach($locales as $locale)--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}"value="{{ old('title_'.$locale->lang) }}" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                            <input type="hidden" name="unit_id" value="{{ $unit_id }}">--}}
{{--                    <button type="submit" class="btn btn-primary" > {{ __('cp.submit') }} </button>--}}
{{--                    <button type="submit" id="createMeet" class="btn btn-primary" > {{ __('cp.submit') }} </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection


<!--@section('script')-->
    
<!--@endsection-->

