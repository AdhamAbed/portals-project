@extends('layout.adminLayout')
@section('title')
    {{ __('cp.features') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.features.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">



                @foreach($locales as $locale)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">
                            {{__('cp.title_'.$locale->lang)}}
                            <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title_{{$locale->lang}}"
                                   placeholder="{{__('cp.title_'.$locale->lang)}}"
                                   id="title_{{$locale->lang}}"
                                   value="{{ $item->translate($locale->lang)->title ?? '' }}" required>
                        </div>
                    </div>
                @endforeach
                    @foreach($locales as $locale)
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="description_{{$locale->lang}}"> {{__('cp.description_'.$locale->lang)}}
                                <span class="symbol">*</span>
                            </label>
                            <div class="col-md-6">
                                        <textarea rows="6" class="form-control" name="description_{{$locale->lang}}"
                                                  required aria-required="true">{{ $item->translate($locale->lang)->description ?? ''}}</textarea>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="color">
                            {{ __('cp.Feature color') }} <span class="symbol">*</span>
                        </label>
                        <div class="col-md-3" >
                            <input type="color" class="form-control" name="color"
                                   placeholder=" {{__('cp.color')}}" id="color"
                                   value="{{ $item->color }}" style="height: 50px">
                        </div>
                    </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.features.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')

@endsection

@section('script')


@endsection

