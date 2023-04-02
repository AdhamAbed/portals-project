@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

    <section class="container sec-padd" id="startchange"> 
        <div class="row">
            <div class="col-sm-12 mb-3">
                <p class="text-right  inner-tit1 bold"> {{ __('website.ambassadors') }} </p>
                <h5 class="text-right  mb-4">سفراء الايتام تقوم عليها الجمعيات</h5>
            </div>
        </div>
        <hr>

        <div class="container mt-4">
	        <form class="row g-3 mt-4">
                <div class="col">
                    <input type="text" class="form-control" id="staticEmail2" name="txt" placeholder="ابحث عن سفراء الايتام">
                </div>
                <div class="col">
                    <button type="submit" class="btn search-btn light-btn" style="margin-top: 0;"> {{ __('website.search') }} </button>
                </div>
            </form>
        </div>
    </section>


    <section class="container  mb-60">
	    <div class="row">
     	    
     	    @isset($items)
     	    @foreach($items as $one)
     	    <div class="col">
		        <div class="ambassador-box text-center box-shadow">
			        <a href="{{ route('ambassadorsDetails', $one->id) }}">
			            <img  class="cover-fit" src="{{ @$one->logo }}" height="175">
			            <h6> {{ @$one->title }} </h6>
			        </a>
			        <ul class="list-inline">
			            
			            @if($one->facebook != null)
                            <li class="list-inline-item"><a href="{{ $one->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        
                        @if($one->instagram != null)
                            <li class="list-inline-item"><a href="{{ $one->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        
                        @if($one->twitter != null)
                            <li class="list-inline-item"><a href="{{ $one->twitter }}" target="_blank"><i class="fa fa fa-twitter"></i></a></li>
                        @endif
                        
                    </ul>
	     	    </div> 	
	        </div>
	        @endforeach
	        @endisset
	        
	    </div>
    </section>

@endsection
  