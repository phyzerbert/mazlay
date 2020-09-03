@php
    $setting = \App\Models\Setting::first();
@endphp
<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="widgets_container">
                        <h3>CONTACT INFO</h3>
                        <div class="footer_contact">
                           <div class="footer_contact_inner">
                                <div class="contact_icone">
                                    <img src="{{asset('frontend/img/icon/icon-phone.png')}}" alt="">
                                </div>
                                <div class="contact_text">
                                    <p>{{__('page.email')}}: <br> <strong><a href="mailto:{{$setting->email}}">{{$setting->email}}</a> </strong></p>
                                </div>
                            </div>
                            <p>{{$setting->footer_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                   <div class="footer_col_container">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="javascript:;">Delivery Information</a></li>
                                    <li><a href="javascript:;">New products</a></li>
                                    <li><a href="javascript:;">Best sales</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="javascript:;">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets_container widget_menu">
                            <h3>Customer Service</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                    <li><a href="javascript:;">Prices drop</a></li>
                                    <li><a href="javascript:;">Order History</a></li>
                                    <li><a href="javascript:;">International Orders</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets_container widget_menu">
                            <h3>My Account</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="javascript:;">Sitemap</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="javascript:;">Delivery Information</a></li>
                                    <li><a href="javascript:;">Order History</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                    <li><a href="javascript:;">Specials</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets_container widget_menu">
                            <h3>Extras</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="javascript:;">Brands</a></li>
                                    <li><a href="javascript:;">Gift Certificates</a></li>
                                    <li><a href="javascript:;">Affiliate</a></li>
                                    <li><a href="javascript:;">Specials</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                    <li><a href="javascript:;">Newsletter</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widgets_container widget_menu">
                            <h3>Payment & Methods</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="javascript:;">Payment Methods</a></li>
                                    <li><a href="javascript:;">My Account</a></li>
                                    <li><a href="javascript:;">View All Amazing Deals</a></li>
                                    <li><a href="javascript:;">Locations We Ship To</a></li>
                                    <li><a href="javascript:;">FAQs</a></li>
                                    <li><a href="javascript:;">Estimated Delivery Time</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2020 <a href="javascript:;">Mazlay</a>  All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                   <div class="footer_payment text-right">
                        <img src="{{asset('frontend/img/icon/payment.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>   
</footer>
<!--footer area end-->