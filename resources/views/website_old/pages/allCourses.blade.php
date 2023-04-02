@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


    <section class="" id="startchange"> 
        <div class="container text-center sec-padd ">

            @isset($courses_categories)
            @foreach($courses_categories as $one)
        
                <div class="row">
                    <div class="col-sm-12 mb-3 ">
                        <h4 class="text-right bold"> {{ @$one->name }} </h4>
                        <div class="pull-left">
        	                <a href=""> {{ __('website.load_more') }} </a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    
                    @isset($one->courses)
                    @foreach($one->courses as $course)
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
                
                </div>
  
            @endforeach
            @endisset


        </div>
    </section>


@endsection
  