@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

<section class="container sec-padd" id="startchange"> 

<div class="row">
    <div class="col-sm-12 mb-3">
        <h3 class="text-right  green-color bold ">الأخبار

</h3>
      
        <!--<p class="text-right bold mb-4">الفعاليات التي تقوم عليها الجمعيات</p>-->
        
    </div>

<!-- n -->
<div class="col-md-12  ">
        <!-- box -->
        <div class="">
      <img src="{{ $item->image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date" style="height:fit-content;">
       <h5 class="">    {{ @$item->created_at->format('d') }}
                            {{ @$item->created_at->format('M') }}
                            {{ @$item->created_at->format('Y') }}
                            </h5>
    </div>
    <div class="flex-grow-1 ms-3">
      <div class="gray mb-3">  <img src="{{ url('frontend/img/map1.png') }}" height="20"> الرياض- المملكة العربية السعودية </div>

       <p class="text-right"> {!! @$item->details !!} </p>
    </div>

  
    
</div>
</div>




      </div>
      
    </div>
        <!-- #box -->
      </div>
<!-- #n -->

  


</section>

@endsection
  