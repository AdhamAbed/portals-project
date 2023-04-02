

@extends('layout.app')

@section('css')


@endsection
@section('content')
<main class="position-relative main">

    <div class="container p-0 sec" >
        <!--<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">-->
            <!--<div class="carousel-inner" style="height: 100vh;">-->
    <!--            @foreach($headerSlider as $one)-->
    <!--                <div class="carousel-item @if($loop->first) active  @endif h-100 cItem">-->
    <!--                    <div class="row h-100 d-flex justify-content-center aligh-item-center">-->
    <!--                        <div class="col-lg-6 col-12  d-flex flex-column justify-content-center aligh-item-center">-->
    
                                <!--<h4>{{ $one->title }}</h5>-->
                                <!--<p>{!!  $one->description !!}</p>-->
                                <!--<a class="mt-3" href="">{{ __('cp.Start With Us') }}</a>-->
    <!--                            <h4>Summary of years of experience</h4>-->
    <!--                            <p>With thousand of customers, we put on your hand</p>-->
    <!--                        </div>-->
                            
    <!--                        <di class="col-lg-6 col-12">-->
    <!--                            <img src="{{ $one->image }}" class="d-block w-100 h-100" alt="{{ $one->image }}" style="-->
    <!--object-fit: contain !important;">-->
    <!--                        </div>-->

                            
    <!--                    </div>-->
    <!--                </div>-->
    <!--            @endforeach-->.
    
         <div class="owl-carousel owl-theme mt-5" id="Maincarousel">

            
             @foreach($headerSlider as $one)
                    <div class="carousel-item active   h-100 cItem">
                        <div class="row h-100 d-flex flex-row-reverse justify-content-center aligh-item-center">
                            
                            <div class="col-md-6 col-12">
                                <img src="{{ $one->image }}" class="d-block w-100 h-100" alt="{{ $one->image }}" style="
    object-fit: contain !important;">
                            </div>
                            
                            <div class="col-md-6 col-12  d-flex flex-column justify-content-center aligh-item-center mainSliderTxt">
    
                                <!--<h4>{{ $one->title }}</h5>-->
                                <!--<p>{!!  $one->description !!}</p>-->
                                <!--<a class="mt-3" href="">{{ __('cp.Start With Us') }}</a>-->
                                <h4>{{ $one->title }}</h4>
                              
                            </div>
                            
                            

                            
                        </div>
                    </div>
                @endforeach
            
            
            
        </div>
    

            </div>
            <!--<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"-->
            <!--        data-bs-slide="next">-->
            <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
            <!--    <span class="visually-hidden">Next</span>-->
            <!--</button>-->

            <!--<button class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">-->
            <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
            <!--</button>-->
            
    <!--    </div>-->
    <!--</div>-->


    <!-- Training Section -->
    <div id="training-section" class="container pt-5 sec">
        <div class="Training-Container">
            <div class="Training-header">
                <!--<h5>{{ $settings->training_features_subtitle }}</h5>-->
                <h1>{{ $settings->training_features_title }}</h1>
            </div>
            <div class="row p-2 mt-4">
                @foreach($features as $feature)
                    <div class="col-lg-3 col-sm-12 mb-3" style="padding: 0px 5px;">
                        <div class="training-card-container ">
                            <div class="training-card">
                                <div class="training-logo mb-4"
                                     style="background-color: {{ $feature->color }} !important;">
                                    <h3><img src="{{url(asset('website'))}}/images/cardicon{{$loop->iteration}}.svg" ></h3>
                                </div>
                                <h1>{{ $feature->title }}</h1>
                                <p style="height: 64px;">{!!  strip_tags($feature->description) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <div id="course-cont" class="container p-0 sec">
        <div class="container pt-5 mt-5">
            <div class="Training-courses">
                <div class="Training-courses-header">
                    <!--<h5>{{ $settings->training_courses_subtitle }}</h5>-->
                    <h1>{{ $settings->training_courses_title }}</h1>
                </div>
            </div>
            <!-- <div class="Subscription-options pt-4">

                <a class="Free me-3" href="">Free</a>
                <a class="Paid" href="">Paid</a>
            </div> -->

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-free" role="tabpanel" aria-labelledby="nav-free-tab">
                    <div class="row pb-3 pt-5 justify-content-center">



                            @foreach($paid_courses->take(3) as $free_course)
                                <div class="col-lg-3 col-12">
                                    <div class="Course-Card pb-3 ">
                                        <div class="card ">
                                            <img src="{{ $free_course->image }}" class="card-img-top"
                                                 alt="{{ $free_course->image }}">
                                            <div class="card-body">
                                                <!--<span>{{ $free_course->category->name }}</span>-->
                                                <div class="course-content">
                                                    <h5 class="card-title" style="font-weight: bold !important;">{{ $free_course->title  }}</h5>
                                                    <p class="price">{{ $free_course->price_after_discount .  __('cp.dollar') }}</p>

                                                </div>
                                                <p id="course-card-text"
                                                   class="card-text" style=" line-height: 25px;">{{ \Illuminate\Support\Str::limit($free_course->summary, 100) }}</p>
                                                <a href="{{ route('view_course' , ['id' => $free_course->id]) }}"
                                                   class="register-btn">
                                                    <!--<img class="me-2" src="{{url(asset('website'))}}/images/Register.svg"-->
                                                    <!--     alt="">-->
                                                    {{ __('cp.Register now') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>

                </div>
            </div>


        </div>
    </div>
    
<!--     <div id="course-cont" class="container p-0">-->
<!--        <div class="container pt-5 mt-5">-->
<!--            <div class="Training-courses">-->
<!--                <div class="Training-courses-header">-->
<!--                    <h5>{{ $settings->training_courses_subtitle }}</h5>-->
<!--                    <h1>{{ $settings->training_courses_title }}</h1>-->
<!--                </div>-->
<!--            </div>-->
            <!-- <div class="Subscription-options pt-4">

<!--                <a class="Free me-3" href="">Free</a>-->
<!--                <a class="Paid" href="">Paid</a>-->
<!--            </div> -->
<!--            <div class="nav nav-tabs Subscription-options pt-4" id="nav-tab" role="tablist" style="border-bottom:none">-->
<!--                <a class="active Free me-2" id="nav-free-tab" data-bs-toggle="tab" data-bs-target="#nav-free"-->
<!--                   type="button" role="tab" aria-controls="nav-free" aria-selected="true">{{ __('cp.Free') }}</a>-->
<!--                <a class="Paid" id="nav-paid-tab" data-bs-toggle="tab" data-bs-target="#nav-paid" type="button"-->
<!--                   role="tab" aria-controls="nav-paid" aria-selected="false">{{ __('cp.Paid') }}</a>-->
<!--            </div>-->
<!--            <div class="tab-content" id="nav-tabContent">-->
<!--                <div class="tab-pane fade show active" id="nav-free" role="tabpanel" aria-labelledby="nav-free-tab">-->
<!--                    <div class="row pb-3 pt-5">-->

<!--                        <div class="owl-carousel owl-theme mt-5" id="carouselFreeCourses-->
<!--">-->


<!--                            @foreach($free_courses as $free_course)-->
<!--                                <div class="item">-->
<!--                                    <div class="Course-Card pb-3 ">-->
<!--                                        <div class="card ">-->
<!--                                            <img src="{{ $free_course->image }}" class="card-img-top"-->
<!--                                                 alt="{{ $free_course->image }}">-->
<!--                                            <div class="card-body">-->
<!--                                                <span>{{ $free_course->category->name }}</span>-->
<!--                                                <div class="course-content">-->
<!--                                                    <h5 class="card-title">{{ $free_course->name }}</h5>-->
<!--                                                    <p class="price">0$</p>-->

<!--                                                </div>-->
<!--                                                <p id="course-card-text"-->
<!--                                                   class="card-text">{{ \Illuminate\Support\Str::limit($free_course->summary, 150) }}</p>-->
<!--                                                <a href="{{ route('view_course' , ['id' => $free_course->id]) }}"-->
<!--                                                   class="register-btn">-->
                                                    <!--<img class="me-2" src="{{url(asset('website'))}}/images/Register.svg"-->
                                                    <!--     alt="">-->
<!--                                                    {{ __('cp.Register now') }}</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            @endforeach-->
<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="tab-pane fade" id="nav-paid" role="tabpanel" aria-labelledby="nav-paid-tab">-->
<!--                    <div class="row pb-3 pt-5">-->
<!--                        <div class="owl-carousel owl-theme mt-5" id="carouselPaidCourses-->
<!--">-->
<!--                            @foreach($paid_courses as $paid_course)-->
<!--                                <div class="item">-->
<!--                                    <div class="Course-Card pb-3 ">-->
<!--                                        <div class="card ">-->
<!--                                            <img src="{{ $paid_course->image }}" class="card-img-top"-->
<!--                                                 alt="{{ $paid_course->image }}">-->
<!--                                            <div class="card-body">-->
<!--                                                <span>{{ $paid_course->category->name }}</span>-->
<!--                                                <div class="course-content">-->
<!--                                                    <h5 class="card-title">{{ $paid_course->name }}</h5>-->
<!--                                                    @if($paid_course->discount != '' && $paid_course->price_after_discount != '')-->
<!--                                                        <p class="price">{{ $paid_course->price_after_discount ?? '0'}}$</p>-->
<!--                                                    @else-->
<!--                                                        <p class="price">{{ $paid_course->price ?? '0'}}$</p>-->
<!--                                                    @endif-->
<!--                                                </div>-->
<!--                                                <p id="course-card-text"-->
<!--                                                   class="card-text">{{ \Illuminate\Support\Str::limit($paid_course->summary, 150) }}</p>-->
<!--                                                <a href="{{ route('view_course' , ['id' => $paid_course->id]) }}"-->
<!--                                                   class="register-btn">-->
<!--                                                    <img class="me-2" src="{{url(asset('website'))}}/images/Register.svg"-->
<!--                                                         alt="">-->
<!--                                                    {{ __('cp.Register now') }}</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            @endforeach-->

<!--                        </div>-->
<!--                    </div>-->


<!--                </div>-->
<!--            </div>-->


<!--        </div>-->
<!--    </div>-->



    <!--<div id="consultants-section" class="container">-->
    <!--    <div class="consultants-container pt-5 mt-5">-->
    <!--        <div class="consultants-header">-->
    <!--            <h5>{{ $settings->training_consultants_subtitle }}</h5>-->
    <!--            <h1>{{ $settings->training_consultants_title }}</h1>-->
    <!--        </div>-->

    <!--        <div class="row pt-5 mt-5">-->
    <!--            <div class="col-lg-12 col-sm-12 pb-3">-->
    <!--                <div class="owl-carousel owl-theme">-->
    <!--                    @foreach($consultants as $consultant)-->
    <!--                        <div class="item ">-->
    <!--                            <div class="consultants-people-container">-->
    <!--                                <div class="consultants-people  ">-->
    <!--                                    <div class="const-image">-->
    <!--                                        <img src="{{ $consultant->image }}" alt="">-->
    <!--                                    </div>-->
    <!--                                    <h1>{{ $consultant->name }}</h1>-->

    <!--                                    {!! $consultant->description !!}-->

    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    @endforeach-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

<!--    <div class="container">-->
<!--        <div class="Trainees-opinions-container pt-5 mt-5">-->
<!--            <div class="Trainees-header">-->
<!--                <h5>{{ $settings->trainees_subtitle }}</h5>-->
<!--                <h1>{{ $settings->trainees_title }}</h1>-->
<!--            </div>-->

<!--            <div class="row pt-4">-->
<!--                <div class="owl-carousel owl-theme mt-5" id="carouselOpinions">-->
<!--                    @foreach($comments as $comment)-->
<!--                    <div class="item">-->
<!--                        <div class="card trainner-card ">-->
<!--                            <div class="card-body">-->
<!--                                <div class="card-content pb-4">-->
<!--                                    <p class="card-text">"</p>-->
<!--                                    <p class="card-text">-->
<!--                                        {{ $comment->comment }}-->
<!--                                    </p>-->
<!--                                    <p class="card-text float-end pb-3">"</p>-->
<!--                                </div>-->
<!--                                <div class="tainner-pic">-->
<!--                                    <img src="{{ $comment->user_id && $comment->user->image ? $comment->user->image : url(asset('website'))."/images/trainner-picture.svg"  }}" alt="">-->
<!--                                    <div class="trainner-pic-info ms-3">-->
<!--                                        <h1>{{ $comment->user_id ? $comment->user->name : $comment->user_name}}</h1>-->
<!--                                        <p>{{ $comment->user_id ? $comment->user->job_title : $comment->user_specialization}}</p>-->
<!--{{--                                        <p>{{ $comment->course->category->name }}</p>--}}-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

        <!--<div class="Trainees-opinions-container pt-5 mt-5">-->
        <!--    <div class="Trainees-header">-->
        <!--        <h5>{{ $settings->trainees_subtitle }}</h5>-->
        <!--        <h1>{{ $settings->trainees_title }}</h1>-->
        <!--    </div>-->

        <!--    <div class="row pt-4">-->
        <!--        <div class="owl-carousel owl-theme mt-5" id="carouselOpinions">-->
        <!--            @foreach($comments as $comment)-->
        <!--            <div class="item">-->

        <!--            </div>-->
        <!--            @endforeach-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

    
<div class="reviews py-5 mt-5 sec"  id="opinions-section">

        <div class="container">
            <h3>{{ $settings->trainees_title }}</h3>
            <p style="max-width: 65%;">{{ $settings->trainees_subtitle }}</p>
        </div>
        <div class="owl-carousel owl-theme mt-5" id="carouselOpinions">
                <!--@foreach($comments as $comment)-->
                <!--<div class="item">-->
                <!--    <div class="card">-->
                <!--        <div class="card-top">-->
                <!--            <img src="{{ $comment->user_id && $comment->user->image ? $comment->user->image : url(asset('website'))."/images/trainner-picture.svg"  }}" alt="">-->
                <!--            <div class="card-header-content">-->
                <!--                <h2>{{ $comment->user_id ? $comment->user->name : $comment->user_name}}</h2>-->
                <!--                <h3>{{ $comment->user_id ? $comment->user->job_title : $comment->user_specialization}}</h3>-->
                <!--            </div>-->
                        
                            
                <!--        </div>-->
                <!--        <div class="card-body p-0 mt-4">-->
    						
                <!--            <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">-->
                <!--                {{ $comment->comment }}-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            <!--@endforeach-->
            
            
            <div class="item">
                    <div class="card">
                        <div class="card-top">
                            <img src="{{ url(asset('website'))."/images/Dr.-Ihap.png"  }}" alt="">
                            <div class="card-header-content">
                                <h2>Dr. Ihab Abu-Rukbah</h2>
                                <h3>Head of AME Group for Consultations and Events Management</h3>
                            </div>
                        
                            
                        </div>
                        <div class="card-body p-0 mt-4">
    						
                            <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">
                                “We are proud and glad for the chance of working with PORTALS. We worked with them and found them very professional and disciplined. I think PORTALS are Pioneers in what they provide and their services/solutions can be considered very valuable for Businesses. All the luck, PORTALS!”
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <div class="card-top">
                            <img src="{{ url(asset('website'))."/images/Dr.-Adnan-El-Bar.jpg"  }}" alt="">
                            <div class="card-header-content">
                                <h2>Dr. Adnan El-Bar</h2>
                                <h3>Head of The Consultant Office for Business Informatics</h3>
                            </div>
                        
                            
                        </div>
                        <div class="card-body p-0 mt-4">
    						
                            <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">
                               "PORTALS are a new concept in Business Development world. They stood with us since our start and until our name became known and popular in MEDIA and for influencers. They are a complete-integrated business development establishment. I believe they are unique for their Technical and Management solutions. Way to go, PORTALS!"
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="item">
                    <div class="card">
                        <div class="card-top">
                            <img src="{{ url(asset('website'))."/images/Prof-Maher-Atari.png"  }}" alt="">
                            <div class="card-header-content">
                                <h2>Prof Maher Atari, DMD, PhD</h2>
                                <h3>CEO and Chief Scientific Officer at biointelligents</h3>
                            </div>
                        
                            
                        </div>
                        <div class="card-body p-0 mt-4">
    						
                            <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">
                               "It is a great step to work with PORTALS, they are very professional, fast, high level of service and can compete with large companies in the sector. Very proud and happy with the result of our project done by PORTALS. Best of luck and go ahead with everything."
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="item">
                    <div class="card">
                        <div class="card-top">
                            <img src="{{ url(asset('website'))."/images/Ahmed-Almodi.jpg"  }}" alt="">
                            <div class="card-header-content">
                                <h2>Mr. Ahmed Ali Al-Amoudi</h2>
                                <h3>Head of ETTIGAHAT AlTAMAYOUZ for Media Consultations & Public Relations</h3>
                            </div>
                        
                            
                        </div>
                        <div class="card-body p-0 mt-4">
    						
                            <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">
                               “PORTALS is a true value-addition to The Business Development sector. They are very intelligent when it comes to customers’ needs identification and satisfaction. PORTALS offer the best Content Creation, Management and Marketing solutions. And successfully combine Digital and Management services. I wish them all success and progress.”
                            </p>
                        </div>
                    </div>
                </div>
            
            
        </div>
        <!--<div class="owl-carousel owl-test owl-theme mt-5">-->
        <!--     @foreach($comments as $comment)-->
        <!--        <div class="item">-->
        <!--            <div class="card">-->
        <!--                <div class="card-top">-->
        <!--                <img src="{{ $comment->user_id && $comment->user->image ? $comment->user->image : url(asset('website'))."/images/trainner-picture.svg"  }}" alt="">-->
        <!--                    <div class="card-header-content">-->
        <!--                        <h2>{{ $comment->user_id ? $comment->user->name : $comment->user_name}}</h2>-->
        <!--                        <h3>{{ $comment->user_id ? $comment->user->job_title : $comment->user_specialization}}</h3>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="card-body p-0 mt-4">-->
    						
        <!--                    <p style="overflow:hidden;max-height: none;" data-more-read-text="read more" data-less-read-text="read less">-->
        <!--                        {{ $comment->comment }}-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    @endforeach-->
        <!--</div>-->
</div>  
    
    
    
    

    <!--<div id="happy-clients" class="container-fluid p-0">-->
    <!--    <div class="container pt-5 mt-5">-->
    <!--        <div class="happy-header">-->
    <!--            <h5>Join Over</h5>-->
    <!--            <h1>+{{ $settings->clients_count }} {{ __('cp.Happy Clients') }}!</h1>-->
    <!--        </div>-->

    <!--        <div class="row">-->
    <!--            <div class="col-lg-3 col-sm-12 pb-3">-->
    <!--                <div class="happy-clients-card ">-->
    <!--                    <div class="card shadow-none">-->
    <!--                        <div class="card-body">-->
    <!--                            <h5 class="card-title">{{ $settings->clients_count }}+</h5>-->
    <!--                            <p class="card-text pt-3">{{ __('cp.Happy Clients') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-3 col-sm-12 pb-3">-->
    <!--                <div class="happy-clients-card ">-->
    <!--                    <div class="card shadow-none">-->
    <!--                        <div class="card-body">-->
    <!--                            <h5 id="trusted-title" class="card-title ">{{ $settings->users_count }}+</h5>-->
    <!--                            <p class="card-text  pt-3">{{ __('cp.Trusted Users') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-3 col-sm-12 pb-3">-->
    <!--                <div class="happy-clients-card ">-->
    <!--                    <div class="card shadow-none">-->
    <!--                        <div class="card-body">-->
    <!--                            <h5 id=" projects-title" class="card-title">{{ $settings->projects_count }}+</h5>-->
    <!--                            <p class="card-text pt-3">{{ __('cp.Projects') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-3 col-sm-12 pb-3">-->
    <!--                <div class="happy-clients-card ">-->
    <!--                    <div class="card shadow-none">-->
    <!--                        <div class="card-body">-->
    <!--                            <h5 id="courses-title" class="card-title ">{{ $settings->courses_count }}+</h5>-->
    <!--                            <p class="card-text pt-3">{{ __('cp.Courses') }}</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    
    
    <div class="position-relative sec" id="happy-clients">
            <div class="container">
            
                <div class="numbers row  d-flex justify-content-center align-items-center" style="padding-top: 150px !important; padding-bottom: 140px !important;">
                    <div class="col-md-6">
                            <h3>Portals in Numbers</h3>
                            <p>Join +100 success story</p> 
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                        
                            <div class="col-6 col-sm-6 ncp">
                                <div class="num-card" style="background:#FFF9EE">
                                <img src="{{url(asset('website'))}}/images/clients.svg" alt="">
                                    <div>
                                        <h2 style="
    font-weight: 600  !important;
">+<span class="counter" data-speed="3000" style="
    font-weight: 600  !important;
">{{ $settings->clients_count }}</span></h2>
                                        <h5>{{ __('cp.Happy Clients') }}</h5>
                                    </div>
                                </div>
                            </div>
                             <div class="col-6 col-sm-6 ncp">
                                <div class="num-card" style="background:#DEE1E7">
                                <img src="{{url(asset('website'))}}/images/Group-130.svg" alt="">
                                    <div>
                                        <h2 style="
    font-weight: 600  !important;
">+<span class="counter" data-speed="3000" style="
    font-weight: 600  !important;
">{{ $settings->users_count }}</span></h2>
                                        <h5>{{ __('cp.Trusted Users') }}</h5>
                                    </div>
                                </div>
                            </div>
                             <div class="col-6 col-sm-6 ncp">
                                <div class="num-card" style="background:rgba(222, 225, 231, 0.4)">
                                <img src="{{url(asset('website'))}}/images/Projects.svg" alt="">
                                    <div>
                                        <h2 style="
    font-weight: 600  !important;
">+<span class="counter" data-speed="3000" style="
    font-weight: 600  !important;
">{{ $settings->projects_count }}</span></h2>
                                        <h5>{{ __('cp.Projects') }}</h5>
                                    </div>
                                </div>
                            </div>
                             <div class="col-6 col-sm-6 ncp">
                                <div class="num-card" style="background:rgb(221 241 242 / 40%)">
                                <img src="{{url(asset('website'))}}/images/awards.svg" alt="">
                                    <div>
                                        <h2 style="font-weight: 600  !important;">+<span class="counter" data-speed="3000" style="font-weight: 600  !important;">{{ $settings->courses_count }}</span></h2>
                                        <h5>{{ __('cp.Courses') }}</h5>
                                    </div>
                                </div>
                            </div>

                      
                        </div>
                    </div>
    
                </div>
            </div>
            <img src="{{url(asset('website'))}}/images/2-lines.svg" class="backimg" alt="">
        </div>


    <!-- Bolg Section -->
<!--    <div id="blog-section" class="container ">-->
<!--        <div class="blog-header pt-5 mt-5">-->
<!--            <h5>{{ $settings->blog_subtitle }}</h5>-->
<!--            <h1><span class="content1">{{ $settings->blog_title }}</h1>-->
<!--        </div>-->

<!--        <div class="row pt-4">-->
<!--            @foreach($blogs as $blog)-->
<!--                <div class="col-lg-4 col-sm-12 pb-4 ">-->
<!--                    <div class="Blog-Card ">-->
<!--                        <div class="card ">-->
<!--                            <a href="{{ route('show_blog' , $blog->id) }}">-->
<!--                            <img src="{{ $blog->image }}" class="card-img-top" alt="{{ $blog->image }}">-->
<!--                            <div class="blog-card-body">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="blog-content">-->
<!--                                        <h5 class="card-title">{{ $blog->date }}</h5>-->
<!--                                        <p id="card-text"-->
<!--                                           class="card-text">{{ $blog->title }}</p>-->
<!--{{--                                   <p id="card-text"--}}-->
<!--{{--                                           class="card-text">{{ \Illuminate\Support\Str::limit($blog->subdescription, 150) }}</p>--}}-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            @endforeach-->

<!--        </div>-->
<!--        <div class="see-more-articals pt-3">-->
<!--            <div class="See-more-link">-->
<!--                <a href="{{ route('blog') }}">{{ __('cp.See more articles') }}</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


    <!-- common questions Section -->
    <!--<div class="container">-->
    <!--    <div class="questions pt-5 mt-5">-->
    <!--        <div class="questions-header">-->
    <!--            <h5>{{ $settings->faqs_subtitle }}</h5>-->
    <!--            <h1>{{ $settings->faqs_title }}</h1>-->
    <!--        </div>-->
    <!--        <div class="accordion " id="accordionExample">-->
    <!--            @foreach($faqs as $faq)-->
    <!--                <div class="questions-accordion mb-3">-->
    <!--                    <div class="accordion-item">-->
    <!--                        <h2 class="accordion-header" id="heading{{$faq->id}}">-->
    <!--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
    <!--                                    data-bs-target="#collapse{{$faq->id}}" aria-expanded="false"-->
    <!--                                    aria-controls="collapse{{$faq->id}}">-->
    <!--                                L{{ $faq->question }}-->
    <!--                            </button>-->
    <!--                        </h2>-->
    <!--                        <div id="collapse{{$faq->id}}" class="accordion-collapse collapse"-->
    <!--                             aria-labelledby="heading{{$faq->id}}"-->
    <!--                             data-bs-parent="#accordionExample">-->
    <!--                            <div class="accordion-body">-->
    <!--                                <p>-->
    <!--                                    {!! $faq->answer !!}-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            @endforeach-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->

    <div class="container-fluid py-5  p-0 sec">

            <div class="container d-flex justify-content-center align-items-center h-100">
                <div class="contact-section shadow ">
                    <div class="row">
                        <div class="col-lg-12 pt-5 pb-5  d-flex flex-column justify-content-center align-items-center">
                            <div class="contact-container w-75 row">
                                <div class="col-md-5 col-12">
                                    <img src="{{url(asset('website'))}}/images/Contact-us-icon.svg" alt="" class="w-100">
                                </div>
                                <div class="contact-content col-md-7 col-12">
                                    <p>Connect with us</p>
                                    <h1 style="font-weight: bold !important;font-size: 18px;">Keep in touch with us and register your email to receive all new information about our training</h1>
                                </div>
                            </div>

                            <form class="input-field field mt-5 w-75" >
                                <!-- <div class="field"> -->
                                <input type="text" placeholder="Email Address">
                                <div class="subscribe-btn">
                                    <a href="">Subscribe</a>
                                </div>
                                <!-- </div> -->

                            </form>
                            <div class="under-subscribe">
                                <p>Your email is safe with us, we dont spam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <a class="whatsApp-link" href="https://wa.link/wjdvev">
        <img src="{{url(asset('website'))}}/images/whats-app-icon.svg" alt="">
    </a>
    </main>

@endsection

@section('script')

    <script>
            $(function() {
          
          var link = $('.navbar a.nav-link');
          
          // Move to specific section when click on menu link
        //   link.on('click', function(e) {
        //     var target = $($(this).attr('href'));
        //     $('html, body').animate({
        //       scrollTop: target.offset().top
        //     }, 600);
        //     $(this).addClass('active');
        //     e.preventDefault();
        //   });
          
          // Run the scrNav when scroll
          $(window).on('scroll', function(){
            scrNav();
          });
          
          // scrNav function 
          // Change active dot according to the active section in the window
          function scrNav() {
              console.log('sss');
            var sTop = $(window).scrollTop();
            $('.sec').each(function() {
                
              var id = $(this).attr('id'),
                  offset = $(this).offset().top-200,
                  height = $(this).height();
                  console.log(id);
                  console.log(offset);
                  console.log(height);
              if(sTop >= offset && sTop < offset + height) {
                link.removeClass('active');
                $('.navbar').find('[data-scroll="' + id + '"]').addClass('active');
              }
            });
          }
          scrNav();
        });
    </script>
    <script>
        function checkOffset() {
          var a=$(document).scrollTop()+window.innerHeight;
          var b=$('footer').offset().top;
          if (a<b) {
            $('.whatsApp-link').css('bottom', '35px');
          } else {
            $('.whatsApp-link').css('bottom', (35+(a-b))+'px');
          }
        }
        $(document).ready(checkOffset);
        $(document).scroll(checkOffset);
    </script>
    <script>
        
        $('#carouselFreeCourses').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            rtl:true,
            dots:false,
            center:true,
            control:false,
            navText : ["<i class='fa-solid fa-arrow-right'></i>","<i class='fa-solid fa-arrow-left'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                992:{
                    items:4
                }
            }
        })
        $('#carouselPaidCourses').owlCarousel({
            loop:true,
            margin:10,
            // nav:true,
            rtl:true,
            dots:false,
            center:true,
            control:false,
            navText : ["<i class='fa-solid fa-arrow-right'></i>","<i class='fa-solid fa-arrow-left'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                992:{
                    items:4
                }
            }
        })
        $('#carouselOpinions').owlCarousel({
            loop:true,
            margin:10,
            // nav:true,
            rtl:true,
            dots:false,
            center:true,
            control:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                992:{
                    items:3
                }
            }
        })
        
         $('#Maincarousel').owlCarousel({
            loop:true,
            margin:10,
     
            rtl:false,
            dots:true,
            center:true,
            control:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            nav:false,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                992:{
                    items:1
                }
            }
        })
    </script>



@endsection

