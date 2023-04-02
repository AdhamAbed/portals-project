<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>
        {{ $setting->title }}
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @if(app()->getLocale() == 'ar')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="http://malsup.github.com/jquery.form.js"></script>
        <link href="{{admin_assets('/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet"
              type="text/css"/>

        @yield('css_file_upload')

        <link href="{{admin_assets('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable-rtl.css')}}" rel="stylesheet"
              type="text/css"/>

        <link href="{{admin_assets('/global/css/components-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/themes/default-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('layouts/layout4/css/customize-style.css')}}" rel="stylesheet"
              type="text/css"/>

        <link href="{{admin_assets('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
              type="text/css"/>

        <style type="text/css">
            .page-breadcrumb{
                direction: rtl;
            }
            .widget-row{
                margin-top: 45px;
            }
            .btn-group{
                float: right;
            }
            body{
                direction: rtl;
            }


            .btn-group .btn+.btn, .btn-group .btn+.btn-group, .btn-group .btn-group+.btn, .btn-group .btn-group+.btn-group {
                margin-right: 4px;
            }

            .mt-checkbox>span:after {

                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }



            .fa {
                transform: rotate(180edg);
            }

            .select2-results__option[aria-selected]{cursor:pointer; text-align:right;}

            .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field {background:transparent;padding:0 12px;height:32px;line-height:1.42857;margin-top:0;min-width:5em;text-align:right;}
            .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice{color:#555;background:#fff;border:1px solid #ccc;border-radius:4px;cursor:default;float:right;margin:5px 0 0 6px;padding:0 6px}

            .select2-container--bootstrap .select2-selection--single .select2-selection__rendered {color: #555;padding: 0;text-align: right;}


            .title{
                font-size: 18px;
                padding-right: 2px;
                margin-top: 3px;
            }

        </style>

        @yield('css')





    @else
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="http://malsup.github.com/jquery.form.js"></script>

        <link href="{{admin_assets('/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
              type="text/css"/>

        @yield('css_file_upload')


        <link href="{{admin_assets('/global/css/components.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{admin_assets('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('layouts/layout4/css/customize-style.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{admin_assets('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
              type="text/css"/>

        <style type="text/css">

            .page-sidebar .page-sidebar-menu li>a>.arrow.open:before, .page-sidebar .page-sidebar-menu li>a>.arrow:before, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu li>a>.arrow.open:before, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu li>a>.arrow:before {
                color: #b1c4d2;
                transform: rotate(180deg);
            }
        </style>


        @yield('css')

    @endif
    <link rel="icon" href="{{$setting->logo}}">
    <style type="text/css">

        input[type=file]{

            display: inline;

        }

        #image_preview{
            display: inline;
            padding: 10px;

        }

        #image_preview img{
            display: inline;
            width: 200px;

            padding: 5px;

        }

    </style>

    <style>
        .checked {
            color: orange;
        }
        .unchecked {
            color: silver;
        }

        table, th, td {
            border: 1px solid #31395b !important;
        }


    </style>
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">

