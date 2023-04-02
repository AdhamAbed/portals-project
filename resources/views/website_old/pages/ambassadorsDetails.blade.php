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


        <div class="row single-orphans">
            <div class="col-md-4">
    	        <img src="{{ @$item->logo }}" style="width: 100%;" class="cover-fit rounded" height="300">
    	        <table class="table table-borderless">
                    <tbody>
                        <tr class="text-right">
                            <td>
                                <i class="fa fa-map-marker green-color ml-5"></i> <span class="gray"> {{ @$item->country->name }} -{{ @$item->city->name }}
                                </span></td>
                        </tr>
                        <tr class="text-right">
                            <td>
                                <i class="fa fa-phone green-color ml-5"></i><a href="tel:{{ @$item->mobile }}" class="gray"> {{ @$item->mobile }} </a>
                            </td>
                            <td>
                                <i class="fa fa-envelope green-color ml-5"></i> <a href="mailto:{{ @$item->email }}" class="gray"> {{ @$item->email }} </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <ul class="list-inline ">
              
                        @if($item->facebook != null)
                            <li class="list-inline-item"><a href="{{ $item->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        
                        @if($item->instagram != null)
                            <li class="list-inline-item"><a href="{{ $item->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        
                        @if($item->twitter != null)
                            <li class="list-inline-item"><a href="{{ $item->twitter }}" target="_blank"><i class="fa fa fa-twitter"></i></a></li>
                        @endif
              
                </ul>
    	    </div>
    
            <div class="col-md-8 mt-4">
    	        <h5 class="bold  mt-4"><i class="fa fa-user green-color ml-5"></i> {{ @$item->title }} </h5>
    	        <p class="l-32">
    	            {!! @$item->details !!}
    	        </p>
            </div>
        </div>
    </section>


@endsection
  