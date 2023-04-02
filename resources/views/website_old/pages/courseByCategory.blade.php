@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

<section class="" id="startchange"> 
<div class="container text-center sec-padd">

<!-- row -->
  <div class="row">
    <div class="col-sm-12 mb-4" >
        <h4 class="text-right bold  green-color">
         {{ @$category->name }}
        </h4>

        <p class="text-right">
        	تعلم مهارات ومعارف جديدة من منزلك الآن
        </p>
        
    </div>
  </div>


  <div class="row">
      
      
      
                   @isset($courses)
                    @foreach($courses as $course)
  	                    <div class="col-md-3">
  		                    <div class="card c-card">
                                <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                                <div class="card-body text-right">
                                    <span class="sm-tit "> {{ $course->category->name }} </span>
                                    <h5 class="card-title"> {{ $course->title }} </h5>
                                    <div>
                                        <p class="text-right"> {{ \Illuminate\Support\Str::words($course->summary, 25) }} </p>
                                    </div>
                                </div>
      <a href="{{ route('courseDetails', $course->id) }}" class="card-footer text-right">
        <small class="text-muted">
          <img class="c-img" src="{{ url('frontend/img/m-logo1.png') }}" height="45">
          جمعية رواء للايتام
        </small>
        <div class="pull-left rate">
        	4.7 <img src="{{ url('frontend/img/star.png') }}">
        </div>
      </a>
    </div>
  	</div>
  	                @endforeach
                    @endisset      
      
      
      
  	<!-- col -->
<!--  	<div class="col-md-3">-->
<!--  		<div class="card  c-card">-->
<!--      <img src="img/img31.png" class="card-img-top" alt="...">-->
<!--      <div class="card-body text-right">-->
<!--    <span class="sm-tit "> دورة دينية</span>-->
<!--    <h5 class="card-title "> دورة عن كيفية التحكم في علم النفس</h5>-->

<!--    <div >-->
       
<!--        <p class="text-right">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>-->
 
<!--</div>-->
<!--      </div>-->
<!--      <a href="" class="card-footer text-right">-->
<!--        <small class="text-muted">-->
<!--          <img class="c-img" src="img/m-logo1.png" height="45">-->
<!--          جمعية رواء للايتام-->
<!--        </small>-->
<!--        <div class="pull-left rate">-->
<!--        	4.7 <img src="img/star.png" >-->
<!--        </div>-->
<!--      </a>-->
<!--    </div>-->
<!--  	</div>-->
<!-- #col -->





  </div>
  <!-- row -->


</div>
</section>

@endsection
  