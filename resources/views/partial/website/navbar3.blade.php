<nav class="navbar  navbar-expand-xl navbar-light">
        <div class="container">
                    <a class="navbar-brand h-100" href="{{ route('home') }}"><img src="{{url(asset('website'))}}/images/Portals Logo Dark.png" alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menues" id="navbarNav">
                <ul class="navbar-nav  mb-0 ">
                <li class="nav-item">
                    <a class="nav-link  " aria-current="page" data-scroll="training-section" href="#training-section">Training Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" data-scroll="course-cont" href="#course-cont">Training Courses</a>
                </li>

                <!--<li class="nav-item">-->
                <!--    <a class="nav-link " aria-current="page" href="#consultants-section">Our Consultants</a>-->
                <!--</li>-->

                <li class="nav-item">
                    <a class="nav-link  " aria-current="page" data-scroll="opinions-section" href="#opinions-section">Testimonials</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " aria-current="page" data-scroll="happy-clients" href="#happy-clients">Happy Clients</a>
                </li>
            </ul>
            <di>
             <!-- {{--  @if(Auth::check())--}}-->

             <!--       {{--                    <a class="btn btn-login" href="{{ route('user.logout') }}">--}}-->
             <!--       {{--                        {{ __('cp.logout') }}--}}-->
             <!--       {{--                    </a>--}}-->
             <!--       <ul class="nav nav-tabs border-0">-->
             <!--           <li class="nav-item dropdown">-->
             <!--               <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"-->
             <!--                  aria-expanded="false">-->
             <!--               {{--      <img src="{{ url('uploads/users/'.auth()->user()->image) ?? url(asset('website')).'/img/about-user.png' }}" class="img-circle nav-user-image" style="width:39px; height:39px; object-fit:cover; border-radius:100%"> --}} -->
             <!--               </a>-->
             <!--               <ul class="dropdown-menu" style="border-radius: 15px;">-->
             <!--                   <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>-->
             <!--                   {{--        {{ __('cp.profile') }}--}}-->
             <!--                       </a>-->
             <!--                   </li>-->
             <!--                   <li><a class="dropdown-item" href="{{ route('user.change_password') }}"><i class="fa fa-lock"></i>-->
             <!--                       {{--    {{ __('cp.Change Password') }}--}}-->
             <!--                       </a>-->
             <!--                   </li>-->
             <!--                   <li><a class="dropdown-item" href="{{ route('my_courses') }}"><i class="fa fa-laptop"></i>-->
             <!--                         {{--  {{ __('cp.My courses') }}--}}-->
             <!--                       </a>-->
             <!--                   </li>-->
             <!--                   <li><a class="dropdown-item" href="{{ route('user.logout') }}">-->
             <!--                           <i class="fa fa-arrow-circle-left"></i>-->
             <!--                       {{--    {{ __('cp.logout') }}--}}-->
             <!--                       </a>-->
             <!--                   </li>-->
             <!--               </ul>-->
             <!--           </li>-->
             <!--       </ul>-->
             <!--{{--   @else--}}-->
             <!--       <a class="btn me-2" type="" href="{{ route('user.login.form') }}">Sign IN</a>-->
             <!--       <a class="btn" type="" href="{{ route('user.register.form') }}">Sign up</a>-->
             <!--{{--   @endif--}}-->
            </di>
               
            </div>
            

        </div>

    </nav>