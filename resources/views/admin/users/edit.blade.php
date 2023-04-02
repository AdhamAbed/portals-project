@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.users'))}}
@endsection




@section('css')
    <style>
        #map-canvas {
            width: 800px;
            height: 350px;
        }
    </style>
@endsection


@section('content')

    <form method="post" action="{{ route('admin.users.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">
                {{__('cp.name')}} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $item->name ?? '') }}"
                       required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="mobile">
                {{__('cp.mobile')}} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="mobile"
                       type="text" class="form-control" name="mobile" value="{{ old('mobile', $item->mobile ?? '') }}"
                       required>
            </div>
        </div>

        

     <legend>{{__('cp.image')}}</legend>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer; max-width:500px;">
                                        <img src="{{url($item->image ?? url('new_assets/assets/media/avatars/blank.png'))}}" id="editImage" style="max-width: 600px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                </div>
                            </div>


        <div class="form-actions" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                </div>
            </div>
        </div>

    </form>

@endsection



@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&libraries=places"
            type="text/javascript"></script>
    <script>
        var latitude = $('#latitude').data("id");
        var longitude = $('#longitude').data("id");
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: latitude,
                lng: longitude
            },
            zoom: 9
        });
        var marker = new google.maps.Marker({
            position: {
                lat: latitude,
                lng: longitude
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
            $('#latitude').val(lat);
            $('#longitude').val(lng);
        });
    </script>
@endsection



@section('script')
@endsection
