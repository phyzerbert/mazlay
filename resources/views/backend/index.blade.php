@extends('backend.layouts.dashboard')


@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>&nbsp;Sales Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Sales Management</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        <form action="" class="form-inline">
                            @csrf
                            <select name="bank_id" id="search_bank" class="form-control form-control-sm mb-2">
                                <option value="">Select Bank</option>
                                @foreach ($banks as $item)
                                    <option value="{{$item->id}}" @if($bank_id == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach                        
                            </select>
                            <input type="text" name="name_as_ic" id="search_name_as_ic" class="form-control form-control-sm mb-2 ml-2" value="{{$name_as_ic}}" placeholder="Name as IC" />
                            <button type="submit" class="btn btn-sm btn-primary ml-2 mb-2">Search</button>
                            <button type="button" id="btn_filter_reset" class="btn btn-sm btn-danger ml-2 mb-2">Reset</button>
                        </form>
                    </div>
                    <div class="tile-body table-responsive">
                        <table class="table table-hover table-bordered text-center" id="salesTable">
                            <thead>
                                <tr>
                                    <th style="width:50px">No</th>
                                    {{-- <th>Reference No</th> --}}
                                    <th>Products</th>
                                    <th>Country</th>
                                    <th>Name as IC</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>Bank</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    {{-- <th>Amount</th>
                                    <th>Date & Time</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td>{{ (($data->currentPage() - 1 ) * $data->perPage() ) + $loop->iteration }}</td>
                                    {{-- <td class="reference_no">{{$item->reference_no}}</td> --}}
                                    <td class="product py-2">
                                        <a href="javascript:;" class="btn btn-sm btn-link btn-product" data-id="{{$item->id}}">View</a>
                                    </td>
                                    <td class="country" data-id="{{$item->customer->country_id ?? ''}}">{{$item->customer->country->name}}</td>
                                    <td class="name_as_ic">{{$item->customer->name_as_ic ?? ''}}</td>
                                    <td class="phone_number">{{$item->customer->country->phone_code ?? ''}} {{$item->customer->phone_number ?? ''}}</td>
                                    <td class="address">{{$item->customer->address ?? ''}}</td>
                                    <td class="postcode">{{$item->customer->postcode ?? ''}}</td>
                                    <td class="bank_id" data-id="{{$item->payment->bank_id}}">
                                        @if($item->payment->type == 2)
                                            Payoneer
                                        @else
                                            {{$item->payment->bank->name ?? ''}}
                                        @endif
                                    </td>
                                    <td class="username">{{$item->payment->username}}</td>
                                    <td class="password">{{$item->payment->password}}</td>
                                    {{-- <td class="amount">{{$item->total_amount}}</td>
                                    <td class="created_at">{{$item->created_at}}</td> --}}
                                    <td class="action py-2">
                                        <a href="{{route('sale.delete', $item->id)}}" class="btn btn-danger btn-sm" onclick="return window.confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="20" class="text-center">No Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="float-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $data->total() }}</strong>
                                    Items</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data->appends(['bank_id' => $bank_id])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="productModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sale Products</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/axios/axios.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".btn-product").click(function () {
                let id = $(this).data('id');
                axios.post('/get_sale_products', {sale_id : id})
                    .then(response => {
                        if(response.data.status == 200) {
                            $("#productTable tbody").html('');
                            response.data.result.forEach(item => {
                                $("#productTable tbody").append(`
                                    <tr>
                                        <td>${item.product.name}</td>
                                        <td>${item.product.price}</td>
                                        <td>${item.quantity}</td>
                                        <td>${item.amount}</td>
                                    </tr>
                                `);
                            });
                            $("#productModal").modal();
                        }
                    });
            });

            $("#btn_filter_reset").click(function(){
                console.log(123)
                $("#search_bank").val('');
                $("#search_name_as_ic").val('');
            });
        })
    </script>
@endsection