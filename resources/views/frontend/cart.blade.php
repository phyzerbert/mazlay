@extends('layouts.frontend.master')

@section('content')
    <!--shopping cart area start -->
    <div class="cart_page_bg" id="page">
        <div class="container">
            <div class="shopping_cart_area">
                <form action="javascript:;"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove"></th>
                                                <th class="product_thumb">{{__('page.product')}}</th>
                                                <th class="product_name">{{__('page.name')}}</th>
                                                <th class="product-price">{{__('page.price')}}</th>
                                                <th class="product_quantity">{{__('page.quantity')}}</th>
                                                <th class="product_total">{{__('page.total')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) of cart">
                                                <td class="product_remove">
                                                    <a href="javascript:;" @click="removeProduct(index)"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_thumb">
                                                    <a href="javascript:;"><img :src="item.product.image" alt=""></a>
                                                </td>
                                                <td class="product_name"><a href="javascript:;">@{{item.product.name}}</a></td>
                                                <td class="product-price">RM @{{item.product.price}}</td>
                                                <td class="product_quantity"><label>Quantity</label> <input min="0" max="100" value="1" type="number" v-model="item.quantity"></td>
                                                <td class="product_total">RM @{{sub_total(item)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                        <!--coupon code area start-->
                    <div class="coupon_area col-12">
                        <div class="row justify-content-end">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>{{__('page.total')}}</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount"><b>RM <span>@{{get_total}}</span></b></p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="javascript:;" @click="saveCart()">{{__('page.proceed_to_checkout')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>   
            </div>
        </div>
    </div>
    <!--shopping cart area end -->
@endsection
@section('script')
    <script src="{{ asset('plugins/vuejs/vue.min.js') }}"></script>
    <script src="{{ asset('plugins/axios/axios.min.js') }}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>
@endsection