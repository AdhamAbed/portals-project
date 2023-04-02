@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


<!-- page content -->
<section class="container sec-padd" id="startchange"> 

<div class="row">
    <div class="col-sm-12 mb-3">

        <h4 class="text-right  green-color bold ">
 <!--<img src="img/con.png" height="30">-->
          الاستشارات
</h4>   
    </div>


 

  </div>



</section>
<!-- #section -->


<section class="container consulting">
  <div class="row">




    <!-- right -->
<div class="col-md-7">
  
  <div class="row">
     <div class="col-md-12 ">


      <!-- box -->
      <div class="d-flex text-right custom-box1 inner-box ">
          
         <div class="flex-grow-1 ms-3">
             


           

           <div class="row">
              <div class="col-md-1">   
                <img src="{{ url('frontend/img/nn.png') }}" class="br-0" alt="Sample Image" height="50"> 
               </div>
             <div class="col-md-11">  
    <h5 class="bold ">  {{ $category->name }} </h5>
                </div>
            </div>
          
        </div>
      </div> 
    <!-- #box -->


    @isset($items)
    @foreach($items as $one)
        
      <div class="d-flex text-right custom-box1 inner-box ">
          
         <div class="flex-grow-1 ms-3">
             <div class="pull-left">
                <span> رقم الاستشارة
                :<span class="green-color"> {{ @$one->consultation_number }} </span>  </span>
             <span>  تاريخ النشر
             :<span class="green-color"> {{ @$one->created_at->format('Y/m/d') }} </span></span>
           </div>


           <h5 class="bold mb-4"> {{ @$one->question }} </h5>

           <div class="row">
              <div class="col-md-1">   
                <img src="{{ url('frontend/img/nn.png') }}" class="br-0" alt="Sample Image" height="50"> 
               </div>
             <div class="col-md-11">   
                <p>  
                                        {{ \Illuminate\Support\Str::words($one->details, 30) }}

   <a href="{{ route('consultationDetails', $one->id) }}" lass="green-color">المزيد</a></p>
                </div>
            </div>
          
        </div>
      </div> 
    
    @endforeach
    @endisset






<!--<div class="text-center mb-5"><button type="submit" class="btn search-btn light-btn  " style="-->
<!--    float: none; width: 100%;-->
<!--">المزيد من الاستشارات</button></div>-->

     </div>
  </div>
</div>
<!-- #right -->

<!-- left -->
    <div class="col-md-5">


      <!-- box -->
      <div class="main-box ">
        <div>
        <h5 class="text-right mb-md-0  green-color bold ">
          <img src="{{ url('frontend/img/search.png') }}" height="25">
            ابحث عن استشارة
           </h5>
         </div>

    <small class="gray">يمكنك البحث عن الاستشارة من خلال العديد من الاقتراحات

</small>



<div class=" filter-dropdown filter mt-3">
         <div class="input-group">
    <div class="input-group-text" id="btnGroupAddon">
      <div class="dropdown">
  <div class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ url('frontend/img/menu-icon.png') }}">
  
  </div>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">ابحث عن استشارتك</a></li>
    <li><a class="dropdown-item" href="#">خيار ٢</a></li>
    <li><a class="dropdown-item" href="#">خيار ٣ </a></li>
        <li><a class="dropdown-item" href="#">خيار ٤</a></li>
  </ul>
</div>
    </div>
    <input type="text" class="form-control" placeholder="ابحث عن استشارتك" aria-label="Input group example" aria-describedby="btnGroupAddon">
  </div>
      </div>
    </div>
      <!-- #box -->

        <!-- box -->
      <div class="main-box   ">
        <div>
        <h5 class="text-right mb-md-0  green-color bold">
          <img src="{{ url('frontend/img/me.png') }}" height="25">الأكثر مشاهدة</h5>
         </div>







      @isset($mostViews)
        @foreach($mostViews as $one)
        <a href="{{ route('consultationDetails', $one->id) }}" class="qus"><div class="d-flex text-right">
            <div class="flex-grow-1 ms-3">
                <div class="pull-left ">
                    <div class="qu-box">
                        <span> {{ @$one->views_count }} </span>
                        <img src="{{ url('frontend/img/eyes.png') }}" height="15">
                    </div>
                </div>

                <h5 class="bold mt-3"> {{ @$one->question }} </h5>

                <div class="row">
              
                    <div class="gray">   
                        <p> {{ @$one->category->name }}  </p>
                    </div>
                </div>
          
            </div>
      </div>
</a>
<hr>
@endforeach
@endisset










    </div>
    <!-- #left -->

 </div>
  </div>
</section>
<!-- #page content -->




@endsection
  