@extends('layout.adminLayout')

@section('title')
    {{__('cp.ambassadors')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.ambassadors.update',$item->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
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


                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="country_id"> {{ __('cp.country') }} </label>
                                    <div class="col-md-6">  
                                        <select name="country_id" id="country_id" class="form-control country">
                                            @foreach($countries as $one)
                                                <option {{$item->country_id == $one->id? "selected" : ""}} value="{{$one->id}}">{{$one->name}}</option>
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
                                            @foreach($cities as $one)
                                                <option {{$item->city_id == $one->id? "selected" : ""}} value="{{$one->id}}">{{$one->name}}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 
                            
                        
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

                
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="association_id"> {{ __('cp.association') }} </label>
                                    <div class="col-md-6">
                                        <select name="association_id" id="association_id" class="form-control">
                                            <option value=""> </option>
                                            @isset($associations)
                                            @foreach($associations as $one)
                                                <option {{ $item->association_id == $one->id? 'selected' : '' }} value="{{ $one->id }}"> {{ $one->name }} </option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.mobile')}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mobile" value="{{old('mobile', $item->mobile)}}">
                                </div>
                            </div>    
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.email')}} </label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{old('email', $item->email)}}">
                                </div>
                            </div>                  
                                
                
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="url"> {{__('cp.url')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="url" value="{{ old('url', $item->url) }}">
                                </div>
                            </div>     
                        

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.facebook')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="facebook" value="{{ old('facebook', $item->facebook) }}">
                                </div>
                            </div>    
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.instagram')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="instagram" value="{{ old('instagram', $item->instagram) }}">
                                </div>
                            </div>    
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.twitter')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="twitter" value="{{ old('twitter', $item->twitter) }}">
                                </div>
                            </div>    
                            

                            <legend>{{__('cp.image')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer; max-width:300px;">
                                        <img src="{{ url($item->logo) }}" id="editImage" style="max-width: 300px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                </div>
                            </div>
                            

                            <br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.ambassadors.index') }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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