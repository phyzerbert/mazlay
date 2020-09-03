@extends('layouts.frontend.master')

@section('content')
@php
    $setting = \App\Models\Setting::first();
    $products = \App\Models\Product::all();
    $number_array = ['one', 'two', 'three', 'four'];
@endphp
    <!--slider area start-->
    <section class="slider_section mb-80">
        <div class="slider_area slider_carousel owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('frontend/img/slider/slider1.jpg')}}">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content">
                                <h1>Big sale off <span>Accessories Fidanza</span></h1>
                                <p>Exclusive Offer -30% Off This Week</p>  
                                <a class="button" href="{{route('cart')}}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div> 
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('frontend/img/slider/slider2.jpg')}}">
                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content center">
                                <h1>Accessories  <span>all kinds of tractor trailer</span></h1>
                                <p>Exclusive Offer -30% Off This Week</p>  
                                <a class="button" href="{{route('cart')}}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('frontend/img/slider/slider3.jpg')}}">
                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content">
                                <h1>High-end <span>New car interior</span> </h1>
                                <p>Exclusive Offer -20% Off This Week</p>  
                                <a class="button" href="{{route('cart')}}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    
    <!--banner area start-->
    <div class="banner_area mb-80">
        <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="welcome_title">
                       <h3>WELCOME TO MAZLAY</h3>
                       <h2>CUSTOM <span>SHOPPING STORE ONLINE</span></h2>
                       <p>Designer Accessories. Locally Designed. Globally Crafted.</p>
                   </div>
               </div>
           </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('cart')}}"><img src="{{asset('frontend/img/bg/banner1.jpg')}}" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('cart')}}"><img src="{{asset('frontend/img/bg/banner2.jpg')}}" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{route('cart')}}"><img src="{{asset('frontend/img/bg/banner3.jpg')}}" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--home section bg area start-->
    <div class="home_section_bg">
        <!--product area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                           <h2>{{__('page.our_products')}}</h2>                  
                        </div>
                    </div>
                </div> 
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="Sellers" role="tabpanel">
                        <div class="row product_carousel product_column5">
                            @foreach ($products as $item)                                    
                                <div class="col-lg-3 mt-3">
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="javascript:;"><img src="{{asset($item->image)}}" alt=""></a>
                                                    <a class="secondary_img" href="javascript:;"><img src="{{asset($item->image2)}}" alt=""></a>
                                                    <div class="quick_button">
                                                        <a href="{{route('cart')}}"  title="Add To Cart">{{__('page.add_to_cart')}}</a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_content_inner">
                                                        <p class="manufacture_product"><a href="javascript:;">{{$item->description}}</a></p>
                                                        <h4 class="product_name"><a href="javascript:;">{{$item->name}}</a></h4>
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="javascript:;"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="javascript:;"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="javascript:;"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="javascript:;"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="javascript:;"><i class="ion-android-star-outline"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price_box"> 
                                                            <span class="current_price">Rm {{$item->price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    </div>
                </div> 

            </div>
        </div>
    </div>
@endsection
