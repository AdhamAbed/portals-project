@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.users'))}}
@endsection


@section('content')

    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="form-horizontal"
          role="form" id="form">
        {{ csrf_field() }}


        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">
                {{ __('cp.name') }} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="mobile">
                {{ __('cp.mobile') }} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text"
                       class="form-control" name="mobile" value="{{old('mobile')}}" id="mobile" required>
            </div>
        </div>
        
        
            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="order">
                                        {{__('cp.email')}}
                                        <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"
                                        placeholder="{{__('cp.email')}}" {{ old('email') }} required>
                                    </div>
                                </div>
                            </fieldset>
        

        <!--<div class="form-group">-->
        <!--    <label class="col-sm-3 control-label" for="address">-->
        <!--        {{ __('cp.address') }} <span class="symbol">*</span>-->
        <!--    </label>-->
        <!--    <div class="col-md-6">-->
        <!--        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"-->
        <!--               required>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="form-group">
            <label class="col-sm-3 control-label" for="password">
                {{ __('cp.password') }} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"
                       required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="confirm_password">
                {{ __('cp.confirm_password') }} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                       value="{{ old('confirm_password') }}" required>
            </div>
        </div>

        <!--<legend>{{__('cp.location')}}</legend>-->
        <!--<div class="form-group">-->
        <!--    <input type="text" id="searchmap">-->
        <!--    <div id="map-canvas"></div>-->
        <!--</div>-->
        <!--<input type="hidden" class="form-control input-sm" name="lat" value="24.712475836302612" id="lat">-->
        <!--<input type="hidden" class="form-control input-sm" name="lng" value="46.74000000000001" id="lng">-->

        <br><br>
        <legend>{{__('cp.profile_image')}}</legend>
        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="col-md-6 col-md-offset-3">
                <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()"
                     style="cursor:pointer">
                    <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage" style="max-width:400px;">
                </div>
                <input type="file" class="form-control" name="image_profile" id="edit_image" style="display:none">
            </div>
        </div>

        <br><br>


        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{{ __('cp.submit') }}</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-warning">
                        {{ __('cp.cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>

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
@endsection
