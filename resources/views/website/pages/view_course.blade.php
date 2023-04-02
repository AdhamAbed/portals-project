<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
//dd(mb_convert_encoding($course->title,'HTML-ENTITIES','UTF-8'));
//dd(iconv('UTF-8', 'WINDOWS-1256', $course->title));
//dd(mb_convert_encoding($course->title, "windows-1256"));
//dd(iconv($course->title, "CP1256"));
//dd(iconv('UTF-8','WINDOWS-1256',  'ÏæÑÉ ãåÇÑÇÊ ÇáÊÝæíÖ æÇáÊæÌíå'));
//dd(mb_convert_encoding($course->title, 'CP1256'));
?>

@extends('layout.app')

@section('css')

   <!-- Bootstrap CSS -->
	<link href="assets/vendor/bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet" />
	<!-- Icon -->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"-->
	<!--	integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="-->
	<!--	crossorigin="anonymous" referrerpolicy="no-referrer" />-->
	<!--load all styles for font aswesome -->
    <link rel="stylesheet" href="{{ url('frontend/css/style-course.css') }}" >
   <style>
    /*    .course-page .course-data span{*/
    /*        font: normal normal normal 14px/1 FontAwesome !important;*/
    /*    }*/
    </style>


@endsection
@section('content')


    <main style="margin-top: 120px" class="course-page">
        <section class="marketing py-5">
		<div class="container">
			<h4 class="course-price-title">{{ $course->title }}</h4>
					<p> {{ $course->summary }}</p>
					<?php
                $course_rate = \App\Models\CourseComments::where('course_id', $course->id)->get()
                ?>
			<div class="row">
				<div class="col-md-8">
				    
				    @if($course->file_type == 'image' && $course->file_type != 'file')
				        <img class="mb-5" src="{{ $course->file }}" alt="" width="100%">
                       
                    @elseif($course->file_type == 'file' && $course->file_type != 'image')
                        <video class="mb-3" width="100%" style="border-radius: 15px;" controls>
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                            <source src="{{ $course->file }}" type="video/mp4">
                            <source src="mov_bbb.ogg" type="video/ogg">
                            Your browser does not support HTML video.
                        </video>
                    @else
                        <img class="mb-5" src="{{ $course->image }}" alt="" width="100%">
                    @endif
					
					<!--<h4 class="my-3 course-price-title">{{ __('cp.Overview') }}</h4>-->
					<!--<p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem-->
					<!--	Ipsum has been-->
					<!--	the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley-->
					<!--	of type and scrambled it to make a type specimen book. It has survived not only five centuries,-->
					<!--	but also the leap into electronic typesetting, remaining essentially unchanged. It was-->
					<!--	popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,-->
					<!--	and more recently with desktop publishing software like Aldus PageMaker including versions of-->
					<!--	Lorem Ipsum.</p>-->
					<h4 class="my-3 course-price-title">{{ __('cp.Description') }}</h4>
					<p class="my-3">  {!! $course->details !!}</p>
				</div>
				<div class="col-md-4">
					<div class="bg-white course-price sticky-top">
						<div class="row">
							<div class="col md-6 text-start">
								<h5 class="course-price-title">Course price</h5>
								<h5 class="my-4 discount" style="text-decoration-line:line-through">Discount Coupon</h5>						
							</div>
							<div class="col md-6 text-end">
								<h5 class="course-price-title">${{ $course->price_after_discount }}<span class="sar"><del>${{ $course->price }}</del></span> </h5>
								<h5 class="my-4 discount">{{ $course->discount }}%</h5> 
							</div>						
						</div>
						<span class="line"></span>
						<!--<button class="mt-4" type="submit"-->
						<!--@if($course->price == '' || $course->price == 0) disabled @endif > {{ __('cp.Add to cart') }}</button>-->
						
						@if($course->price == '' || $course->price == 0)
						
                        @else
                           <a class="mt-4 buy-btn" href="{{ route('course_checkout', $course->id) }}"> Buy Now</a>
                        @endif
						<h6 class="my-4">30-Day Money-Back Guarantee</h6>
						
						 @if(count($course->course_statistics) > 0)
						<label>This course includes:</label>
						<ul class="my-3">
						    @foreach($course->course_statistics as $statistic)
							    <li class="my-2">{{ $statistic->count }} {{ $statistic->title }}</li>
                            @endforeach
						</ul>
						 @endif
						<label class="my-3 course-price-title">Apply Coupon:</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Enter Coupon" aria-label="Recipient's username" aria-describedby="button-addon2">
							<a class="btn btn-outline-secondary" type="button" id="button-addon2">Apply</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
        
        @if(count($coursesChoose) > 0)
            <section class="last-courses py-5">
		<div class="container">
			<h4 class="pb-5 course-price-title">{{ __('cp.Students also bought') }}</h4>
			<div class="row">
    		    @foreach($coursesChoose as $one_course)
    			    <div class="col-md-4 my-2">
    				<div class="card p-3">
    					<img src="{{ $one_course->image }}" class="card-img-top" alt="...">
    					<div class="my-2">
    					
    						<h5 class="card-title course-price-title">{{ $one_course->title }}</h5>
    						
    						<p class="card-text" id="onest" style="color: #42526B;">{{ \Illuminate\Support\Str::limit($one_course->summary, 150) }}</p>
    						<div class="d-flex">
    							<button class="me-2" type="submit">{{ __('cp.Register now') }} <span class="ms-2"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.16479 8.5365H13.7507" stroke="#00C4D1" stroke-width="0.962351" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9.42017 4.20593L13.7507 8.53651L9.42017 12.8671" stroke="#00C4D1" stroke-width="0.962351" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</span></button>
    						<span class="lang1"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.46235 14.7556C5.99384 14.7556 6.4247 14.3248 6.4247 13.7933C6.4247 13.2618 5.99384 12.8309 5.46235 12.8309C4.93086 12.8309 4.5 13.2618 4.5 13.7933C4.5 14.3248 4.93086 14.7556 5.46235 14.7556Z" fill="#061C3D"/>
<path d="M11.7177 14.7556C12.2492 14.7556 12.6801 14.3248 12.6801 13.7933C12.6801 13.2618 12.2492 12.8309 11.7177 12.8309C11.1862 12.8309 10.7554 13.2618 10.7554 13.7933C10.7554 14.3248 11.1862 14.7556 11.7177 14.7556Z" fill="#061C3D"/>
<path d="M3.19402 5.13207H13.9861L12.3983 10.6894C12.3408 10.8905 12.2194 11.0674 12.0525 11.1933C11.8855 11.3192 11.6821 11.3874 11.473 11.3874H5.70714C5.49801 11.3874 5.29457 11.3192 5.12762 11.1933C4.96066 11.0674 4.83927 10.8905 4.78182 10.6894L2.60633 3.07518C2.57761 2.97464 2.51691 2.88619 2.43343 2.82323C2.34995 2.76026 2.24824 2.7262 2.14367 2.7262H1.13184" stroke="#061C3D" stroke-width="0.962351" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</span>
    						@if($course->discount != '' && $course->price_after_discount != '')
    						  <p class="" id="doalr">${{ $course->price_after_discount ?? '0'}}</p>
    						@else
    					
    						    <p class="" id="doalr">${{ $course->price_after_discount ?? '0'}}</p>
    						@endif
    						
    						</div>
    					</div>
    				</div>
    			</div> 
    	        @endforeach
			</div>
		</div>
	</section>
         @endif
        
    

  
    </main>

@endsection

@section('script')

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

@endsection



