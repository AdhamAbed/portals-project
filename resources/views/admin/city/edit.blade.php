@extends('layout.adminLayout')


@section('title')
{{ucwords(__('cp.cities_managment'))}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase" style="color: #e02222 !important;">
                            {{__('cp.edit')}}{{__('cp.city')}}
                        </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.cities.update',$item->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                    {{ csrf_field() }}
                    {{ method_field('PATCH')}}
                        <div class="form-body">

         
                        <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="code">
                                    {{__('cp.select')}} {{__('cp.country')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">  
                                        <select name="country_id" id="country_id" class="form-control">
                                            @foreach($countries as $one)
                                                <option {{$item->country_id == $one->id? "selected" : ""}} value="{{$one->id}}">{{$one->name}}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 
         



                            <fieldset>
                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="name_{{$locale->lang}}">
                                            {{__('cp.title')}} {{$locale->name}}
                                            <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name_{{$locale->lang}}"
                                                placeholder="{{__('cp.title')}} {{$locale->name}}"
                                                id="title_{{$locale->name}}"
                                               value="{{ $item->translate($locale->lang)->name}}" required>
                                        </div>
                                    </div>
                                @endforeach
                            </fieldset>


     


                            <div class="form-actions">
                                <div class="row">
                               <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                    <a href="{{ route('admin.cities.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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
