<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link href='{{ url('frontend/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ url('frontend/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ url('frontend/css/custom.css') }}" rel="stylesheet">
    <meta name="description" content="{{ @$settings->description }}">
    <title> {{ @$settings->title }} </title>
</head>


<body class="inner-page">

  <nav class="navbar navbar-light navbar-expand-lg custom-nav navbar-default  fixed-top " style="display:none">
  <div class="container">
    <a class="navbar-brand " href="#"><img src="{{ @$settings->colorful_logo }}" height="60"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav float-left mr-auto  d-flex d-flex" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('homePage') }}">الرئيسية</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            من نحن
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">من نحن</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>


         <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('associations') }}" aria-current="page">
           {{ __('cp.AssociationGuide') }} 
          </a>

        </li>
        

       <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('donors') }}" aria-current="page">
           {{ __('cp.DonorGuide') }}  
          </a>
          <!--<ul class="dropdown-menu" aria-labelledby="navbarDropdown2">-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--  <li><hr class="dropdown-divider"></li>-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--</ul>-->
        </li>



        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('ambassadors') }}" href="{{ route('donors') }}">
           {{ __('cp.OrphansAmbassadors') }}   
          </a>
          <!--<ul class="dropdown-menu" aria-labelledby="navbarDropdown2">-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--  <li><hr class="dropdown-divider"></li>-->
          <!--  <li><a class="dropdown-item" href="#">رابط</a></li>-->
          <!--</ul>-->
        </li>
        
        
        
        <li class="nav-item">
            
            @if(Auth::check())
                <a class="nav-link btn-menu" href="{{ route('userProfile') }}" tabindex="-1" aria-disabled="true"> {{ Auth::user()->name }} </a>
                @else
                    <a class="nav-link btn-menu" href="{{ route('usersPortal') }}" tabindex="-1" aria-disabled="true"> {{ __('cp.login') }} </a>
            @endif
            
          
        </li>
      </ul>
     
    </div>
  </div>
</nav>

<!-- bottom header -->
<div class="header2">
  
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 ">
      <a href="{{ route('homePage') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="{{ @$settings->colorful_logo }}" height="60">
      </a>

      <div class="nav col-12 col-md-6 mb-2 justify-content-center mb-md-0 filter-dropdown filter">
         <div class="input-group">
    <div class="input-group-text" id="btnGroupAddon">
      <div class="dropdown">
  <div class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ url('frontend/img/menu-icon.png') }}">
   فلتلر 
  </div>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">دورات متزامنة</a></li>
    <li><a class="dropdown-item" href="#">دورات  غير متزامنة</a></li>
    <li><a class="dropdown-item" href="#">مشاهده الاكثر اعجباا</a></li>
        <li><a class="dropdown-item" href="#">مشاهده الاحدث</a></li>
  </ul>
</div>
    </div>
    <input type="text" class="form-control" placeholder="بحث" aria-label="Input group example" aria-describedby="btnGroupAddon">
  </div>
      </div>

      <div class="col-md-3 text-end">
        
            @if(Auth::check())
                <a class="btn main-btn me-2" href="{{ route('userProfile') }}" tabindex="-1" aria-disabled="true"> {{ Auth::user()->name }} </a>
                @else
                    <a class="btn main-btn me-2" href="{{ route('usersPortal') }}" tabindex="-1" aria-disabled="true"> {{ __('cp.login') }} </a>
            @endif
        
      </div>
    </header>
  </div>




  <div class="b-menue" style="/* box-shadow: 4px 3px #ccc; */ /* background: #FAF9F8; */ ">




<div class="container">



    @if(Route::currentRouteName() == 'allCourses' || Route::currentRouteName() == 'courseDetails' || Route::currentRouteName() == 'courseByCategory')
    <header class="d-flex flex-wrap align-items-center justify-content-center  py-3 mb-4 ">

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

        @isset($courses_categories)
        @foreach($courses_categories as $one)
            <li><a href="{{ route('courseByCategory', $one->id) }}" class="nav-link px-4 link-secondary"> {{ @$one->name }} </a></li>
        @endforeach
        @endisset
        
      </ul>
   
    </header>
    @endif


