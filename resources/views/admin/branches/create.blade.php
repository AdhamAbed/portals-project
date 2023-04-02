@extends('layout.adminLayout')
@section('title')
    {{ __('cp.branches') }}
@endsection
@section('css')
@endsection
@section('content')

    <form method="post" action="{{ route('admin.branches.store') }}"
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
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">
                        {{__('cp.email')}}
                    </label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email"
                               placeholder="{{__('cp.email')}}"
                               id="email"
                               value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="mobile">
                        {{__('cp.mobile')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mobile"
                               placeholder="{{__('cp.mobile')}}"
                               id="mobile"
                               value="{{ old('mobile') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="fax">
                        {{__('cp.fax')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fax"
                               placeholder="{{__('cp.fax')}}"
                               id="fax"
                               value="{{ old('fax') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="site_url">
                        {{__('cp.site_url')}}
                    </label>
                    <div class="col-md-6">
                        <input type="url" class="form-control" name="site_url"
                               placeholder="{{__('cp.site_url')}}"
                               id="site_url"
                               value="{{ old('site_url') }}" required>
                    </div>
                </div>
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
                        <a href="{{ route('admin.branches.index') }}" class="btn btn-warning">
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

