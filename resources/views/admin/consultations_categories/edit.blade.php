@extends('layout.adminLayout')
@section('title')
    {{ __('cp.consultations_categories') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.consultations_categories.update',$item->id) }}"
          enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.details_'.$locale->lang)}}
                        <span class="symbol"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                               placeholder="{{__('cp.title_'.$locale->lang)}}"
                               id="name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->name}}" required>
                    </div>
                </div>
            @endforeach

            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sub_description_{{$locale->lang}}">
                        {{__('cp.sub_description_'.$locale->lang)}}
                        <span class="symbol"> * </span>
                    </label>
                    <div class="col-md-8">
                        <textarea rows="5" class="form-control" name="sub_description_{{$locale->lang}}"
                                  id="sub_description_{{$locale->lang}}"
                                  placeholder=" {{__('cp.sub_description_'.$locale->lang)}}" {{ old('sub_description_'.$locale->lang) }}>{{ @$item->translate($locale->lang)->sub_description ?? ''}}</textarea>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description_{{$locale->lang}}">
                        {{__('cp.description_'.$locale->lang)}}
                        <span class="symbol"> * </span>
                    </label>
                    <div class="col-md-8">
                        <textarea rows="5" class="form-control" name="description_{{$locale->lang}}"
                                  id="description_{{$locale->lang}}"
                                  placeholder=" {{__('cp.description_'.$locale->lang)}}" {{ old('description_'.$locale->lang) }}>{{ @$item->translate($locale->lang)->description ?? ''}}</textarea>
                    </div>
                </div>
            @endforeach

            <legend>{{__('cp.image')}}</legend>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()"
                         style="cursor:pointer; max-width:500px;">
                        <img src="{{url($item->image)}}" id="editImage" style="max-width: 600px;">
                    </div>
                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                </div>
            </div>
            <br>
            <legend>{{__('cp.header_image')}}</legend>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image1').click()"
                         style="cursor:pointer; max-width:500px;">
                        <img src="{{url($item->header_image)}}" id="editImage1" style="max-width: 600px;">
                    </div>
                    <input type="file" class="form-control" name="header_image" id="edit_image1" style="display:none">
                </div>
            </div>
            <br>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.consultations_categories.index') }}"
                           class="btn btn-warning">{{__('cp.cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')

@endsection

@section('script')

    <script>
    </script>

@endsection

