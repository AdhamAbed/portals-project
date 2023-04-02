<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">


    <div class="aside-logo1 flex-column-auto" id="kt_aside_logo" style="text-align:center !important;">
        <a href="{{url('/admin/home')}}">
            <center>
                <img src="{{$setting->white_logo}}" style="max-width:170px; margin-top:10px; text-align:center !important;" />
            </center>
        </a>

    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/home*') ? 'active' : '' }}" href="{{ route('admin.admin.home') }}">
						<span class="menu-icon"> <i class="fas fa-home"></i> </span>
                        <span class="menu-title"> {{ __('cp.home') }} </span>
                    </a>
                </div>



                @isset($adminPermissions)
                @foreach($adminPermissions as $one)

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/users*') ? 'active' : '' }}" href="{{ route($one->route_name) }}">
                            <span class="menu-icon">
                                {!! $one->icon !!}
                            </span>
                            <span class="menu-title"> {{ __('cp.'.$one->name)  }} </span>
{{--                            <span class="menu-title"> {{ $one->name  }} </span>--}}
                        </a>
                    </div>

                @endforeach
                @endisset


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title"> {{ __('cp.users') }}-->--}}
{{--                <!--        </span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/posts*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.news') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/articles*') ? 'active' : '' }}" href="{{ route('admin.articles.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.articles') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/events*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.events') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/initiatives*') ? 'active' : '' }}" href="{{ route('admin.initiatives.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.initiatives') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/courses*') ? 'active' : '' }}" href="{{ route('admin.courses.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.courses') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>  -->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/courses_categories*') ? 'active' : '' }}" href="{{ route('admin.courses_categories.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.courses_categories') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>  -->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/research_studies*') ? 'active' : '' }}" href="{{ route('admin.research_studies.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.research_studies') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}



{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/associations*') ? 'active' : '' }}" href="{{ route('admin.associations.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.associations') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/donors*') ? 'active' : '' }}" href="{{ route('admin.donors.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.donors') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/ambassadors*') ? 'active' : '' }}" href="{{ route('admin.ambassadors.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.ambassadors') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/countries*') ? 'active' : '' }}" href="{{ route('admin.countries.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.countries') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/cities*') ? 'active' : '' }}" href="{{ route('admin.cities.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.cities') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/pages*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">-->--}}
{{--                <!--        <span class="menu-icon"> <i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.pages') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


{{--                <!--<div class="menu-item">-->--}}
{{--                <!--    <a class="menu-link {{ Request::is(app()->getLocale() .'/admin/settings*') ? 'active' : '' }}" href="{{ route('admin.settings.all') }}">-->--}}
{{--                <!--        <span class="menu-icon"><i class="fas fa-bullseye"></i> </span>-->--}}
{{--                <!--        <span class="menu-title">{{ __('cp.setting') }}</span>-->--}}
{{--                <!--    </a>-->--}}
{{--                <!--</div>-->--}}


            </div>
        </div>
    </div>


</div>
