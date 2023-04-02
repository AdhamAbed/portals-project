@extends('layout.adminLayout')

@section('title')
    {{__('cp.donors')}}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    @isset($item->logo)
                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ $item->logo }}" style="max-width:600px;">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endisset


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.name') }} </b> </label>
                            <div class="col-md-9 bold"> {{ @$item->title }} </div>
                        </div>
                    </fieldset>

                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.summay') }} </b> </label>
                            <div class="col-md-9 bold"> {!! @$item->summary !!} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.details')}} </b> </label>
                            <div class="col-md-9 bold"> {!! @$item->details !!} </div>
                        </div>
                    </fieldset>

                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.url') }} </b> </label>
                            <div class="col-md-9 bold"> <a href="{{ $item->url }}" target="_blank"> {{ $item->url }} </a> </div>
                        </div>
                    </fieldset>
                    

                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')

<script src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&libraries=places"
  type="text/javascript"></script> 
<script>
    var latitude=$('#latitude').data("id");
    var longitude=$('#longitude').data("id");
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: latitude,
        	lng: longitude
		},
		zoom:9
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
	google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
  			marker.setPosition(place.geometry.location); //set marker position new...
  		}
  		map.fitBounds(bounds);
  		map.setZoom(15);
	});
	google.maps.event.addListener(marker,'position_changed',function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		$('#latitude').val(lat);
		$('#longitude').val(lng);
	});
</script>
@endsection



@section('script')
@endsection