<div class="page-header navbar navbar-fixed-top" style="background-color: #31395b; height:80px;">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{url('/admin/home')}}">
                <img src="{{$setting->logo}}"
                     style="margin: 3px 10px 0 !important; height: 69px;" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                {{auth()->guard('admin')->user()->name}}
                                {{-- DiMarket --}}
                            </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('admin.admins.edit',auth()->guard('admin')->user()->id) }}">
                                    {{__('cp.edit_my_profile')}}
                                </a>


                            </li>
                            <li>
                                <a href="{{ route('admin.admins.edit_password',auth()->guard('admin')->user()->id) }}">
                                    {{__('cp.Change Password')}}

                                </a>
                            </li>
                           <li>

                                <a href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{__('cp.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>

                        </ul>
                    </li>

                    <li class="" style="padding: 10px">
                        @if(app()->getLocale() == 'en')
                            <?php
                            $lang = LaravelLocalization::getSupportedLocales()['ar']
                            ?>
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="">
                                <div style="color: #abafc1; font-size: 13px"><b>{{ $lang['native'] }}</b></div>
                            </a>
                        @else
                            <?php
                            $lang = LaravelLocalization::getSupportedLocales()['en']
                            ?>
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="">
                                <div style="color: #abafc1; font-size: 13px"><b>{{ $lang['native'] }}</b></div>
                            </a>
                        @endif
                    </li>


                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>



<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">


                <li class="nav-item {{(explode("/", request()->url())[5] == "home") ? "active open" : ''}} start">
                    <a href="{{ route('admin.admin.home') }}" class="nav-link">
                    <img src="{{ url('uploads/icons/home.png') }}">
                        <span class="title">{{__('cp.home')}}</span>
                    </a>
                </li>


                    @if(can('users'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "users") ? "active open" : ''}} ">
                            <a href="{{ route('admin.users.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/users.png') }}" style="width: 45px;">
                                <span class="title"> {{ __('cp.users') }} </span>
                            </a>
                        </li>
                    @endif



                    @if(can('evaluators'))
                    <li class="nav-item {{(explode("/", request()->url())[5] == "evaluators") ? "active open" : ''}} ">
                        <a href="{{ route('admin.evaluators.index') }}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/evaluators.png') }}" style="width: 45px;">
                            <span class="title"> {{ __('cp.evaluators') }} </span>
                        </a>
                    </li>
                    @endif



                    @if(can('admins_accounts'))
                    <li class="nav-item {{(explode("/", request()->url())[5] == "admins_accounts") ? "active open" : ''}} ">
                        <a href="{{ route('admin.admins_accounts.index') }}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/admins_accounts.png') }}" style="width: 45px;">
                            <span class="title"> {{ __('cp.admins_accounts') }} </span>
                        </a>
                    </li>
                    @endif





                    @if(can('ads'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "ads") ? "active open" : ''}}">
                            <a href="{{ route('admin.ads.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/ads.png') }}" style="width: 45px;">
                                <span class="title"> {{ __('cp.ads') }} </span>
                            </a>
                        </li>
                    @endif


                    @if(can('categories'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "categories") ? "active open" : ''}}">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/categories.png') }}">
                                <span class="title"> {{ __('cp.categories') }} </span>
                            </a>
                        </li>
                    @endif



                    @if(can('competitions_categories'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "competitions_categories") ? "active open" : ''}}">
                            <a href="{{ route('admin.competitions_categories.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/competitions_categories.png') }}">
                                <span class="title"> {{ __('cp.competitions_categories') }} </span>
                            </a>
                        </li>
                    @endif



                    @if(can('competitions_others_categories'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "competitions_others_categories") ? "active open" : ''}}">
                            <a href="{{ route('admin.competitions_others_categories.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/competitions_others_categories.png') }}">
                                <span class="title"> {{ __('cp.competitions_others_categories') }} </span>
                            </a>
                        </li>
                    @endif



                    @if(can('competitions_questions'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "competitions_questions") ? "active open" : ''}}">
                            <a href="{{ route('admin.competitions_questions.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/competitions_questions.png') }}">
                                <span class="title"> {{ __('cp.competitions_questions') }} </span>
                            </a>
                        </li>
                    @endif


                    @if(can('products'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "products") ? "active open" : ''}}">
                            <a href="{{ route('admin.products.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/products.png') }}">
                                <span class="title"> {{ __('cp.products') }} </span>
                            </a>
                        </li>
                    @endif


                    {{-- @if(can('coupons'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "coupons") ? "active open" : ''}} ">
                            <a href="{{ route('admin.coupons') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/coupons.png') }}">
                                <span class="title">{{__('cp.coupons')}}</span>
                            </a>
                        </li>
                    @endif --}}


                    @if(can('orders'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "orders") ? "active open" : ''}} ">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/orders.png') }}" style="width: 45px;">
                                <span class="title">{{__('cp.orders')}}</span>
                            </a>
                        </li>
                    @endif




                        @if(can('contact-us'))
                        <li class="nav-item {{(explode("/", request()->url())[5] == "contact") ? "active open" : ''}}">
                            <a href="{{ route('admin.contact.index')}}" class="nav-link nav-toggle">
                                <img src="{{ url('uploads/icons/contact.png') }}" style="width: 45px;">
                                <span class="title">{{__('cp.contact')}}</span>
                                @isset($contact)
                                @if($contact > 0)
                                <span style="margin-top:13px;" class="badge badge-warning">{{ @$contact}}</span>
                                @endif
                                @endisset
                            </a>
                        </li>
                        @endif

                @if(can('notifications'))
                    <li class="nav-item  {{(explode("/", request()->url())[5] == "notifications") ? "active open" : ''}}">
                        <a href="{{ route('admin.notifications.index') }}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/notifications.png') }}" style="width: 45px;">
                            <span class="title">{{ __('cp.notifications') }}</span>
                        </a>
                    </li>
                @endif







                     @if(can('countries'))
                    <li class="nav-item {{(explode("/", request()->url())[5] == "countries") ? "active open" : ''}} ">
                        <a href="{{ route('admin.countries.index') }}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/countries.png') }}">
                            <span class="title">{{__('cp.countries')}}</span>
                        </a>
                    </li>
                    @endif






                    @if(can('pages'))
                    <li class="nav-item {{(explode("/", request()->url())[5] == "pages") ? "active open" : ''}} ">
                        <a href="{{ route('admin.pages.index') }}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/pages.png') }}">
                            <span class="title">{{__('cp.pages')}}</span>
                        </a>
                    </li>
                    @endif


                    <!--@if(can('admins-management'))-->
                    <!--<li class="nav-item {{(explode("/", request()->url())[5] == "admins") ? "active open" : ''}} ">-->
                    <!--    <a href="{{url(getLocal().'/admin/admins')}}" class="nav-link nav-toggle">-->
                    <!--        <img src="{{ url('uploads/icons/admins.png') }}">-->
                    <!--        <span class="title">{{__('cp.admins')}}</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--@endif-->


                    <!--@if(can('permissions'))-->
                    <!--<li class="nav-item {{(explode("/", request()->url())[5] == "role") ? "active open" : ''}} ">-->
                    <!--    <a href="{{url(getLocal().'/admin/role')}}" class="nav-link nav-toggle">-->
                    <!--        <i class="fa fa-server"></i><span class="title">{{__('cp.roleTitle')}}</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--@endif-->



                    @if(can('settings'))
                    <li class="nav-item {{(explode("/", request()->url())[5] == "settings") ? "active open" : ''}} ">
                        <a href="{{ route('admin.settings.all')}}" class="nav-link nav-toggle">
                            <img src="{{ url('uploads/icons/settings.png') }}" style="width: 45px;">
                            <span class="title">{{__('cp.setting')}}</span>
                        </a>

                    </li>
                    @endif






            </ul>
        </div>

    </div>


    {{--Begin Content--}}
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>@yield('title')
                    </h1>
                </div>
                <div class="page-toolbar" style="display: none;">
                    <div class="btn-group btn-theme-panel">
                        <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-settings"></i>
                        </a>
                        <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <h3>HEADER</h3>
                                    <ul class="theme-colors">
                                        <li class="theme-color theme-color-default active" data-theme="default">
                                            <span class="theme-color-view"></span>
                                            <span class="theme-color-name">Dark Header</span>
                                        </li>
                                        <li class="theme-color theme-color-light " data-theme="light">
                                            <span class="theme-color-view"></span>
                                            <span class="theme-color-name">Light Header</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                                    <h3>LAYOUT</h3>
                                    <ul class="theme-settings">
                                        <li> Theme Style
                                            <select class="layout-style-option form-control input-small input-sm">
                                                <option value="square">Square corners</option>
                                                <option value="rounded" selected="selected">Rounded corners</option>
                                            </select>
                                        </li>
                                        <li> Layout
                                            <select class="layout-option form-control input-small input-sm">
                                                <option value="fluid" selected="selected">Fluid</option>
                                                <option value="boxed">Boxed</option>
                                            </select>
                                        </li>
                                        <li> Header
                                            <select class="page-header-option form-control input-small input-sm">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </li>
                                        <li> Top Dropdowns
                                            <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                                <option value="light">Light</option>
                                                <option value="dark" selected="selected">Dark</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Mode
                                            <select class="sidebar-option form-control input-small input-sm">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Menu
                                            <select class="sidebar-menu-option form-control input-small input-sm">
                                                <option value="accordion" selected="selected">Accordion</option>
                                                <option value="hover">Hover</option>
                                            </select>
                                        </li>
                                        <li> Sidebar Position
                                            <select class="sidebar-pos-option form-control input-small input-sm">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </li>
                                        <li> Footer
                                            <select class="page-footer-option form-control input-small input-sm">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <ul style="border: 1px solid #e02222; background-color: white">
                    @foreach ($errors->all() as $error)
                        <li style="color: #e02222; margin: 15px">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('status'))
                <ul style="border: 1px solid #01b070; background-color: white">
                    <li style="color: #01b070; margin: 15px">{{  session('status')  }}</li>
                </ul>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- END CONTENT -->




