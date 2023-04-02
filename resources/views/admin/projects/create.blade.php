@extends('layout.adminLayout')
@section('title')
    {{ __('cp.projects') }}
@endsection
@section('css')
@endsection
@section('content')

    <form method="post" action="{{ route('admin.projects.store') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}
        <div class="form-body">


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.title_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title_{{$locale->lang}}"
                               placeholder=" {{__('cp.title')}} {{$locale->lang}}" id="title_{{$locale->lang}}"
                               value="{{ old('title_'.$locale->lang) }}" required>
                    </div>
                </div>
            @endforeach

                @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description_{{$locale->lang}}">
                        {{__('cp.description_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <textarea rows="6" class="form-control" name="description_{{$locale->lang}}" id="description_{{$locale->lang}}" required aria-required="true"></textarea>
                        </div>
                </div>
            @endforeach
                @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="subdescription_{{$locale->lang}}">
                        {{__('cp.subdescription_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <textarea rows="6" class="form-control" name="subdescription_{{$locale->lang}}" id="subdescription_{{$locale->lang}}" required aria-required="true"></textarea>
                        </div>
                </div>
            @endforeach
                @foreach($locales as $locale)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="customer_name_{{$locale->lang}}">
                            {{__('cp.customer_name_'.$locale->lang)}} <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="customer_name_{{$locale->lang}}"
                                   placeholder=" {{__('cp.customer_name')}} {{$locale->lang}}" id="customer_name_{{$locale->lang}}"
                                   value="{{ old('customer_name_'.$locale->lang) }}" required>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="color">
                        {{ __('cp.finish date') }}
                    </label>
                    <div class="col-md-3" >
                        <input type="text" class="form-control" name="date"
{{--                        <input type="date" class="form-control" name="date"--}}
                               placeholder=" {{__('cp.date')}}" id="color"
                               value="{{ old('date') }}" style="height: 50px">
                    </div>
                </div>

            <div class="img">
                <legend>{{__('cp.featured_image')}}</legend>
                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput-new thumbnail"
                             onclick="document.getElementById('edit_image').click()"
                             style="cursor:pointer">
                            <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage"
                                 style="max-width:600px;">

                        </div>
                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                    </div>
                </div>
            </div>
                <legend> {{ __('cp.images') }} </legend>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="imageupload" style="display:flex;flex-wrap:wrap"></div>
                        <div class="input-group control-group increment" style="margin-top:5px;">
                            <input type="file" class="form-control hidden" accept="image/*" id="all_images" multiple />
                        </div>
                    </div>
                </div>


                <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-warning">
                            {{ __('cp.cancel') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

@section('js')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
        $('#edit_image1').on('change', function (e) {
            readURL(this, $('#editImage1'));
        });
    </script>
@endsection

@section('script')
@endsection

