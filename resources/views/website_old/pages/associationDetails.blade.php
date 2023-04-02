@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

<!-- page content -->
<section class="container" id="startchange"> 


<!-- row -->
<div class="row sec-padd">
    <div class="col-sm-12 mb-3">

        <h4 class="text-right  green-color bold ">
           <img src="{{ url('frontend/img/d-icon.png') }}" height="30">
        	{{ __('website.associations') }} 
        </h4>
    </div>
    <!-- row -->

    <!-- row -->
    <div class="row">
    	<!-- col -->
    	<div class="col-md-12">
        <div class="tit mb-60 right-tit mt-5">
            {{ @$item->title }}
        </div>
    </div>
    <!-- #col -->

     <!-- col -->
    <div class="col-md-5">
    	<img src="{{ @$item->image }}" height="80">
    	<table class="table table-borderless ">
          <tbody>
             <tr class="text-right">
               <td><i class="fa fa-map-marker green-color ml-5"></i> <span class="gray"> {{ @$item->country->name }} - {{ @$item->city->name }} </span></td>
               <td><i class="fa fa-phone green-color ml-5"></i><a href="tel:{{ @$item->mobile }}" class="gray"> {{ @$item->mobile }} </a></td>
             </tr>
             <tr class="text-right">
               <td><i class="fa fa-globe green-color ml-5"></i> <a href="{{ @$item->url }}" class="gray"> {{ @$item->url }} </a>
</td>
               <td><i class="fa fa-envelope green-color ml-5"></i> <a href="mailto:{{ @$item->email }}" class="gray"> {{ @$item->email }}
 </td>
             </tr>
  
            </tbody>
          </table>
    	
    </div>
    <!-- #col -->
    <div class="col-md-7">
    	<h5 class="bold "> {{ @$item->name }} </h5>
    	<p class="l-32">
            {!! @$item->details !!}
    	</p>
    </div>
    <!-- #col -->

    </div>
    <!-- #row -->


    <!-- row -->
    <div class="mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">فعاليات الجمعية</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">أنشطة الجمعية</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">مبادرات الجمعية</button>
  </li>
</ul>
<div class="tab-content mb-3" id="myTabContent">

	<!-- tab content 1 -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	<!-- row -->
  	<div class="row dir-box">
  	    
  	    
  		@isset($events)
  		@foreach($events as $one)
  		    <div class="col-md-3">
  			    <div class="card h-100">
                    <img src="{{ $one->image }}" class="card-img-top" alt="{{ @$one->title }}">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 card-date">
                            <h5 class=""> {{ @$one->created_at->format('d M Y') }} </h5>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-right">
                                <a href="{{ route('eventDetails', $one->id) }}">
                                    {{ @$one->title }} 
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('eventDetails', $one->id) }}" class="card-footer text-right">
                    <small class="text-muted">
                        <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
                        فعالية  
                    </small>
                </a>
            </div>
  		</div>
  		@endforeach
  		@endisset



  	</div>
  	<!-- row -->
  </div>
  <!-- #tab content 1 -->

  <!-- tab content 2 -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  		<!-- row -->
  	<div class="row dir-box">
  		<!-- col -->
  		<div class="col-md-3">
  			<!-- box -->
  			<div class="card h-100">
      <img src="{{ url('frontend/img/f1.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date">
       <h5 class="">25
فبراير
2022</h5>
    </div>
    <div class="flex-grow-1 ms-3">
        
       <p class="text-right">  عنوان الفعالية الافتراضي يوضع هنا , عنوان الفعالية ي يوضع هنا</p>
    </div>
</div>
      </div>
      <a href="" class="card-footer text-right">
        <small class="text-muted">
          <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
          فعالية  
        </small>
      </a>
    </div>
  			<!-- #box -->
  		</div>
  		<!-- #col -->

  		<!-- col -->
  		<div class="col-md-3">
  			<!-- box -->
  			<div class="card h-100">
      <img src="{{ url('frontend/img/f1.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date">
       <h5 class="">25
فبراير
2022</h5>
    </div>
    <div class="flex-grow-1 ms-3">
        
       <p class="text-right">  عنوان الفعالية الافتراضي يوضع هنا , عنوان الفعالية ي يوضع هنا</p>
    </div>
</div>
      </div>
      <a href="" class="card-footer text-right">
        <small class="text-muted">
          <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
          فعالية  
        </small>
      </a>
    </div>
  			<!-- #box -->
  		</div>
  		<!-- #col -->

  		<!-- col -->
  		<div class="col-md-3">
  			<!-- box -->
  			<div class="card h-100">
      <img src="{{ url('frontend/img/img2.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date">
       <h5 class="">25
فبراير
2022</h5>
    </div>
    <div class="flex-grow-1 ms-3">
        
       <p class="text-right">  عنوان الفعالية الافتراضي يوضع هنا , عنوان الفعالية ي يوضع هنا</p>
    </div>
</div>
      </div>
      <a href="" class="card-footer text-right">
        <small class="text-muted">
          <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
          فعالية  
        </small>
      </a>
    </div>
  			<!-- #box -->
  		</div>
  		<!-- #col -->


  		<!-- col -->
  		<div class="col-md-3">
  			<!-- box -->
  			<div class="card h-100">
      <img src="{{ url('frontend/img/img3.png') }}" class="card-img-top" alt="...">
      <div class="card-body">
        <div class="d-flex">
    <div class="flex-shrink-0 card-date">
       <h5 class="">25
فبراير
2022</h5>
    </div>
    <div class="flex-grow-1 ms-3">
        
       <p class="text-right">  عنوان الفعالية الافتراضي يوضع هنا , عنوان الفعالية ي يوضع هنا</p>
    </div>
</div>
      </div>
      <a href="" class="card-footer text-right">
        <small class="text-muted">
          <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
          فعالية  
        </small>
      </a>
    </div>
  			<!-- #box -->
  		</div>
  		<!-- #col -->
  	</div>
  	<!-- row -->
  </div>
  <!-- tab content2 -->


  <!-- tab content 3 -->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  		<!-- row -->
  	<div class="row dir-box">
  		
  		
  		@isset($initiatives)
  		@foreach($initiatives as $one)
  		<div class="col-md-3">
  			    <div class="card h-100">
                    <img src="{{ $one->image }}" class="card-img-top" alt="{{ @$one->title }}">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 card-date">
                            <h5 class=""> {{ @$one->created_at->format('d M Y') }} </h5>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-right">
                                <a href="{{ route('initiativeDetails', $one->id) }}">
                                    {{ @$one->title }} 
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('initiativeDetails', $one->id) }}" class="card-footer text-right">
                    <small class="text-muted">
                        <img src="{{ url('frontend/img/f-icon1.png') }}" height="25">
                        فعالية  
                    </small>
                </a>
            </div>
  		</div>
  		@endforeach
  		@endisset

  
  	</div>
  	<!-- row -->
  </div>
  <!-- tab content 3 -->
</div>
</div>
    <!-- #row -->


  </div>
</section>
<!-- #page content -->

@endsection
  