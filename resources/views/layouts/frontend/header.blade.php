@php
    $setting = \App\Models\Setting::first();
    $locale = session()->get('locale');
    $cart = session('cart') ?? [];
@endphp
<!--header area start-->
    
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">
            
</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                    </div>
                    <div class="call_support">
                        <p><i class="icon-phone-call" aria-hidden="true"></i> <span>Call us: <a href="tel:{{$setting->whatsapp}}">{{$setting->whatsapp}}</a></span></p>

                    </div>
                    <div class="header_account">
                        <ul>
                            <li class="language">
                                <a href="javascript:;" class="flag-bar">
                                    @switch($locale)
                                        @case('en')
                                            <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"><span class="pl-1">English</span>
                                            @break
                                        @case('zh')
                                            <img src="{{asset('images/flag/zh.png')}}" alt="简体中文" width="25"><span class="pl-1">简体中文</span>
                                            @break
                                        @default
                                            <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"><span class="pl-1">English</span>
                                    @endswitch
                                </a>
                                <ul class="dropdown_language">
                                    <li class="flag-item">
                                        <a href="{{route('lang', 'en')}}" class="flag-link">
                                            <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"> English
                                        </a>
                                    </li>
                                    <li class="flag-item">
                                        <a href="{{route('lang', 'zh')}}" class="flag-link">
                                            <img src="{{asset('images/flag/zh.png')}}" alt="简体中文" width="25"> 简体中文
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas_footer">
                        <span><a href="mailto:{{$setting->email}}"><i class="fa fa-envelope-o"></i> {{$setting->email}}</a></span>
                        <ul>
                            <li class="facebook"><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                            <li class="google-plus"><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-5">
                        <div class="header_account">
                            <ul>
                                <li class="language">
                                    <a href="javascript:;" class="flag-bar">
                                        @switch($locale)
                                            @case('en')
                                                <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"><span class="pl-1">English</span>
                                                @break
                                            @case('zh')
                                                <img src="{{asset('images/flag/zh.png')}}" alt="简体中文" width="25"><span class="pl-1">简体中文</span>
                                                @break
                                            @default
                                                <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"><span class="pl-1">English</span>
                                        @endswitch
                                    </a>
                                    <ul class="dropdown_language">
                                        <li class="flag-item">
                                            <a href="{{route('lang', 'en')}}" class="flag-link">
                                                <img src="{{asset('images/flag/en.png')}}" alt="English" width="25"> English
                                            </a>
                                        </li>
                                        <li class="flag-item">
                                            <a href="{{route('lang', 'zh')}}" class="flag-link">
                                                <img src="{{asset('images/flag/zh.png')}}" alt="简体中文" width="25"> 简体中文
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="header_top_links text-right text-light">
                            {{$setting->header_text}}
                            {{-- <ul>
                                <li><a href="login.html">Register</a></li>
                                <li><a href="login.html">login</a></li>
                                <li><a href="cart.html">Shopping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul> --}}
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->

        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4">
                        <div class="logo">
                            <a href="/"><img src="{{asset('frontend/img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-6 col-6">
                        <div class="header_right_box">
                            <div class="header_configure_area">
                                <div class="mini_cart_wrapper">
                                    <a href="{{route('cart')}}">
                                        <i class="icon-shopping-bag2"></i>
                                        <span class="cart_count" id="cart_count">{{count($cart)}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
    </div> 
</header>
<!--header area end-->