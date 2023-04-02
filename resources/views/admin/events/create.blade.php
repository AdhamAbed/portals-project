@extends('layout.adminLayout')

@section('title')
    {{__('cp.events')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">
                            
                            
                            <div class="form-group" id="type">
                                <label class="col-sm-2 control-label" >{{__('cp.type')}} </label>
                                <div class="col-md-6 input-field">
                                    <select class="form-control select02" name="type">
                                        <option value="general"> {{ __('cp.general') }} </option>
                                        <option value="private"> {{ __('cp.private') }} </option>
                                    </select>
                                </div>
                            </div>
                            

                            
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="country_id"> {{ __('cp.association') }} </label>
                                    <div class="col-md-6">  
                                        <select name="association_id" id="association_id" class="form-control">
                                        <option value=""></option>
                                            @foreach($associations as $one)
                                                <option value="{{ $one->id }}">{{ $one->title }}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 



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
                                <label class="col-sm-2 control-label" for="join_link"> {{__('cp.join_link')}} </label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="join_link" value="{{old('join_link')}}">
                                </div>
                            </div>     


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="start_date"> {{__('cp.start_date')}} </label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}">
                                </div>
                            </div>     


                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="end_date"> {{__('cp.end_date')}} </label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}">
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
                                
                                
                            <legend> {{ __('cp.location') }}</legend>
                            <div class="form-group">
                                <input type="text" id="searchmap"> <div id="map-canvas"></div>
                            </div>
                            <input type="hidden" class="form-control input-sm" name="lat" value="24.712475836302612" id="lat">
                            <input type="hidden" class="form-control input-sm" name="lng" value="46.74000000000001" id="lng">
        
                                
                             <br>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.events.index') }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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

    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: 24.70,
                lng: 46.74
            },
            zoom: 9
        });
        var marker = new google.maps.Marker({
            position: {
                lat: 24.70,
                lng: 46.74
            },
            map: map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
    
@endsection


@section('script')
    <script>
    </script>
@endsection

