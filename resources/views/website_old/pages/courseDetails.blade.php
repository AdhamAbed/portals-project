@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

<!-- section2 -->
<section class="" id="startchange"> 
<div class="container text-center sec-padd  ">

<!-- row -->
  <div class="row">
    <div class="col-sm-12 mb-3" >
        <p class="text-right  inner-tit1">
            {{ @$item->title }}
             </p>
        <h4 class="text-right bold mb-4">
            {{ @$item->category->name }} 

        </h4>
        
    </div>
  </div>
<!-- #row -->


<!-- row -->
  <div class="row">
    <div class="col-sm-12 mb-5" >
      <div class="cimg-box">

       <a href="" class="play-btn"><img src="{{ url('frontend/img/play.png') }}" /></a>
       <img src=" {{ @$item->image }}" class="d-img">

      </div>
        
    </div>
  </div>
<!-- #row -->

<!-- row -->
  <div class="row">
    <div class="col-sm-8 mb-3" >
        <p class="text-right  inner-tit1 bold ">
        {{ @$item->title }} 
        </p>
        <p class="text-right"> 
             {!! @$item->details !!}
        </p>
        

        <p class="text-right  inner-tit1 bold ">
      تفاصيل أكثر
        </p>

        <table class="table table-borderless ">
  <thead>
    <tr class="text-right"> 
      <th scope="col">اسم الجمعية</th>
      <th scope="col">الفئة</th>
      <th scope="col">عدد المسجلين</th>
      <th scope="col">تقييم الدورة</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-right">
      <td><img src="{{ url('frontend/img/r-logo.png') }}" height="55"> جمعية رواء للايتام </th>
      <td>دورة علوم ايمانية و دعوية
</td>
      <td>550</td>
      <td>عدد التقييمات
(223)

            <div class="ratings"> 
              <span>5.5</span>
              <i class="fa fa-star rating-color"></i> <i class="fa fa-star rating-color"></i>
               <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i> 
                <i class="fa fa-star"></i>
             </div>

</td>
    </tr>
  
  </tbody>
</table>

    </div>
         <div class="col-sm-4 mb-3" >
           <div class="left-box">
         <a href="" class="main-btn light-btn d-block"><i class="fa fa-arrow-right arrow-right"></i> مشاهدة الدورة </a>
          <h6 class="bold text-right"><img src="{{ url('frontend/img/info.png') }}">معلومات عن الدورة </h6>
           
          


        <table class="table table-borderless ">
 
  <tbody>
    <tr class="text-right">
      <td>الوقت الإجمالي</th>
      <td class="bold">3 ساعات</td>
    </tr>
     <tr class="text-right">
      <td>تاريخ الدورة</th>
      <td class="bold">3/ 4</td>
    </tr>

     <tr class="text-right">
      <td>عدد المحاضرات</th>
      <td class="bold">15</td>
    </tr>

     <tr class="text-right">
      <td>إمكانةي الوصول للمحاضرات بأي وقت</th>
      <td class="bold">نعم</td>
    </tr>
  
   <tr class="text-right">
      <td>لغة الدورة </th>
      <td class="bold">لغة عربية</td>
    </tr>
  </tbody>
</table>

<hr>
<div class="left-box-footer ">
  <h6 class="bold text-right">
  <img src="{{ url('frontend/img/share.png') }}">
  شارك الأصدقاء
</h6>

  <ul class="list-inline">
    <li><a href=""><i class="fa fa-facebook"></i></a></li>
   <li><a href=""><i class="fa fa-twitter"></i></a></li>
     <li><a href=""><i class="fa fa-instagram"></i></a></li>
  </ul>

</div>
           </div>
         </div>

  </div>
<!-- #row -->



</div>
</section>


<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <p class="text-right  inner-tit1 bold ">
      آراء المستفيدين (55)
        </p>

  <div class="row " >
<div class="col-sm-12">
    <div id="testimonials" class="owl-carousel owl-theme slider1">

 <div class="item text-center " data-aos="fade-up" data-aos-delay="300"  data-aos-duration="700"> 
  <div class="testimonials-box">
    <img src="{{ url('frontend/img/user1.png') }}" class="rounded-circle">
