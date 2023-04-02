<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container d-flex">
            <div class="d-flex">
                <a class="navbar-brand me-auto" href="{{ route('home') }}"><img src="{{ $settings->second_logo }}"
                                                                                height="60"></a>
                <a class="navbar-brand me-auto" href="{{ route('home') }}"><img src="{{ $settings->colorful_logo }}"
                                                                                height="60"></a>
            </div>
            @if(Auth::check())
                <div class="user_links">
                    <button type="button" id="user_links_Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(auth()->user()->google_id != '')
                            <img src="{{auth()->user()->image ?? url(asset('website')).'/img/user_image.jpg' }}" class="img-circle nav-user-image">
                        @else
                            <img src="{{ url('uploads/users').'/'.auth()->user()->image ?? url(asset('website')).'/img/user_image.jpg' }}" class="img-circle nav-user-image">
                        @endif
                        <p> {{ \Illuminate\Support\Str::words(auth()->user()->name, 1,'') }}</p>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="user_links_Button">
                        {{--                                {{ auth()->user()->image ?? url(asset('website')).'/img/about-user.png' }}--}}
                        <a class="dropdown-item {{ is_active('profile') }}" href="{{ route('user.profile') }}"><i class="fa fa-user"></i> {{ __('cp.profile') }}</a>
                        <a class="dropdown-item {{ is_active('my-courses') }}" href="{{ route('user.my_courses') }}"><i class="fas fa-laptop-code"></i> {{ __('cp.my courses') }}</a>
                        <a class="dropdown-item {{ is_active('my-favorite') }}" href="{{ route('user.my_favorite') }}"> <i class="fa fa-heart"></i> {{ __('cp.favorite') }}</a>
                        <a class="dropdown-item" href="{{ route('user.logout') }}">
                            <i class="fa fa-arrow-right"></i>
                            {{ __('cp.logout') }}
                        </a>

                    </div><!-- dropdown-menu -->
                </div><!-- user_links -->
            @endif

            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('/')) active @endif" aria-current="page"
                               href="{{ route('home') }}">{{ __('cp.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('about-us') }}"
                               href="{{ route('about') }}">{{ __('cp.about-us') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('courses') }}{{ is_active('course') }}"
                               href="{{ route('onlineCourses') }}">{{ __('cp.courses') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('privateCoursesRequest') }}{{ is_active('private-course-request') }}"
                               href="{{ route('privateCoursesRequest') }}">{{ __('cp.private courses') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('consultations') }}{{ is_active('consulting') }}"
                               href="{{ route('consultations') }}">{{ __('cp.consulting') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ is_active('projects') }}{{ is_active('project') }}"
                               href="{{ route('projects') }}">{{ __('cp.manage_projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('careers') }}{{ is_active('career') }}"
                               href="{{ route('careers') }}">{{ __('cp.careers') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ is_active('contact-us') }}"
                               href="{{ route('contact') }}">{{ __('cp.contact-us') }}</a>
                        </li>
                        <li class="nav-item">
                            @if(session()->get('locale') == 'ar')
                                <a class="nav-link" href="{{ url('/change/lang/?lang=en') }}">
                                    <span style=" color: #0D5AB4 ">EN</span>
                                    {{--                                        <span><img src="{{url(asset('website'))}}/img/liberia.png" height="25"></span>--}}

                                </a>
                            @else
                                <a class="nav-link" href="{{ url('/change/lang/?lang=ar') }}">
                                    <span style=" color: #0D5AB4 ">ع</span>
{{--                                    <span style=" color: #0D5AB4 ">AR</span>--}}
                                    {{--                                        <span><img src="{{url(asset('website'))}}/img/saudi-arabia.png" height="25"></span>--}}
                                </a>
                            @endif
                        </li>
                    </ul>
                    <div class="d-flex">
                        @if(Auth::check())

{{--                                                   <a class="btn btn-login" href="{{ route('user.logout') }}">--}}
{{--                                                                                {{ __('cp.logout') }}--}}
{{--                                                   </a>--}}
{{--                                                    <ul class="nav nav-tabs">--}}
{{--                                                        <li class="nav-item dropdown">--}}
{{--                                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"--}}
{{--                                                               aria-expanded="false">--}}
{{--                                                                <img src="{{ auth()->user()->image ?? url(asset('website')).'/img/about-user.png' }}" class="img-circle nav-user-image">--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu">--}}
{{--                                                                <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>--}}
{{--                                                                        {{ __('cp.profile') }}--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a class="dropdown-item" href="#"><i class="fas fa-laptop-code"></i>--}}
{{--                                                                        {{ __('cp.courses') }}--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>--}}
{{--                                                                        {{ __('cp.favorite') }}--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a class="dropdown-item" href="#"><i class="fa fa-gear"></i>--}}
{{--                                                                        {{ __('cp.settings') }}--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">--}}
{{--                                                                        <i class="fa fa-right-"></i>--}}
{{--                                                                        {{ __('cp.logout') }}--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
                        @else
                            <a class="btn btn-login" href="{{ route('user.login.form') }}">
                                {{ __('cp.login') }}
                            </a>
                        @endif
                    </div>
                </div>
{{--                <div class="collapse navbar-collapse" id="navbarCollapse">--}}
{{--                    <ul class="navbar-nav mr-auto mb-2 mb-md-0">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link @if(Request::is('/')) active @endif" aria-current="page"--}}
{{--                               href="{{ route('home') }}">{{ __('cp.home') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('about-us') }}"--}}
{{--                               href="{{ route('about') }}">{{ __('cp.about-us') }} </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('courses') }}{{ is_active('course') }}"--}}
{{--                               href="{{ route('onlineCourses') }}">{{ __('cp.courses') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('privateCoursesRequest') }}{{ is_active('private-course-request') }}"--}}
{{--                               href="{{ route('privateCoursesRequest') }}">{{ __('cp.private courses') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('consultations') }}{{ is_active('consulting') }}"--}}
{{--                               href="{{ route('consultations') }}">{{ __('cp.consulting') }}</a>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('projects') }}{{ is_active('project') }}"--}}
{{--                               href="{{ route('projects') }}">{{ __('cp.manage_projects') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('careers') }}{{ is_active('career') }}"--}}
{{--                               href="{{ route('careers') }}">{{ __('cp.careers') }}</a>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ is_active('contact-us') }}"--}}
{{--                               href="{{ route('contact') }}">{{ __('cp.contact-us') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            @if(session()->get('locale') == 'ar')--}}
{{--                                <a class="nav-link" href="{{ url('/change/lang/?lang=en') }}">--}}
{{--                                    <span style=" color: #0D5AB4 ">EN</span>--}}
{{--                                    --}}{{--                                        <span><img src="{{url(asset('website'))}}/img/liberia.png" height="25"></span>--}}

{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a class="nav-link" href="{{ url('/change/lang/?lang=ar') }}">--}}
{{--                                    <span style=" color: #0D5AB4 ">AR</span>--}}
{{--                                    --}}{{--                                        <span><img src="{{url(asset('website'))}}/img/saudi-arabia.png" height="25"></span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="d-flex me-auto">--}}
{{--                        @if(Auth::check())--}}

{{--                            --}}{{--                       <a class="btn btn-login" href="{{ route('user.logout') }}">--}}
{{--                            --}}{{--                                                    {{ __('cp.logout') }}--}}
{{--                            --}}{{--                       </a>--}}
{{--                            --}}{{--                        <ul class="nav nav-tabs">--}}
{{--                            --}}{{--                            <li class="nav-item dropdown">--}}
{{--                            --}}{{--                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"--}}
{{--                            --}}{{--                                   aria-expanded="false">--}}
{{--                            --}}{{--                                    <img src="{{ auth()->user()->image ?? url(asset('website')).'/img/about-user.png' }}" class="img-circle nav-user-image">--}}
{{--                            --}}{{--                                </a>--}}
{{--                            --}}{{--                                <ul class="dropdown-menu">--}}
{{--                            --}}{{--                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>--}}
{{--                            --}}{{--                                            {{ __('cp.profile') }}--}}
{{--                            --}}{{--                                        </a>--}}
{{--                            --}}{{--                                    </li>--}}
{{--                            --}}{{--                                    <li><a class="dropdown-item" href="#"><i class="fas fa-laptop-code"></i>--}}
{{--                            --}}{{--                                            {{ __('cp.courses') }}--}}
{{--                            --}}{{--                                        </a>--}}
{{--                            --}}{{--                                    </li>--}}
{{--                            --}}{{--                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i>--}}
{{--                            --}}{{--                                            {{ __('cp.favorite') }}--}}
{{--                            --}}{{--                                        </a>--}}
{{--                            --}}{{--                                    </li>--}}
{{--                            --}}{{--                                    <li><a class="dropdown-item" href="#"><i class="fa fa-gear"></i>--}}
{{--                            --}}{{--                                            {{ __('cp.settings') }}--}}
{{--                            --}}{{--                                        </a>--}}
{{--                            --}}{{--                                    </li>--}}
{{--                            --}}{{--                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">--}}
{{--                            --}}{{--                                            <i class="fa fa-right-"></i>--}}
{{--                            --}}{{--                                            {{ __('cp.logout') }}--}}
{{--                            --}}{{--                                        </a>--}}
{{--                            --}}{{--                                    </li>--}}
{{--                            --}}{{--                                </ul>--}}
{{--                            --}}{{--                            </li>--}}
{{--                            --}}{{--                        </ul>--}}
{{--                        @else--}}
{{--                            <a class="btn btn-login" href="{{ route('user.login.form') }}">--}}
{{--                                {{ __('cp.login') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

        </div>
    </nav>
</header>
