@extends('layout.adminLayout')

@section('title')
    {{__('cp.news')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
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
                                <label class="col-sm-2 control-label" for="publication_time"> {{__('cp.publication_time')}} </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" name="publication_time" value="{{old('publication_time')}}">
                                </div>
                            </div>     
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="reference_link"> {{__('cp.reference_link')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="reference_link" value="{{old('reference_link')}}">
                                </div>
                            </div>  
                        

                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.share_post')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="share_post">
                                        <option value="yes"> {{ __('cp.yes') }} </option>
                                        <option value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>
                                
         
                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.accept_comments')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="accept_comments">
                                        <option value="yes"> {{ __('cp.yes') }} </option>
                                        <option value="no"> {{ __('cp.no') }} </option>
                                    </select>
                                </div>
                            </div>
                            
                            
                              <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.video')}} </label>
                                <div class="col-md-6 input-field">
                                    <input type="file" class="form-control" name="video">
                                </div>
                            </div>


                            <legend> {{ __('cp.image') }} </legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                        <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage" value="{{old('image')}}" style="max-width:500px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" accept="image/*" value="{{old('image')}}" id="edit_image" required style="display:none">
                                </div>
                            </div>
                            <br>
                                
                            <legend> {{ __('cp.images') }} </legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="imageupload" style="display:flex;flex-wrap:wrap"></div>
                                    <div class="input-group control-group increment" style="margin-top:5px;">
                                        <input type="file" class="form-control hidden" accept="image/*" id="all_images" multiple />
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

