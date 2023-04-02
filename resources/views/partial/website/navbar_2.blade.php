<header>

    <nav class="navbar  navbar-expand-lg navbar-light">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{url(asset('website'))}}/images/Portals Logo light.png" class="logo" alt="">
            </a>
            
            
            <div class="cart-tog-warper">
                <div class="cart cart-second me-4">
                <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <g clip-path="url(#clip0_1066_3664)">
                        <path d="M19.2501 19.1424C20.4743 19.1424 21.4709 18.1674 21.4818 16.9649C21.4818 16.3583 21.2326 15.7733 20.7884 15.3399L20.1926 14.7549C19.6293 14.2024 19.3151 13.4657 19.3151 12.6857V9.74992C19.3151 8.86158 19.1743 7.97326 18.8168 7.14992C17.7551 4.70159 15.3501 3.22824 12.8043 3.23907C9.21844 3.23907 6.3151 6.08823 6.3151 9.59823V12.6749C6.3151 13.4549 6.00094 14.1916 5.43761 14.7441L4.84177 15.3291C4.3976 15.7624 4.14844 16.3474 4.14844 16.9541C4.14844 18.1566 5.1451 19.1316 6.3801 19.1316H19.2609L19.2501 19.1424Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.1152 22.75H14.5061" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        
                    </svg>
                </a>

                <ul class="dropdown-menu notif-menue2" style="border-radius: 15px;">

                    @if(count($notifications) > 0)
                        @foreach($notifications as $notification)
                            <a href="{{ $notification->data['action_url'] }}"
                               data-href="{{ $notification->data['action_url'] }}"
                               data-notif-id="{{$notification->id}}">
                                <li class="dropdown-item" >
                                    <i class="fa fa-user"></i>
                                    {{ $notification->data['title'] }}
                                </li>
                            </a>
                        @endforeach
                    @else
                        <li class="dropdown-item" >
                            {{ __('cp.No new notifications') }}
                        </li>
                    @endif

                </ul>

                <div class="item-number">
                    <p class="m-0" id="cart_count">{{ count($notifications) }}</p>
                </div>

            </div>
            <div class="cart cart-second me-4">
                <a href="{{ route('cart') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M8.85416 14.8438C8.85416 16.8438 10.5 18.4896 12.5 18.4896C14.5 18.4896 16.1458 16.8438 16.1458 14.8438" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.17708 2.08325L5.40625 5.8645" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8229 2.08325L19.5937 5.8645" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.08334 8.17708C2.08334 6.25 3.11459 6.09375 4.39584 6.09375H20.6042C21.8854 6.09375 22.9167 6.25 22.9167 8.17708C22.9167 10.4167 21.8854 10.2604 20.6042 10.2604H4.39584C3.11459 10.2604 2.08334 10.4167 2.08334 8.17708Z" stroke="black" stroke-width="1.5"/>
                        <path d="M3.64584 10.4167L5.11459 19.4167C5.44793 21.4376 6.25001 22.9167 9.22918 22.9167H15.5104C18.75 22.9167 19.2292 21.5001 19.6042 19.5417L21.3542 10.4167" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                </a>
                @if(session('cart') != '')
                    <div class="item-number">
                        <p class="m-0" id="cart_count">{{ count(session('cart')) }}</p>
                    </div>
                @else
                    <div class="item-number">
                        <p class="m-0" id="cart_count">0</p>
                    </div>
                @endif
            </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        
        

            <div class="collapse navbar-collapse menues" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center" style="margin-left: 0px !important;
                    ">
                    @foreach($course_categories as $course_category)
                        <li class="nav-item">
                            <a href="{{ route('categoryCourses',$course_category->id) }}">{{ $course_category->name }}</a>
                        </li>
                    @endforeach


                </ul>

                <div>
                <div class="cart cart-first me-4">
                    <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"
                       aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <g clip-path="url(#clip0_1066_3664)">
                        <path d="M19.2501 19.1424C20.4743 19.1424 21.4709 18.1674 21.4818 16.9649C21.4818 16.3583 21.2326 15.7733 20.7884 15.3399L20.1926 14.7549C19.6293 14.2024 19.3151 13.4657 19.3151 12.6857V9.74992C19.3151 8.86158 19.1743 7.97326 18.8168 7.14992C17.7551 4.70159 15.3501 3.22824 12.8043 3.23907C9.21844 3.23907 6.3151 6.08823 6.3151 9.59823V12.6749C6.3151 13.4549 6.00094 14.1916 5.43761 14.7441L4.84177 15.3291C4.3976 15.7624 4.14844 16.3474 4.14844 16.9541C4.14844 18.1566 5.1451 19.1316 6.3801 19.1316H19.2609L19.2501 19.1424Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.1152 22.75H14.5061" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        
                        </svg>
                    </a>

                    <ul class="dropdown-menu notif-menue" style="border-radius: 15px;">
                        @if(count($notifications) > 0)
                        @foreach($notifications as $notification)
                            <a href="{{ $notification->data['action_url'] }}"
                               data-href="{{ $notification->data['action_url'] }}"
                               data-notif-id="{{$notification->id}}">
                            <li class="dropdown-item" >
                                <i class="fa fa-user"></i>
                                {{ $notification->data['title'] }}
                            </li>
                            </a>
                        @endforeach
                        @else
                            <li class="dropdown-item" >
                               {{ __('cp.No new notifications') }}
                            </li>
                        @endif
                    </ul>

                    <div class="item-number">
                        <p class="m-0" id="cart_count">{{ count($notifications) }}</p>
                    </div>

                </div>
                <div class="cart cart-first me-4">
                    <a href="{{ route('cart') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M8.85416 14.8438C8.85416 16.8438 10.5 18.4896 12.5 18.4896C14.5 18.4896 16.1458 16.8438 16.1458 14.8438" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.17708 2.08325L5.40625 5.8645" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8229 2.08325L19.5937 5.8645" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.08334 8.17708C2.08334 6.25 3.11459 6.09375 4.39584 6.09375H20.6042C21.8854 6.09375 22.9167 6.25 22.9167 8.17708C22.9167 10.4167 21.8854 10.2604 20.6042 10.2604H4.39584C3.11459 10.2604 2.08334 10.4167 2.08334 8.17708Z" stroke="white" stroke-width="1.5"/>
                        <path d="M3.64584 10.4167L5.11459 19.4167C5.44793 21.4376 6.25001 22.9167 9.22918 22.9167H15.5104C18.75 22.9167 19.2292 21.5001 19.6042 19.5417L21.3542 10.4167" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </a>
                    @if(session('cart') != '')
                        <div class="item-number">
                            <p class="m-0" id="cart_count">{{ count(session('cart')) }}</p>
                        </div>
                    @else
                        <div class="item-number">
                            <p class="m-0" id="cart_count">0</p>
                        </div>
                    @endif
                </div>
                @if(Auth::check())

                    {{--                    <a class="btn btn-login" href="{{ route('user.logout') }}">--}}
                    {{--                        {{ __('cp.logout') }}--}}
                    {{--                    </a>--}}
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"
                               aria-expanded="false">
                                <img src="{{ url('uploads/users/'.auth()->user()->image) ?? url(asset('website')).'/img/about-user.png' }}" class="img-circle nav-user-image" style="width:39px; height:39px; object-fit:cover; border-radius:100%">
                            </a>
                            <ul class="dropdown-menu" style="border-radius: 15px;">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>
                                        {{ __('cp.profile') }}
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.change_password') }}"><i class="fa fa-lock"></i>
                                        {{ __('cp.Change Password') }}
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('my_courses') }}"><i class="fa fa-laptop"></i>
                                        {{ __('cp.My courses') }}
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        {{ __('cp.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a class="btn me-3" type="" href="{{ route('user.login.form') }}">Sign IN</a>
                    <a class="btn" type="" href="{{ route('user.register.form') }}">Sign up</a>
                @endif
            </div>

              
            </div>

        </div>

    </nav>
</header>
