@extends('layout.adminLayout')

@section('title')
    {{__('cp.associations')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.associations.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">

                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}"value="{{ old('title_'.$locale->lang) }}" required>
                                </div>
                            </div>
                            @endforeach


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="country_id"> {{ __('cp.country') }} </label>
                                    <div class="col-md-6">  
                                        <select name="country_id" id="country_id" class="form-control country">
                                        <option value=""></option>
                                            @foreach($countries as $one)
                                                <option value="{{$one->id}}">{{$one->name}}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 

                            
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="city_id"> {{ __('cp.city') }} </label>
                                    <div class="col-md-6">  
                                        <select name="city_id" id="city_id" class="form-control city">
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 



                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="summary_{{$locale->lang}}"> {{__('cp.summary_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <textarea rows="6" class="form-control" name="summary_{{$locale->lang}}" required aria-required="true"></textarea>
                                </div>
                            </div>
                            @endforeach
                            

                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="details_{{$locale->lang}}"> {{__('cp.details_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <textarea rows="6" class="form-control" name="details_{{$locale->lang}}" id="kt_docs_ckeditor_classic_{{$locale->lang}}" required aria-required="true"></textarea>
                                </div>
                            </div>
                            @endforeach
                            
                   
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.mobile')}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}">
                                </div>
                            </div>    
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.email')}} </label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>    
                            
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.url')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="url" value="{{old('url')}}">
                                </div>
                            </div>    
                            

                            <legend> {{ __('cp.logo') }} </legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                        <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage" value="{{old('image')}}" style="max-width:500px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" accept="image/*" value="{{old('image')}}" id="edit_image" required style="display:none">
                                </div>
                            </div>
                            <br>
                                


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.associations.index') }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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
    <script>
    </script>
@endsection

