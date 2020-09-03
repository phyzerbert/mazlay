@extends('layouts.frontend.master')

@section('content')

    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">{{__('page.billing_details')}}</h3>
                        <form method="POST" action="{{route('save_customer')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>{{__('page.country')}} <span class="required">*</span></label>
                                        @php
                                            $countries = \App\Models\Country::all();
                                        @endphp
                                        <div class="select-box">
                                            <select class="form-control" name="country" id="country_select">
                                                @foreach ($countries as $item)
                                                    <option value="{{$item->id}}" data-value="{{$item->phone_code}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('country')
                                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('page.name_as_ic')}} <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="name_as_ic" required />
                                        @error('country')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('page.phone_number')}} <span class="required">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="phone_code">+60</span>
                                            </div>
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                        @error('phone_number')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('page.address')}} <span class="required">*</span></label>
                                        <input type="text" name="address" class="form-control" required>
                                        @error('address')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>{{__('page.postcode')}}</label>
                                        <input type="text" name="postcode" class="form-control">
                                        @error('postcode')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg" style="width: 150px">{{__('page.confirm')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#country_select").change(function(){
                let phone_code = $(this). children("option:selected").data('value');
                $("#phone_code").text(phone_code);
            });
        });
    </script>
@endsection

