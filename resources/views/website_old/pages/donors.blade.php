@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


<section class="container" id="startchange"> 

<div class="row sec-padd">
    <div class="col-sm-12 mb-3">

        <h4 class="text-right  green-color bold ">
 <img src="{{ url('frontend/img/m1.png') }}" height="30">
          دليل المانحين

</h4>
      
       
        
    </div>
  </div>

</section>


<section class="container mb-5"> 
    <div class="row text-center">
        
        @isset($items)
        @foreach($items as $one)
        <div class="col-sm-3">
            <div class="stat-box">
                <img src="{{ $one->logo }}"  height="76" />
                <div class="mt-2"> {{ @$one->title }} </div>
            </div>
        </div>
        @endforeach
        @endisset
        
    </div>
</section>


@endsection
  