</div>
  </div>










 
</div>
<!-- #bottom header -->


<!-- page content -->

<!-- #page content -->




@include('layout.errors')


@yield('content')





<footer>
  <div class="container text-right sec-padd">
      <a href="{{ route('homePage') }}">
      <img src="{{ $settings->white_logo }}" height="70">
      </a>
         <div class="row">
           <div class="col-sm-5">
           
             <h3>عن المنصه</h3>
             <p>
                {{ @$settings->description }}
             </p>
           </div>
           <div class="col-sm-1">
             
           </div>

           <div class="col-sm-2">
              <h3 class="text-left">عن المنصه</h3>
              <ul class = "list-unstyled">
                <li><a href="{{ route('posts') }}"> {{ __('website.posts') }} </a></li>
                <li><a href="{{ route('articles') }}"> {{ __('website.articles') }} </a></li>
                <li><a href="{{ route('associations') }}"> {{ __('website.associations') }} </a></li>
                <li><a href="{{ route('donors') }}"> {{ __('website.donors') }} </a></li>
                <li><a href="{{ route('allCourses') }}"> {{ __('cp.training_courses') }}  </a></li>
                
             </ul>
           </div>
            <div class="col-sm-2">
              <h3 class="text-left">عن المنصه</h3>
              <ul class = "list-unstyled">
                <li><a href="{{ route('research_studies') }}"> {{ __('website.research_studies') }} </a></li>
                <li><a href="{{ route('ambassadors') }}"> {{ __('website.ambassadors') }} </a></li>
                <li><a href="{{ route('events') }}"> {{ __('website.events') }} </a></li>
                <li><a href="{{ route('initiatives') }}"> {{ __('website.initiatives') }} </a></li>
              </ul>
            </div>

     <div class="col-sm-2">
             <h3 class="text-left"> صفحات </h3>
              <ul class = "list-unstyled">
                <li><a href="{{ route('pageDetails', 1) }}"> من نحن </a></li>
                 <li><a href="{{ route('pageDetails', 2) }}"> سياسة الخصوصية </a></li>
                <li><a href="{{ route('pageDetails', 3) }}"> الشروط والاحكام </a></li>
              </ul>
           </div>

         </div>


        <div class="row mt-5">
          <div class="col-sm-6 mt-3" >
  
  
                <ul class="list-inline ">

            @isset($settings->facebook)
                <li class="list-inline-item"><a href="{{ $settings->facebook }}"><i class="fa fa-facebook"></i></a></li>
            @endisset
            
            
            @isset($settings->instagram)
                <li class="list-inline-item"><a href="{{ $settings->instagram }}"><i class="fa fa-instagram"></i></a></li>
            @endisset
            
            
            @isset($settings->twitter)
                <li class="list-inline-item"><a href="{{ $settings->twitter }}"><i class="fa fa fa-twitter"></i></a></li>
            @endisset
            
            
            @isset($settings->info_email)
                <li class="des"> {{ @$settings->info_email }} </li>
                <li class="list-inline-item"><a href="mailto:{{ @$settings->info_email }}"><i class="fa fa-envelope "></i></a></li>
            @endisset
            
            
             </ul>

  
            
          </div>
          <div class="col-sm-6  mt-3">
            <p class="text-left">{{ __('cp.All_rights_reserved') }} © 2022 </p>
          </div>
        </div>
  </div>


</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="{{ url('frontend/fullcalendar/packages/core/main.js') }}"></script>
    <script src="{{ url('frontend/fullcalendar/packages/interaction/main.js') }}"></script>
    <script src="{{ url('frontend/fullcalendar/packages/daygrid/main.js') }}"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
     <!-- owl slider -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

     <script src="{{ url('frontend/js/custom.js') }}"></script>
</body>
</html>