@extends('layout.adminLayout')

@section('title')
    {{__('cp.donors')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.donors.update',$item->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}


                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}" value="{{ old('title_'.$locale->lang, $item->translate($locale->lang)->title) }}" required>
                                    </div>
                                </div>
                            @endforeach

                        
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="summary_{{$locale->lang}}"> {{__('cp.summary_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <textarea rows="6" class="form-control" name="summary_{{$locale->lang}}" required aria-required="true"> {{ old('summary_'.$locale->lang, $item->translate($locale->lang)->summary) }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                            

                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="details_{{$locale->lang}}"> {{__('cp.details_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <textarea rows="6" class="form-control" name="details_{{$locale->lang}}"  id="details_{{$locale->lang}}" required aria-required="true">{{ old('details_'.$locale->lang, $item->translate($locale->lang)->details) }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="url"> {{__('cp.url')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="url" value="{{ old('url', $item->url) }}">
                                </div>
                            </div>     
                        

                            <legend>{{__('cp.image')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer; max-width:500px;">
                                        <img src="{{ url($item->logo) }}" id="editImage" style="max-width: 600px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                </div>
                            </div>
                            

                            <br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.donors.index') }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
                                    </div>
                                </div>
                            </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>







@endsection
@section('script')

    <script>
    </script>

@endsection