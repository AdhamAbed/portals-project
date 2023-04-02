@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection



@section('content')

<section class="container" id="startchange"> 
    <div class="row sec-padd">
        <div class="col-sm-12 ">
            <h4 class="text-right  green-color bold ">المبادرات</h4>
        </div>
        <!--<div><p class="gray mb-3">الفعاليات التي تقوم عليها الجمعيات</p></div>-->
    </div>
</section>
<!-- #page content -->


<!-- search section -->
<section>
    <div class="container">
        <form class="row g-3">
            <div class="col">
                <label for="staticEmail2" class="form-label"> {{ __('website.EventTitle') }} </label>
                <input type="text" class="form-control" id="staticEmail2" name="title" placeholder="{{ __('website.EventTitle') }}">
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label"> {{ __('website.association') }} </label>
                    <select id="disabledSelect" class="form-select" name="association_id">
                        <option value=""> {{ __('website.association') }} </option>
                       
                        @isset($associations)
                        @foreach($associations as $one)
                            <option value="{{ $one->id }}"> {{ $one->title }} </option>
                        @endforeach
                        @endisset
                       
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">المدينة</label>
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

            <!--<div class="col">-->
            <!--    <div class="mb-3">-->
            <!--        <label for="disabledSelect" class="form-label">الفترة الزامنية</label>-->
            <!--        <select id="disabledSelect" class="form-select" name="event_time">-->
            <!--            <option value=""> الفترة الزمنية </option>-->
            <!--            <option value='next_week'>الأسبوع القادم</option>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col">
                <button type="submit" class="btn search-btn light-btn"> {{ __('website.search') }} </button>
            </div>
        </form>
   </div>
</section>
<!-- #search section -->


<!-- section -->
<section class="mt-4 mb-5">
  <div class="container">
    <div class="row dir-box ">


      <!-- col -->
      

@isset($items)
@foreach($items as $one)
    <div class="col-md-3">
        <div class="card h-100">
      <img src="{{ @$one->image }}" class="card-img-top" alt="{{ @$one->title }}" title="{{ @$one->title }}">
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
        
       <p class="text-right"> <a href="{{ route('initiativeDetails', $one->id) }}"> {{ @$one->title }} </a> </p>
    </div>
</div>
      </div>
      <a href="" class="card-footer text-right">
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
  

</section>
<!-- #section -->


@endsection
  