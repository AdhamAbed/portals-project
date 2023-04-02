@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

    
    <section class="container" id="startchange"> 
        <div class="row sec-padd">
            <div class="col-sm-12 mb-3">
                <h4 class="text-right  green-color bold">
                    <img src="{{ url('frontend/img/d-icon.png') }}" height="30"> {{ __('website.associations') }} 
                </h4>
            </div>
        </div>
    </section>


    <section>
	    <div class="container">
	        <form class="row g-3">
                
                <div class="col">
                    <label for="staticEmail2" class="form-label"> {{ __('website.AssociationName') }} </label>
                    <input type="text" class="form-control" id="staticEmail2" name="title">
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label"> {{ __('website.AssociationCategory') }} </label>
                        <select id="disabledSelect" class="form-select">
                            <option>فئة الجمعية</option>
                            <option>تحديد</option>
                            <option> select</option>
                            <option> select</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label"> {{ __('website.AssociationPlace') }} </label>
                        <select id="disabledSelect" class="form-select" name="city_id">
                            <option value=""> {{ __('website.AssociationPlace') }} </option>

                            @isset($cities)
                            @foreach($cities as $one)
                                <option value="{{ $one->id }}"> {{ $one->name }} </option>
                            @endforeach
                            @endisset
                            
                            
                        </select>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn search-btn light-btn"> {{ __('website.search') }} </button>
                </div>
            </form>
        </div>
    </section>


    <section class="sec-padd">
	    <div class="container">
		    <div class="row">

		        @isset($items)
		        @foreach($items as $one)
			        <div class="col-md-4">
				        <div class="ass-box box-shadow">
					        <img src="{{ @$one->image }}" style="max-width:100%;">
					        <h6 class="bold mt-2"> <a href="{{ route('associationDetails', $one->id) }}"> {{ @$one->name }} </a> </h6>
					        <p>
                                {{ \Illuminate\Support\Str::words($one->summary, 25) }}
					        </p>
				            <p>
				                <i class="fa fa-map-marker  green-color"></i> {{ @$one->country->name }} - {{ @$one->city->name }}
				            </p>
				        </div>
			        </div>
                @endforeach
                @endisset
                
		    </div>
	    </div>
	</section>



@endsection
  