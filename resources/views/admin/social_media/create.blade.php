@extends('layout.adminLayout')
@section('title')
    {{ __('cp.social media') }}
@endsection
@section('css')
@endsection
@section('content')

    <form method="post" action="{{ route('admin.socials_media.store') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}
        <div class="form-body">


{{--                @foreach($locales as $locale)--}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            {{__('cp.name')}}
                            <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name"
                                   placeholder=" {{__('cp.name')}}"
                                   id="name"
                                   value="{{ old('name') }}" required>
                        </div>
                    </div>
{{--                @endforeach--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="url">
                            {{__('cp.url')}}
                        </label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" name="url"
                                   placeholder="{{__('cp.url')}}"
                                   id="url"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="icon">
                            {{__('cp.social icon')}}
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="icon"
                                   placeholder="{{__('cp.icon')}}"
                                   id="icon"
                                   required>
                        </div>
                    </div>



            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                        <a href="{{ route('admin.socials_media.index') }}" class="btn btn-warning">
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