</div>

<div id="deleteAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.delete')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmDeleteAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true" >{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="delete"><button class="btn btn-danger">{{__('cp.delete')}}</button></a>
            </div>
        </div>
    </div>
</div>

<div id="activation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.activation')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmActiveAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="active">
                    <button class="btn btn-success">{{__('cp.Yes')}}</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="cancel_activation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.cancel_activation')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmNotActiveAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="not_active"><button class="btn btn-success">{{__('cp.Yes')}}</button></a>
            </div>
        </div>
    </div>
</div>





<script src="{{admin_assets('/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('js_file_upload')

<script src="{{admin_assets('/global/plugins/moment.min.js')}}" type="text/javascript"></script>




<script src="{{admin_assets('/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/layouts/layout4/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/bootstrap-sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/pages/scripts/ui-sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/scripts/datatable.js')}}" type="text/javascript"></script>
@if(app()->getLocale() == "ar")
    <script src="{{admin_assets('global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
@else

    <script src="{{admin_assets('global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
@endif
<script src="{{admin_assets('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

<script src="{{admin_assets('/global/plugins/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('/global/scripts/app.min.js')}}" type="text/javascript"></script>


<script src="{{admin_assets('sweet_alert/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{admin_assets('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{ admin_assets('custom.js') }}" type="text/javascript"></script>



<div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" id="confirm-dialog">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                   id="confirmCancel"></button>
           <h4 class="modal-title" id="confirm-title"></h4>
       </div>
       <div class="modal-body new_font" id="confirm-body" style="font-size: 16px;"></div>
       <div class="modal-footer" id="confirm-footer">
           <button type="button" class="btn font-green" data-dismiss="modal" id="msgCancelBtn">حسناَ</button>
       </div>
   </div>
</div>
</div>



<div class="modal fade" id="MyMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" id="msg-dialog">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="msgCancel"></button>
           <h4 class="modal-title" id="msg-title"></h4>
       </div>
       <div class="modal-body new_font" style="font-size: 16px;" id="msg-body"></div>

       <div class="modal-footer">
           <button type="button" class="btn font-green" data-dismiss="modal" id="msgCancelBtn">حسناَ</button>
       </div>
   </div>
</div>
</div>
{{--    END OF MY MODALS--}}



@yield('js')



<script>

    $(document).on('change','.changePermission',function(e){
        var permissionTxt = $(this).val();
        var ordersSelectd = permissionTxt.indexOf("orders");
        if(ordersSelectd >= 0){
            $('.selectDriver').show(1000);
        }
        else{
             $('.selectDriver').hide(1000);
        }
    });






    $('.table').on('click', '.btn-delete', function () {
           var BTN = $(this);
           var id = BTN.data('id');
           // alert(id);
           showConfirm('حذف', 'deleteBtn', 'هل أنت متأكد أنك تريد الحذف ؟', "modal-30");
           var segment = '{{explode("/", request()->url())[6] }}';


           var url = '{{url(getLocal())}}' + "/admin/" + segment + '/' + id;
           var csrf_token = '{{csrf_token()}}';
           $("#deleteBtn").click(function () {
               $.ajax({
                   type: 'delete',
                   headers: {'X-CSRF-TOKEN': csrf_token},
                   url: url,
                   data: {_method: 'delete'},
                   success: function (response) {
                       console.log(response);
                       showMsg('حذف ملف', 'تم الحذف', 'success', 'modal-30');
                       BTN.closest('tr').remove();
                   },
                   error: function (e) {
                       console.log('error');
                       showMsg('حذف ملف', 'لم يتم الحذف', 'danger', 'modal-30');
                   }
               });
               hideConfirm();
           });
       });
   </script>



<script>
/////////////////////// View Cities ////////////////////
$(document).on('change','.country',function(e){
    var country_id = $(this).val();
    var url = "{{ url(app()->getLocale().'/admin/getCities/') }}";

      if(country_id){
        $.ajax({
          type: "GET",
          url: url+'/'+country_id,
          success: function (response) {
              if(response)
              {
                $(".city").empty();
                $(".city").append('<optgroup label="{{__('cp.choose_city')}}">');
                $.each(response, function(index, value){
                  $(".city").append('<option value="'+value.id+'">'+ value.name +'</option>');
                  $(".city").append('</optgroup>');
                });
              }
          }
        });
      }
      else{
        $(".city").empty();
      }
});

</script>





<script>

    var IDArray = [];
    $("input:checkbox[name=chkBox]:checked").each(function () {
        IDArray.push($(this).val());
    });
    if (IDArray.length == 0) {
        $('.event').attr('disabled', 'disabled');
    }
    $('.chkBox').on('change', function () {
        var IDArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDArray.push($(this).val());
        });
        if (IDArray.length == 0) {
            $('.event').attr('disabled', 'disabled');
        } else {
            $('.event').removeAttr('disabled');
        }
    });
    $('.confirmAll').on('click', function (e) {
        e.preventDefault();
        var action = $(this).data('action');

        var url = "{{ url(getLocal().'/admin/changeStatus/'.Request::segment(3)) }}";
        var csrf_token = '{{csrf_token()}}';
        var IDsArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDsArray.push($(this).val());
        });

        if (IDsArray.length > 0) {
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token},
                url: url,
                data: {action: action, IDsArray: IDsArray, _token: csrf_token},
                success: function (response) {
                    if (response === 'active') {
                        //alert('fsvf');
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('label-warning');
                            $('#label-' + value).addClass('label-primary');
                            $r = '{{app()->getLocale()}}';
                            if($r == 'ar'){
                                $('#label-' + value).text('فعال ');
                            }else{
                                $('#label-' + value).text('active');

                            }
                        });
                        $('#activation').modal('hide');
                    } else if (response === 'not_active') {
                        //alert('fg');
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('label-primary');
                            $('#label-' + value).addClass('label-warning');
                            $r = '{{app()->getLocale()}}';
                            if($r == 'ar'){
                                $('#label-' + value).text('غير فعال');
                            }else{
                                $('#label-' + value).text('Not Active');

                            }
                        });
                        $('#cancel_activation').modal('hide');
                    } else if (response === 'delete') {
                        $.each(IDsArray, function (index, value) {
                            $('#tr-' + value).hide(2000);
                        });
                        $('#deleteAll').modal('hide');
                    }

                    IDArray = [];
                    $("input:checkbox[name=chkBox]:checked").each(function () {
                        $(this).prop('checked', false);
                    });
                    $('.event').attr('disabled', 'disabled');

                },
                fail: function (e) {
                    alert(e);
                }
            });
        } else {
            alert('{{__('cp.not_selected')}}');
        }
    });



    function readURL(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                target.attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    $('#toolsTable').DataTable({
        dom: 'Bfrtip',
        searching: false,
        "oLanguage": {
            "sSearch": "{{__('cp.search')}}"
        },
        bInfo: true, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        paging: false,//Dont want paging
        bPaginate: false,//Dont want paging
        buttons: [
            // 'excel'
        ]
    });

    $('#toolsTable1').DataTable({
        dom: 'Bfrtip',
        searching: false,
        "oLanguage": {
            "sSearch": "{{__('cp.search')}}"
        },
        bInfo: true, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
        paging: false,//Dont want paging
        bPaginate: false,//Dont want paging
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });

    $('.btn--filter').click(function () {
        $('.box-filter-collapse').slideToggle(500);
    });

    function readURLMultiple(input, target) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (var i = 0; i < filesAmount; i++){
                var reader = new FileReader();
                reader.onload = function (event){
                    target.append('<div class="imageBox text-center" style="width:150px;height:190px;margin:5px"><img src="'+event.target.result+'" style="width:150px;height:150px"><button class="btn btn-danger deleteImage" type="button">{{__("cp.remove")}}</button><input class="attachedValues" type="hidden" name="filename[]" value="'+event.target.result+'"></div>');
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $(document).on("click", ".deleteImage", function () {
        $(this).parent().remove();
    });

</script>

@yield('script')
</body>

</html>
