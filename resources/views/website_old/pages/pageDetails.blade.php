@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


<section class="container sec-padd" id="startchange"> 
    <div class="row">
        <div class="col-sm-12 mb-3">
            <p class="text-right inner-tit1 bold"> {{ @$item->title }} </p>
            <!--<h5 class="text-right  mb-4">تعريف عن المنصة واهدافها </h5>-->
        </div>
    </div>

    <div class="row single-orphans">
        <div class="col-md-12">
            <img src="{{ @$item->image }}" style="width: 100%;" class="cover-fit rounded" height="300">
        </div>
        <div class="col-md-12 mt-3">
            <p class="l-32 mt-3"> {!! @$item->description !!} </p>
        </div>
    </div>
</section>



@endsection
  