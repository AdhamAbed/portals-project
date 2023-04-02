@extends('layout.adminLayout')
@section('title')
    {{ __('cp.customers') }}
@endsection
@section('css')
@endsection
@section('content')

    <form method="post" action="{{ route('admin.customers.store') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}
        <div class="form-body">


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


          <div class="img">
                <legend>{{__('cp.image')}}</legend>
                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput-new thumbnail"
                             onclick="document.getElementById('edit_image').click()"
                             style="cursor:pointer">
                            <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage" style="max-width:600px;">

                        </div>
                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <input type="file" class="form-control" name="logo" id="edit_image" style="display:none">
                    </div>
                </div>
            </div>



            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-warning">
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

