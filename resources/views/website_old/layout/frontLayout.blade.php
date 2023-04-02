<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>  @yield('title')</title>

    <meta name="keywords" content="  @yield('keywords') " />
    <meta name="description" content="@yield('description')">
    <meta name="author" content="SW-THEMES">
        
    <!-- Favicon -->
    
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700,900&display=swap&subset=arabic,latin-ext" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}"> 
    @endif

    @yield('css')
</head>
<body>
    <div class="page-wrapper">
        <header class="header @if(Request::is(app()->getLocale()) || Request::is(app()->getLocale()."/home")) header-transparent @endif">
            <div class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active"><a href="/{{app()->getLocale()}}">{{__('website.home')}}</a></li>
                                <li>
                                    <a  class="sf-with-ul">{{__('website.categories')}} </a>
                                    <div class="megamenu megamenu-fixed-width widthFull">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <ul>
                                                    @foreach($categories as $category)
                                                <li><a href="{{url(app()->getLocale().'/category/'. $category->id)}}">{{$category->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="banner">
                                                    <a href="#">
                                                        <img src="{{url('assets/images/menu-banner-2.png')}}" alt="Menu banner">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                {{-- <li><a href="{{url(app()->getLocale().'/contact')}}">{{__('website.contact')}}</a></li> --}}
                                @if(auth()->check())
                                <li>
                                   <a href="{{url(app()->getLocale().'/profile')}}" class="sf-with-ul">  {{__('website.welcame')}} ,<span>{{Auth::user()->name}}
                                  </a>
                                    <div class="megamenu megamenu-fixed-width">
                                        <ul>  
                                            <li><a href="{{url(app()->getLocale().'/profile')}}">{{__('website.my-profile')}}  </a></li>
                                            <li><a href="/myorders">{{__('website.my_orders')}}  </a></li>

                                            <li><a href="{{url(app()->getLocale().'/logout')}}" >{{__('website.logout')}} </a></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                               
                                    <li><a href="{{url(app()->getLocale().'/login')}}">{{__('website.login')}}</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="header-center">
                        <a href="/" class="logo">
                            <img src="{{url('assets/images/logo.png')}}" alt="Porto Logo" width="200" height="30">
                        </a>
                    </div>
                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="/search" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="search" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="category_id">
                                            <option value="0">{{__('cp.select')}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"><a href="category-banner-full-width.html">{{$category->name}}</a></option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-dropdowns">
                            <div class="header-dropdown">
                                    @if(app()->getLocale() == 'en')
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['ar']
                                        ?>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="">
                                            <div style="font-size: 13px"><b>{{ $lang['native'] }}</b></div>
                                        </a>
                                    @else
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['en']
                                        ?>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="">
                                            <div style="font-size: 13px"><b>{{ $lang['native'] }}</b></div>
                                        </a>
                                    @endif
                            </div>
                        </div>

                        <div class="dropdown cart-dropdown" id="x">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <span class="cart-count">{{ count((array) session('cart')) }}</span>
                            </a>

                            <div class="dropdown-menu"  >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-products">
                                        <?php $total = 0 ?>
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{url(app()->getLocale().'/product/'.$details['ids'].'/show')}}">{{ $details['name'] }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $details['quantity'] }}</span>
                                                    x  {{ $details['price'] }} {{__('website.ued')}}
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{url(app()->getLocale().'/product/'.$details['ids'].'/show')}}" class="product-image">
                                                    <img src="{{ $details['photo'] }}" alt="{{ $details['name'] }}">
                                                </a>
                                                
                                            </figure>
                                        </div><!-- End .product -->

                                        @endforeach
                                        @endif
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>{{__('website.totalPrice')}}</span>

                                        <span class="cart-total-price"> {{__('website.ued')}} {{ $total }}</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{url(app()->getLocale().'/cart')}}" class="btn">{{__('website.view-cart')}}</a>
                                       

                                    @if(auth()->check())   
                                    <a href="{{url(app()->getLocale().'/storeOrder')}}" class="btn">{{__('website.go-checkout')}}</a>

                                    @else  
                                    <a href="{{url(app()->getLocale().'/login')}}" class="btn">{{__('website.go-checkout')}}</a>

                                    @endif
                               
                                      
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

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

       
        <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">{{__('website.contact')}}</h4>
                                <ul class="contact-info">
                                    <li style="white-space: pre-line;">
                                        <span class="contact-info-label">{{__('website.address')}} :</span>{!!$setting->address!!}
                                    </li>
                                    <li>
                                        <span class="contact-info-label">{{__('website.phone')}} :</span><a href="">{{$setting->mobile }}</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">{{__('website.email')}} :</span> <a href="">{{$setting->info_email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="widget widget-newsletter">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="widget-title">{{__('website.subscribeNewsletter')}}</h4>
                                        <p>{{__('website.newsletterText')}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" action="{{url(app()->getLocale().'/subscribe')}}">
                                            {{ csrf_field() }}
                                            <input type="email" name="email" class="form-control" placeholder="{{__('website.email')}}" required>
                                            <input type="submit" class="btn" value="{{__('website.subscribe')}}">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">{{__('website.shortLink')}}</h4>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-5">  
                                                <ul class="links">
                                                    <li><a href="{{url(app()->getLocale().'/page/about')}}">{{__('website.about_us')}}</a></li>
                                                    <li><a href="{{url(app()->getLocale().'/page/privacy')}}">{{__('website.privacy')}}</a></li>
                                                    <li><a href="{{url(app()->getLocale().'/page/terms')}}">{{__('website.terms')}}</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <li><a href="{{url(app()->getLocale().'/page/returnPolicy')}}">{{__('website.returnPolicy')}}</a></li>
                                                    <li><a href="{{url(app()->getLocale().'/contact')}}">{{__('website.touchUs')}}</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->

                                <div class="col-md-7">
                                    <div class="widget">
                                        <h4 class="widget-title">{{__('website.socialMedia')}}</h4>
                                        <div class="social-icons">
                                            <a href="{{$setting->facebook}}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                                            <a href="{{$setting->twitter}}" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="{{$setting->linked_in}}" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="footer-bottom">
                    <div  class="mt-50 mb-20 pull-right colordech"> <p>{{__('website.poweredBy')}}</p>
                        <a target="_blank" href="http://hexacit.com/"><img src="{{url('assets/images/LogoWhite.svg')}}" /></a> 
                    </div>
                    <div  class="mt-50 mb-20 pull-left colordech"> حميع الحقوق محفوظة لدى الاتحاد السريعة &copy;2020
                    </div>
                </div><!-- End .footer-bottom -->
            </div><!-- End .container -->
        </footer>
        
    </div><!-- End .page-wrapper -->



    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="/">{{__('website.home')}}</a></li>
                    <li>
                        <a href="category.html">{{__('website.Categories')}}</a>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="category-banner-full-width.html">{{$category->name}}</a></li>
                           @endforeach                         
                        </ul>
                    </li>
                    
                        <ul>
                            @if(auth()->check())
                            <li>
                               <a href="/profile" class="sf-with-ul">  {{__('website.welcame')}} ,<span>{{Auth::user()->name}}
                              </a>
                                <div class="megamenu megamenu-fixed-width">
                                    <ul>  
                                        <li><a href="{{('profile')}}">{{__('website.my-profile')}}  </a></li>
                                        <li><a href="myorders">{{__('website.my_orders')}}  </a></li>
                                        {{-- <li><a href="blog.html"> {{__('website.changePassword')}} </a></li> --}}
                                      
                                        <li><a href="{{url(app()->getLocale().'/logout')}}" >{{__('website.logout')}} </a></li>
                                    </ul>
                                </div>
                            </li>
                            @else
                           
                                <li><a href="{{url(app()->getLocale().'/login')}}">{{__('website.login')}}</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{url(app()->getLocale().'/contact')}}">{{__('website.contact')}}</a></li>

                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="{{$setting->facebook}}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="{{$setting->twitter}}" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="{{$setting->instagram}}" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    
    </div><!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/a91a27e46f.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    @yield('scripts')
    @yield('js')
</body>
</html>