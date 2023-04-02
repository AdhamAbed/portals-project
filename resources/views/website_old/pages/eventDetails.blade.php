@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

<section class="container sec-padd" id="startchange"> 

<div class="row">
    <div class="col-sm-12 mb-3">
        <h3 class="text-right  green-color bold ">الفعاليات

</h3>
      
        <p class="text-right bold mb-4">الفعاليات التي تقوم عليها الجمعيات</p>
        
    </div>

<!-- n -->
<div class="col-md-12  ">
        <!-- box -->
        <div class="">
      <img src="{{ $event->image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date" style="height:fit-content;">
       <h5 class="">    {{ @$event->created_at->format('d') }}
                            {{ @$event->created_at->format('M') }}
                            {{ @$event->created_at->format('Y') }}
                            </h5>
    </div>
    <div class="flex-grow-1 ms-3">
      <div class="gray mb-3">  <img src="{{ url('frontend/img/map1.png') }}" height="20"> الرياض- المملكة العربية السعودية </div>

       <p class="text-right"> {!! @$event->details !!} </p>
    </div>

  
    
</div>
</div>
<hr>
<div class="mt-4 mb-5">
      <img src="{{ $event->association->image }}"  height="70"> <span class="bold"> {{ $event->association->name }} </span>

  <div class="col-sm-12 mt-4  mb-5 mt-3">
        <h3 class="text-right  green-color bold ">فعاليات اخرى</h3>
      
    </div>
   

   <div class="row dir-box ">


      <!-- col -->
      












@isset($allEvents)
@foreach($allEvents as $one)
<div class="col-md-3">
        <!-- box -->
        <div class="card h-100">
      <img src="{{ $one->image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date">
       <h5 class="">
              {{ @$one->created_at->format('d') }}
                            {{ @$one->created_at->format('M') }}
                            {{ @$one->created_at->format('Y') }}
           </h5>
    </div>
    <div class="flex-grow-1 ms-3">
        
       <p class="text-right"> {{ $one->title }} </p>
    </div>
</div>
      </div>
      <a href="{{ route('eventDetails', $one->id) }}" class="card-footer text-right">
              <small class="text-muted" style="font-size: 12px;">

          <img src="{{ url('frontend/img/event-icon1.png') }}" height="15" class="pl-5">  فعالية  
        </small>
        <small class="text-muted" style="font-size: 12px; margin-right: 8px;">
          <img src="{{ url('frontend/img/map1.png') }}" height="15" class="pl-5">الرياض- المملكة العربية السعودية

        </small>
      </a>
    </div>
        <!-- #box -->
      </div>
@endforeach
@endisset





    </div>


    </div>


      </div>
      
    </div>
        <!-- #box -->
      </div>
<!-- #n -->

  


</section>

@endsection
  