@extends('layout.adminLayout')
@section('title')
    {{ __('cp.locations') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.locations.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.name_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                               placeholder="{{__('cp.name_'.$locale->lang)}}"
                               id="name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->name  ?? ''}}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.country_name_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="country_name_{{$locale->lang}}"
                               placeholder="{{__('cp.country_name_'.$locale->lang)}}"
                               id="country_name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->country_name  ?? ''}}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.city_name_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city_name_{{$locale->lang}}"
                               placeholder="{{__('cp.city_name_'.$locale->lang)}}"
                               id="city_name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->city_name  ?? ''}}" required>
                    </div>
                </div>
            @endforeach
            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.description_'.$locale->lang)}}
                    </label>
                    <div class="col-md-8">
                        <textarea rows="5" class="form-control" name="description_{{$locale->lang}}"
                                  id="description_{{$locale->lang}}"
                                  placeholder="{{__('cp.description_'.$locale->lang)}}">
                            {{ @$item->translate($locale->lang)->description  ?? ''}}
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
                             name="status" <?= $item->status == 'active' ? 'checked' : ''?>>
						    <span></span>
					    </label>
					    </span>
                </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.locations.index') }}"
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
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
    </script>

@endsection

