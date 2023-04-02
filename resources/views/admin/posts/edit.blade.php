@extends('layout.adminLayout')
@section('title')
    {{__('cp.news')}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.posts.update',$item->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
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
                                <label class="col-sm-2 control-label" for="publication_time"> {{__('cp.publication_time')}} </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="publication_time" value="{{old('publication_time', $item->publication_time)}}">
                                </div>
                            </div>  
                            
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.reference_link')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="reference_link" value="{{old('reference_link', $item->reference_link)}}">
                                </div>
                            </div>     

         
                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.share_post')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="share_post">
                                        <option {{ $item->share_post == 'yes' ? 'selected' : '' }} value="yes"> {{ __('cp.yes') }} </option>
                                        <option {{ $item->share_post == 'no' ? 'selected' : '' }} value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>
                                
         
                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.accept_comments')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="accept_comments">
                                        <option {{ $item->accept_comments == 'yes' ? 'selected' : '' }} value="yes"> {{ __('cp.yes') }} </option>
                                        <option {{ $item->accept_comments == 'no' ? 'selected' : '' }} value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>
                            
                            
                             <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.video')}} </label>
                                <div class="col-md-6 input-field">
                                    <input type="file" class="form-control" name="video">
                                </div>
                            </div>


                            <legend>{{__('cp.image')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer; max-width:500px;">
                                        <img src="{{url($item->image)}}" id="editImage" style="max-width: 600px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                </div>
                            </div>
                            
                            
                            <br>
                    
                            <legend>{{__('cp.images')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="imageupload" style="display:flex;flex-wrap:wrap">
                                        @foreach($item->photos as $one)
                                            <div class="imageBox text-center" style="width:150px; height:190px; margin:5px;">
                                                <img src="{{$one->file}}" style="width:150px;height:150px; padding:5px;">
                                                <button class="btn btn-danger deleteImage" type="button">{{__("cp.remove")}}</button>
                                                <input class="attachedValues form-control" type="hidden" name="oldImages[]" value="{{$one->id}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="file-field input-field input-group control-group increment" >
                                        <div class="btn amber" onclick="document.getElementById('all_images').click()"> 
                                        <span> {{__("cp.addImages")}} </span>
                                          <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i> {{__("cp.addImages")}}</button>
                                          <input type="file" class="form-control hidden"  style="display:none;"  accept="image/*" id="all_images"  multiple />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                            <br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.posts.index') }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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