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


 <div class="col-md-12 ">
<div class="d-flex text-right custom-box1 inner-box no-padd">
           <div class="flex-shrink-0">
             <img src="{{ url('frontend/img/cons.png') }}" alt="Sample Image" height="200">

            </div>
        <div class="flex-grow-1 ms-3 mt-4">
         
           <h5 class="bold">نظـــــام استشارة يخـــدم المسجلين في المنصـــة</h5>
            <p>يمكنـــك طلب استشارة مجانية من مستشارين متخصصين بكل سهولة</p>
             <a class="main-btn light-btn mt-2 " href="" style="display:inline-block;" data-bs-toggle="modal" data-bs-target="#exampleModal">أطلب استشارة</a>
           </div>
 </div>
</div>

  </div>













<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content pb-4">
      <div class="modal-header">
        <h5 class="modal-title green-color font-bold" id="exampleModalLabel">طرح سؤال جديد للإستشارة
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <h5 class="mb-4 font-bold">تنبيهات</h5>
        <ul class="list-unstyled">
          <li><img src="{{ url('frontend/img/s-img11.png') }}" height="25"> بعد إرسال سؤالك ستحصل على رقم إستشارتك عبرالبريد الإلكتروني وسنرسل لك رسالة إلكترونية أخرى حين توفر الرد  على سؤالك

</li>
<li><img src="{{ url('frontend/img/s-img11.png') }}" height="25"> . يرجى التأكد تماماً من صحة بريدك حتى يتسنى لنا إرسال الرد عليه</li>
<li><img src="{{ url('frontend/img/s-img11.png') }}" height="25"> . يفضل استخدام نفس البريد في كل سؤال جديد
</li>
<li><img src="{{ url('frontend/img/s-img11.png') }}" height="25"> . يرجى الاحتفاظ برقم استشارتك لتتمكن من البحث عنها في الموقع في حال عدم وصولها إلى بريدك
</li>
<li><img src="{{ url('frontend/img/s-img11.png') }}" height="25"> . سيتم نشر الاستشارة بالموقع إلا إذا طلب صاحبها الحجب</li>

        </ul>

<div class="row">
  
      <!-- Email input -->
      
        <form method="post" action="{{ route('storeConsultations') }}"
          enctype="multipart/form-data" class="form-horizontal" role="form" id="form_city">
        {{ csrf_field() }}


      <div class=" col-md-6 mb-4"><div class="">
    <label class="form-label" for="loginName">الأسم

</label>
        <input type="text" id="loginName" name="name" class="form-control">
        
      </div>
</div><!-- Password input -->
      <div class=" col-md-6 mb-4"><div class="">
    <label class="form-label" for="loginName">البريد الالكتروني</label>
        <input type="email" id="loginName" name="email" class="form-control">
        
      </div>
</div>
<div class=" col-md-6 mb-4">
    <label class="form-label" for="loginName">السوال</label>
        <input type="text" id="loginName" name="question" class="form-control">
        
</div>
<div class=" col-md-6 mb-4">
    <label class="form-label" for="loginName">مجال الاستشارة</label>
        <select class="form-select" aria-label="Default select example" name="consultation_category_id">
            
        @isset($categories)    
        @foreach($categories as $one)
            <option value="{{ @$one->id }}"> {{ @$one->name }} </option>
        @endforeach
        @endisset

</select>
        
</div><div class=" col-md-12 mb-4">
    <label class="form-label">التفاصيل</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="details" rows="3"></textarea>
<label class="form-label" "="">عدد الحروف المتبقية 1500</label>
  </div>




      <!-- 2 column grid layout -->
      

      <!-- Submit button -->
      <div class="text-center"><button type="submit" class="btn search-btn light-btn  " style="
    float: none;
">ارسال الاستشاراة</button></div>

      <!-- Register buttons -->
      
      </form>
    
      </div>
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
        <div class="col-md-12 ">


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
                        <img src="{{ url('frontend/img/nn.png') }}" class="br-0"alt="Sample Image" height="50"> 
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
      <div class="main-box ">
        <div>
        <h5 class="text-right mb-md-0  green-color bold ">
          <img src="{{ url('frontend/img/me.png') }}" height="25">
           المجالات
           </h5>
         </div>

    <small class="gray">يمكنك البحث عن الاستشارة من خلال العديد من الاقتراحات
</small>

<!-- inner row -->
    <div class="row text-center mt-4">



    @isset($categories)
    @foreach($categories as $one)
      <div class="col-md-3 plr-5">
           <a href="{{ route('consultationByCategory', $one->id) }}" class="stat-box  co-box">
             <img src="{{ @$one->image }}" height="33">
              <h6 class="gray mt-2"> {{ @$one->name }} </h6>
          </a>
      </div>
    @endforeach
    @endisset





   </div>
   <!-- #inner row -->








    </div>
    <!-- #left -->

 </div>
  </div>
</section>
<!-- #page content -->
  

@endsection
  