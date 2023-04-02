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

    <div class="col-md-12">
    <div class=" text-center custom-box1 inner-box ">
          
         <div class="text-center">
             


           <h5 class="bold mb-4"> {{ @$item->question }} </h5>
<div class=" mb-3">
                <span> رقم الاستشارة
                :<span class="green-color">  {{ @$item->consultation_number }}  </span>  </span>
             <span>  تاريخ النشر
             :<span class="green-color"> {{ @$item->created_at->format('Y/m/d') }}  </span></span>
           </div>
           <div class="">
                <span>  المجيب :<span class="green-color">
                     {{ @$item->answer_by }} </span>  </span>
           </div>

           <!--<ul class="rate2 mt-3 list-inline">-->
           <!-- <li><i class="fa fa-star text-warning"></i></li>-->
           <!--   <li><i class="fa fa-star text-warning"></i></li>-->
           <!--   <li><i class="fa fa-star text-warning"></i></li>-->
           <!--   <li><i class="fa fa-star text-warning"></i></li>-->
           <!--     <li><i class="fa fa-star gray"></i></li>-->
           <!--</ul>-->

           

         </div>
        
        </div>
      </div>

  </div>

</section>
<!-- #section -->


<section class="container consulting">
  <div class="row">




    <!-- right -->
<div class="col-md-7">
  
  <div class="row">
    

<div class="main-box p-0">
    <ul class="nav nav-tabs" id="qus" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">السؤال

</button>
  </li>
  
  
</ul>



<div class="tab-content p-3" id="myTabContent">

  <!-- tap 1 -->
  <div class="tab-pane fade active show" id="qus" role="tabpanel" aria-labelledby="home-tab">

{!! @$item->details !!} 

  </div>
<!-- #tab 1 -->


</div>
     </div>
<div class="main-box p-0">
    <ul class="nav nav-tabs" id="ans" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" style="background: #48D6B7;">الجواب

</button>
  </li>
  
  
</ul>



<div class="tab-content p-3" id="myTabContent">

  <!-- tap 1 -->
  <div class="tab-pane fade active show" id="ans" role="tabpanel" aria-labelledby="home-tab">

{!! @$item->answer !!} 

  </div>
<!-- #tab 1 -->

</div>
     </div>
     
     
<!--<div class="main-box p-0">-->
<!--    <ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--  <li class="nav-item" role="presentation">-->
<!--    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">مواد ذات الصله</button>-->
<!--  </li>-->
<!--  <li class="nav-item" role="presentation">-->
<!--    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">الاستشارات</button>-->
<!--  </li>-->
<!--  <li class="nav-item" role="presentation">-->
<!--    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">الدورات التدريبية</button>-->
<!--  </li>-->
<!--</ul>-->



<!--<div class="tab-content p-3" id="myTabContent">-->

<!--   tap 1 -->
<!--  <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">-->
<!--<div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           
<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->
 
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->
 
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->

<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--  </div>-->
<!-- #tab 1 -->


<!-- tab2 # -->
<!--  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">-->

    
<!--<div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           
<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟22</h5>-->
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

      
      

      
      

      
      

<!--  </div>-->


<!--   tab3 -->
<!--  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">-->

    
<!--<div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟333</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->

<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف -->
<!-- 2أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

<!--      <hr>-->
<!--    <div class="d-flex text-right  ">-->
          
<!--         <div class="flex-grow-1 ms-3">-->
<!--             <div class="pull-left mt-2">-->
<!--    <img src="img/cons2.png" class="br-0 ml-1 mb-1" alt="Sample Image" height="22">-->
<!--                <span class="mt-3">استشارات </span> -->
             
<!--           </div>-->
           


<!--           <h5 class="bold mb-4"> <img src="img/nn.png" class="br-0" alt="Sample Image" height="50"> كيف أتعامل مع أخي الأكبر فهو مُؤذي ويفتعل المشاكل؟</h5>-->



           
          
<!--        </div>-->
<!--      </div>-->

      
      

      
      

      
      



<!--  </div>-->

<!--   tab 3 -->
<!--</div>-->
<!--     </div>-->
  </div>
</div>




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
  