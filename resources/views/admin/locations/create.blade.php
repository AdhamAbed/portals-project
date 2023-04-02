@extends('layout.adminLayout')
@section('title')
    {{ __('cp.locations') }}
@endsection
@section('css')
@endsection
@section('content')

    <form method="post" action="{{ route('admin.locations.store') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}
        <div class="form-body">


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.name_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                               placeholder=" {{__('cp.name')}} {{$locale->lang}}" id="name_{{$locale->lang}}"
                               value="{{ old('name_'.$locale->lang) }}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.country_name_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="country_name_{{$locale->lang}}"
                               placeholder=" {{__('cp.country_name')}} {{$locale->lang}}" id="country_name_{{$locale->lang}}"
                               value="{{ old('country_name_'.$locale->lang) }}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.city_name_'.$locale->lang)}} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city_name_{{$locale->lang}}"
                               placeholder=" {{__('cp.city_name')}} {{$locale->lang}}" id="city_name_{{$locale->lang}}"
                               value="{{ old('city_name_'.$locale->lang) }}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.description_'.$locale->lang)}}
{{--                        <span class="symbol">*</span>--}}
                    </label>
                    <div class="col-md-6">
                        <textarea rows="5" class="form-control" name="description_{{$locale->lang}}"
                                  id="description_{{$locale->lang}}"
                                  placeholder=" {{__('cp.description_'.$locale->lang)}}" {{ old('description_'.$locale->lang) }}>
                            {{ old('description_'.$locale->lang) }}
                        </textarea>
                    </div>
                </div>
            @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.Status')}}
                    </label>
                    <div class="col-md-6">
                    <span class="switch">
					    <label>
                            <input type="checkbox"
                                   name="status" checked>
						    <span></span>
					    </label>
					    </span>
                    </div>
                </div>



            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                        <a href="{{ route('admin.locations.index') }}" class="btn btn-warning">
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
    </script>
@endsection

@section('script')
@endsection