<div>شروق محمد أحمد البلوي</div>
<span class="gray"> منذ 14 يوم و 9 ساعات</span>
<div class="green-color">" دورة ممتازة شكرا لكم دورة ممتازة شكرا لكم دورة  دورة ممتازة شكرا لكم ممتازة شكرا لكم  "</div>
<div class="ratings"> 
             
              <i class="fa fa-star "></i> <i class="fa fa-star "></i>
               <i class="fa fa-star "></i>
                <i class="fa fa-star "></i> 
                <i class="fa fa-star"></i>
             </div>
</div>
  </div>


  <!-- #item -->

  <!-- item -->
  <div class="item text-center " data-aos="fade-up" data-aos-delay="300"  data-aos-duration="700"> 
  <div class="testimonials-box">
    <img src="{{ url('frontend/img/user1.png') }}" class="rounded-circle">
<div>هنا ي،ضع الاسم</div>
<span class="gray"> منذ 14 يوم و 9 ساعات</span>
<div class="green-color">" دورة ممتازة شكرا لكم دورة ممتازة شكرا لكم دورة  دورة ممتازة شكرا لكم ممتازة شكرا لكم  "</div>
<div class="ratings"> 
             
              <i class="fa fa-star "></i> <i class="fa fa-star "></i>
               <i class="fa fa-star "></i>
                <i class="fa fa-star "></i> 
                <i class="fa fa-star"></i>
             </div>
</div>
  </div>

  <!-- #item -->


    <!-- item -->
  <div class="item text-center " data-aos="fade-up" data-aos-delay="300"  data-aos-duration="700"> 
  <div class="testimonials-box">
    <img src="{{ url('frontend/img/user1.png') }}" class="rounded-circle">
<div>مثال لاسم</div>
<span class="gray"> منذ 14 يوم و 9 ساعات</span>
<div class="green-color">" دورة ممتازة شكرا لكم دورة ممتازة شكرا لكم دورة  دورة ممتازة شكرا لكم ممتازة شكرا لكم  "</div>
<div class="ratings"> 
             
              <i class="fa fa-star "></i> <i class="fa fa-star "></i>
               <i class="fa fa-star "></i>
                <i class="fa fa-star "></i> 
                <i class="fa fa-star"></i>
             </div>
</div>
  </div>

  <!-- #item -->



    <!-- item -->
  <div class="item text-center " data-aos="fade-up" data-aos-delay="300"  data-aos-duration="700"> 
  <div class="testimonials-box">
    <img src="{{ url('frontend/img/user1.png') }}" class="rounded-circle">
<div>الاسم الاسم</div>
<span class="gray"> منذ 14 يوم و 9 ساعات</span>
<div class="green-color">" دورة ممتازة شكرا لكم دورة ممتازة شكرا لكم دورة  دورة ممتازة شكرا لكم ممتازة شكرا لكم  "</div>
<div class="ratings"> 
             
              <i class="fa fa-star "></i> <i class="fa fa-star "></i>
               <i class="fa fa-star "></i>
                <i class="fa fa-star "></i> 
                <i class="fa fa-star"></i>
             </div>
</div>
  </div>

  <!-- #item -->


    <!-- item -->
  <div class="item text-center " data-aos="fade-up" data-aos-delay="300"  data-aos-duration="700"> 
  <div class="testimonials-box">
    <img src="{{ url('frontend/img/user1.png') }}" class="rounded-circle">
<div>شروق محمد أحمد البلوي</div>
<span class="gray"> منذ 14 يوم و 9 ساعات</span>
<div class="green-color">" دورة ممتازة شكرا لكم دورة ممتازة شكرا لكم دورة  دورة ممتازة شكرا لكم ممتازة شكرا لكم  "</div>
<div class="ratings"> 
             
              <i class="fa fa-star "></i> <i class="fa fa-star "></i>
               <i class="fa fa-star "></i>
                <i class="fa fa-star "></i> 
                <i class="fa fa-star"></i>
             </div>
</div>
  </div>

  <!-- #item -->
</div>
</div>
</div>
  </section>


@endsection
  