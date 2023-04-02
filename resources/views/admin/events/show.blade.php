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
                

                    @isset($item->image)
                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ $item->image }}" id="editImage" style="max-width:600px;">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endisset
                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.type') }} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' . $item->type) }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.association') }} </b> </label>
                            <div class="col-md-9 bold"> {{ @$item->association->title }} </div>
                        </div>
                    </fieldset>
                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.title') }} </b> </label>
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
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.join_link') }} </b> </label>
                            <div class="col-md-9 bold"> <a href="{{ $item->join_link }}" target="_blank"> {{ $item->join_link }} </a> </div>
                        </div>
                    </fieldset>
                    
                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.start_date') }} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->start_date }} </a> </div>
                        </div>
                    </fieldset>
                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.end_date') }} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->end_date }} </a> </div>
                        </div>
                    </fieldset>
                    
                                        
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.share_post')}} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' . $item->share_post) }} </div>
                        </div>
                    </fieldset>
                    
                    
                    
                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{__('cp.accept_comments')}} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' .  $item->accept_comments) }} </div>
                        </div>
                    </fieldset>
    
                    
                    @if(count($item->photos) > 0)
                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-12 bold"> <b> {{__('cp.images')}} </b> </div>
                        </div>
                    </fieldset>                
                    @foreach($item->photos as $one)
                        <fieldset style="padding: 10px;">
                            <div class="form-group">
                                <div class="col-md-12 bold"> <img src="{{ $one->file }}" style="max-width:600px;"> </div>
                            </div>
                        </fieldset> 
                    @endforeach
                    @endif
                    
   
                    
                    
                    
             



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
