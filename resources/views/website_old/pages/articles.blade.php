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
 <img src="{{ url('frontend/img/d-icon.png') }}" height="30">
المقالات
</h4>
      
        

        
    </div>
  </div>

</section>


<!--<section>-->
<!--	<div class="container">-->
<!--	<form class="row g-3">-->
<!--       <div class="col">-->
<!--        <label for="staticEmail2" class="form-label">اسم الجمعية</label>-->
<!--        <input type="text"  class="form-control" id="staticEmail2" value="اسم الجمعية">-->
<!--  </div>-->
<!--  <div class="col">-->
<!--    <div class="mb-3">-->
<!--      <label for="disabledSelect" class="form-label">فئة الجمعية</label>-->
<!--      <select id="disabledSelect" class="form-select">-->
<!--        <option>فئة الجمعية</option>-->
<!--              <option>تحديد</option>-->
<!--              <option> select</option>-->
<!--           <option> select</option>-->

<!--      </select>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="col">-->
<!--    <div class="mb-3">-->
<!--      <label for="disabledSelect" class="form-label">مكان الجمعية</label>-->
<!--      <select id="disabledSelect" class="form-select">-->
<!--             <option>مكان الجمعية</option>-->
<!--              <option>الرياض</option>-->
<!--               <option> select</option>-->
<!--              <option>Disabled select</option>-->
<!--      </select>-->
<!--    </div>-->
<!--</div>-->
<!--   <div class="col">-->

<!--      <button type="submit" class="btn search-btn light-btn ">ابحث</button>-->
<!--   </div>-->
<!--     </form>-->
<!--   </div>-->
<!--</section>-->
<!-- #search section -->


<!-- section -->
<section class="sec-padd">
	<div class="container">
		<div class="row">

		@isset($items)
		@foreach($items as $one)
			<div class="col-md-4">
				<div class="ass-box box-shadow">
					<img src="{{ @$one->image }}" style="max-width:100%;">
					<h6 class="bold mt-2"> <a href="{{ route('postDetails', $one->id) }}"> {{ @$one->title }} </a> </h6>
					<p>
                        {{ \Illuminate\Support\Str::words($one->summary, 25) }}
					</p>

				 <p>	<i class="fa fa-map-marker  green-color"></i> الرياض - المملكة العربية السعودية
				 </p>
				</div>
			</div>
        @endforeach
        @endisset




 

		</div>
	</div>
	

</section>
<!-- #section -->


@endsection
  