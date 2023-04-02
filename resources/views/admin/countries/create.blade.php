@extends('layout.adminLayout')


@section('title')
   
    {{__('cp.countries')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">



                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_category">
                    {{ csrf_field() }}
                        <div class="form-body">
                       
                      

                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="name_{{$locale->lang}}">
                                        {{ __('cp.title') }} {{ $locale->name }}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                                            placeholder="{{__('cp.title')}} {{$locale->name}}" id="title_{{$locale->lang}}"
                                            value="{{ old('name_'.$locale->lang) }}" required>
                                    </div>
                                </div>
                            @endforeach


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                    <a href="{{ route('admin.countries.index') }}" class="btn btn-warning">
                                        {{__('cp.cancel')}}
                                    </a>
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
@endsection
