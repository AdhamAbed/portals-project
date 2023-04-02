<nav class="navbar navbar-expand-xl rajab">
    <div class="container h-100">
        <a class="navbar-brand h-100" href="{{ route('home') }}"><img src="{{url(asset('website'))}}/images/Portals Logo light.png" alt=""></a>
        <div class="cart-tog-warper">
            <!--<div class="cart cart-second me-4">-->
            <!--    <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"-->
            <!--       aria-expanded="false">-->
            <!--        <img src="{{url(asset('website'))}}/images/notification.svg" alt="">-->
            <!--    </a>-->

            <!--    <ul class="dropdown-menu notif-menue2" style="border-radius: 15px;">-->

            <!--        @if(count($notifications) > 0)-->
            <!--            @foreach($notifications as $notification)-->
            <!--                <a href="{{ $notification->data['action_url'] }}"-->
            <!--                   data-href="{{ $notification->data['action_url'] }}"-->
            <!--                   data-notif-id="{{$notification->id}}">-->
            <!--                    <li class="dropdown-item" >-->
            <!--                        <i class="fa fa-user"></i>-->
            <!--                        {{ $notification->data['title'] }}-->
            <!--                    </li>-->
            <!--                </a>-->
            <!--            @endforeach-->
            <!--        @else-->
            <!--            <li class="dropdown-item" >-->
            <!--                {{ __('cp.No new notifications') }}-->
            <!--            </li>-->
            <!--        @endif-->

            <!--    </ul>-->

            <!--    <div class="item-number">-->
            <!--        <p class="m-0" id="cart_count">{{ count($notifications) }}</p>-->
            <!--    </div>-->

            <!--</div>-->
            <!--<div class="cart cart-second me-4">-->
            <!--    <a href="{{ route('cart') }}">-->
            <!--        <img src="{{url(asset('website'))}}/images/bag-happy.svg" alt="">-->
            <!--    </a>-->
            <!--    @if(session('cart') != '')-->
            <!--        <div class="item-number">-->
            <!--            <p class="m-0" id="cart_count">{{ count(session('cart')) }}</p>-->
            <!--        </div>-->
            <!--    @else-->
            <!--        <div class="item-number">-->
            <!--            <p class="m-0" id="cart_count">0</p>-->
            <!--        </div>-->
            <!--    @endif-->
            <!--</div>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-light"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-0 ">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="#training-section">Training Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="#course-cont">Training Courses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#consultants-section">Our Consultants</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="#opinions-section">Trainees' opinions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#happy-clients">Happy Clients</a>
                </li>
            </ul>

            <div>
                <!--<div class="cart cart-first me-4">-->
                <!--    <a class="nav-link dropdown-toggle border-0" data-bs-toggle="dropdown" href="#" role="button"-->
                <!--       aria-expanded="false">-->
                <!--        <img src="{{url(asset('website'))}}/images/notification.svg" alt="">-->
                <!--    </a>-->

                <!--    <ul class="dropdown-menu notif-menue" style="border-radius: 15px;">-->
                <!--        @if(count($notifications) > 0)-->
                <!--        @foreach($notifications as $notification)-->
                <!--            <a href="{{ $notification->data['action_url'] }}"-->
                <!--               data-href="{{ $notification->data['action_url'] }}"-->
                <!--               data-notif-id="{{$notification->id}}">-->
                <!--            <li class="dropdown-item" >-->
                <!--                <i class="fa fa-user"></i>-->
                <!--                {{ $notification->data['title'] }}-->
                <!--            </li>-->
                <!--            </a>-->
                <!--        @endforeach-->
                <!--        @else-->
                <!--            <li class="dropdown-item" >-->
                <!--               {{ __('cp.No new notifications') }}-->
                <!--            </li>-->
                <!--        @endif-->
                <!--    </ul>-->

                <!--    <div class="item-number">-->
                <!--        <p class="m-0" id="cart_count">{{ count($notifications) }}</p>-->
                <!--    </div>-->

                <!--</div>-->
                <!--<div class="cart cart-first me-4">-->
                <!--    <a href="{{ route('cart') }}">-->
                <!--        <img src="{{url(asset('website'))}}/images/bag-happy.svg" alt="">-->
                <!--    </a>-->
                <!--    @if(session('cart') != '')-->
                <!--        <div class="item-number">-->
                <!--            <p class="m-0" id="cart_count">{{ count(session('cart')) }}</p>-->
                <!--        </div>-->
                <!--    @else-->
                <!--        <div class="item-number">-->
                <!--            <p class="m-0" id="cart_count">0</p>-->
                <!--        </div>-->
                <!--    @endif-->
                <!--</div>-->
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
                    <!--<a class="btn me-2" type="" href="{{ route('user.login.form') }}">Sign IN</a>-->
                    <a class="btn" type="" href="{{ route('user.register.form') }}">Sign up</a>
                @endif
            </div>
        </div>
    </div>
</nav>