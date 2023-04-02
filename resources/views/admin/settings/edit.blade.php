@extends('layout.adminLayout')

@section('title')
    {{ __('cp.setting') }}
@endsection

@section('css')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&callback=initMap"> </script>
    <style>
        legend {
            color: #e50d0d;
            margin: 15px 0;
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">

                                <legend class="font-blue">{{__('cp.title_setting')}}</legend>

                            @foreach($locales as $locale)

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="title_{{$locale->lang}}">
                                            {{__('cp.appName_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="title_{{$locale->lang}}" name="title_{{$locale->lang}}" value="{{old('title_'.$locale->lang,@$item->translate($locale->lang)->title ?? '')}}">
                                        </div>
                                    </div>
                            @endforeach


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="address_{{$locale->lang}}">
                                            {{__('cp.address_'.$locale->lang)}} <span class="symbol">*</span>
                                        </label>
                                        <div class="col-md-6">
                                             <textarea rows="4" class="form-control" name="address_{{$locale->lang}}" placeholder="{{__('cp.address_'.$locale->lang)}}" id="address_{{$locale->lang}}" required="" aria-required="true">{{ old('cp.address_'.$locale->lang,@$item->translate($locale->lang)->address) }}</textarea>
                                            <input type="text" class="form-control" id="address_{{$locale->lang}}"
                                            name="address_{{$locale->lang}}"
                                            value="{{old('address_'.$locale->lang,@$item->translate($locale->lang)->address ?? '')}}">

                                        </div>
                                    </div>
                                @endforeach





                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="description_{{$locale->lang}}">
                                            {{__('cp.description_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description_{{$locale->lang}}" rows="6" placeholder="{{__('cp.description_'.$locale->lang)}}">{{ @$item->translate($locale->lang)->description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="url">
                                        {{__('cp.url')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" id="url" name="url" value="{{old('url',$item->url)}}">
                                    </div>
                                </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="clients_count">
                                    {{__('cp.clients_count')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="clients_count" name="clients_count" value="{{old('clients_count',$item->clients_count ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="users_count">
                                    {{__('cp.users_count')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="users_count" name="users_count" value="{{old('users_count',$item->users_count ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="projects_count">
                                    {{__('cp.projects_count')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="projects_count" name="projects_count" value="{{old('projects_count',$item->projects_count ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="courses_count">
                                    {{__('cp.courses_count')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="courses_count" name="courses_count" value="{{old('courses_count',$item->courses_count ?? '')}}">
                                </div>
                            </div>

                                <legend>{{__('cp.home_page')}}</legend>

                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="header_title">
                                            {{__('cp.header_title_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="header_title_{{$locale->lang}}" rows="6" placeholder="{{__('cp.header_title')}}">{{ @$item->translate($locale->lang)->header_title ?? ''}}</textarea>
                                        </div>
                                    </div>
                                @endforeach



                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="header_description">
                                            {{__('cp.header_description_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="header_description_{{$locale->lang}}" rows="6" placeholder="{{__('cp.header_description')}}">{{ @$item->translate($locale->lang)->header_description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_features_subtitle">
                                        {{__('cp.training_features_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_features_subtitle ?? ''}}" name="training_features_subtitle_{{$locale->lang}}" placeholder="{{__('cp.training_features_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_features_title">
                                        {{__('cp.training_features_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_features_title ?? ''}}" name="training_features_title_{{$locale->lang}}" placeholder="{{__('cp.training_features_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_courses_subtitle">
                                        {{__('cp.training_courses_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_courses_subtitle ?? ''}}" name="training_courses_subtitle_{{$locale->lang}}" placeholder="{{__('cp.training_courses_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_courses_title">
                                        {{__('cp.training_courses_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_courses_title ?? ''}}" name="training_courses_title_{{$locale->lang}}" placeholder="{{__('cp.training_courses_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_consultants_subtitle">
                                        {{__('cp.training_consultants_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_consultants_subtitle ?? ''}}" name="training_consultants_subtitle_{{$locale->lang}}" placeholder="{{__('cp.training_consultants_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="training_consultants_title">
                                        {{__('cp.training_consultants_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->training_consultants_title ?? ''}}" name="training_consultants_title_{{$locale->lang}}" placeholder="{{__('cp.training_consultants_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="trainees_subtitle">
                                        {{__('cp.trainees_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->trainees_subtitle ?? ''}}" name="trainees_subtitle_{{$locale->lang}}" placeholder="{{__('cp.trainees_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="trainees_title">
                                        {{__('cp.trainees_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->trainees_title ?? ''}}" name="trainees_title_{{$locale->lang}}" placeholder="{{__('cp.trainees_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="blog_subtitle">
                                        {{__('cp.blog_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->blog_subtitle ?? ''}}" name="blog_subtitle_{{$locale->lang}}" placeholder="{{__('cp.blog_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="blog_title">
                                        {{__('cp.blog_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->blog_title ?? ''}}" name="blog_title_{{$locale->lang}}" placeholder="{{__('cp.blog_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="faqs_subtitle">
                                        {{__('cp.faqs_subtitle_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->faqs_subtitle ?? ''}}" name="faqs_subtitle_{{$locale->lang}}" placeholder="{{__('cp.faqs_subtitle_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="faqs_title">
                                        {{__('cp.faqs_title_'.$locale->lang)}}
                                    </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $item->translate($locale->lang)->faqs_title ?? ''}}" name="faqs_title_{{$locale->lang}}" placeholder="{{__('cp.faqs_title_'.$locale->lang)}}">
                                    </div>
                                </div>
                            @endforeach


                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="footer_description">
                                            {{__('cp.footer_description_'.$locale->lang)}}
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="footer_description_{{$locale->lang}}" rows="6" placeholder="{{__('cp.footer_description_'.$locale->lang)}}">{{ @$item->translate($locale->lang)->footer_description}}</textarea>
                                        </div>
                                    </div>
                                @endforeach


                                <legend>{{__('cp.contact_info')}}</legend>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="info_email">
                                        {{__('cp.email')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="info_email" name="info_email" value="{{old('info_email',$item->info_email)}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="mobile">
                                        {{__('cp.mobile')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile" value="{{old('mobile',$item->mobile)}}" id="mobile">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="whatsapp">
                                        {{__('cp.whatsapp')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="whatsapp" value="{{old('whatsapp', $item->whatsapp)}}" id="whatsapp">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="phone">
                                        {{__('cp.phone')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" value="{{old('phone',$item->phone)}}" id="phone">
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="facebook">
                                        {{__('cp.facebook')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="facebook" value="{{old('facebook',$item->facebook)}}" id="facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="twitter">
                                        {{__('cp.twitter')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="twitter" value="{{old('twitter',$item->twitter)}}" id="twitter">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instagram">
                                        {{__('cp.instagram')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="instagram" value="{{old('instagram',$item->instagram)}}" id="instagram">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="linked_in">
                                        {{__('cp.linked_in')}}
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="linked_in" value="{{old('linked_in',$item->linked_in)}}" id="linked_in">
                                    </div>
                                </div>





                                <legend>{{__('cp.app_settings')}}</legend>



                                <legend>{{__('cp.colorful_logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                                            <img src="{{ url($item->colorful_logo) }}" style="max-width: 200px;" id="editImage">
                                        </div>
                                        <input type="file" class="form-control" name="colorful_logo" id="edit_image" style="display:none">
                                    </div>
                                </div>



                                <legend>{{__('cp.white_logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image1').click()" style="cursor:pointer">
                                            <img src="{{ url($item->white_logo) }}" style="max-width: 200px;" id="editImage1">
                                        </div>
                                        <input type="file" class="form-control" name="white_logo" id="edit_image1" style="display:none">
                                    </div>
                                </div>

                            <legend>{{__('cp.second_logo')}}</legend>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image2').click()" style="cursor:pointer">
                                            <img src="{{ url($item->second_logo) }}" style="max-width: 200px;" id="editImage2">
                                        </div>
                                        <input type="file" class="form-control" name="second_logo" id="edit_image2" style="display:none">
                                    </div>
                                </div>

{{--                            <legend>{{__('cp.Header Slider Images')}}</legend>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6 col-md-offset-3">--}}
{{--                                    <div class="imageupload" style="display:flex;flex-wrap:wrap">--}}
{{--                                        @foreach($sliderImages as $one)--}}
{{--                                            <div class="imageBox text-center" style="width:150px; height:190px; margin:5px;">--}}
{{--                                                <img src="{{$one->image}}" style="width:150px;height:150px; padding:5px;">--}}
{{--                                                <button class="btn btn-danger deleteImage" type="button">{{__("cp.remove")}}</button>--}}
{{--                                                <input class="attachedValues form-control" type="hidden" name="oldImages[]" value="{{$one->id}}">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                    <div class="file-field input-field input-group control-group increment" >--}}
{{--                                        <div class="btn amber" onclick="document.getElementById('all_images').click()">--}}
{{--                                            <span> {{__("cp.addImages")}} </span>--}}
{{--                                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i> {{__("cp.addImages")}}</button>--}}
{{--                                            <input type="file" class="form-control hidden"  style="display:none;"  accept="image/*" id="all_images"  multiple />--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}



                                <fieldset>
                                    <legend>{{""}}</legend>
                                    <input id="searchInput" class="input-controls" type="text"
                                           placeholder="{{__('cp.search')}}">
                                    <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                    <div class="form_area">
                                        <input type="hidden" value="{{$setting->address}}" name="address" id="location">
                                        <input type="hidden" value="{{$setting->latitude}}" name="latitude" id="lat">
                                        <input type="hidden" value="{{$setting->longitude}}" name="longitude" id="lng">
                                    </div>
                                </fieldset>






<Br><Br>
                                <!--<fieldset>-->
                                <!--    <legend>{{""}}</legend>-->
                                <!--    <input id="searchInput" class="input-controls" type="text"-->
                                <!--           placeholder="{{__('cp.search')}}">-->
                                <!--    <div class="map" id="map" style="width: 100%; height: 300px;"></div>-->
                                <!--    <div class="form_area">-->
                                <!--        <input type="hidden" value="{{$setting->address}}" name="address" id="location">-->
                                <!--        <input type="hidden" value="{{$setting->latitude}}" name="latitude" id="lat">-->
                                <!--        <input type="hidden" value="{{$setting->longitude}}" name="longitude" id="lng">-->
                                <!--    </div>-->

                                <!--</fieldset>-->




                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                        <a href="{{url(getLocal().'/admin/home')}}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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

        /* script */
        function initialize() {
            var latlng = new google.maps.LatLng('{{$setting->latitude}}', '{{$setting->longitude}}');
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 10
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: true,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            var geocoder = new google.maps.Geocoder();
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);

            });
            // this function will work on marker move event into map
            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        }

        function bindDataToForm(address, lat, lng) {
            document.getElementById('location').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
