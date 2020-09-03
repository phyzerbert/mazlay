@extends('backend.layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-cog"></i>&nbsp;Setting</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Setting</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body font-weight-bold">
                    <form action="{{route('setting.update')}}" method="post">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$setting->email}}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="">WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{$setting->whatsapp}}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Total Amount</label>
                            <input type="text" name="total_amount" class="form-control" value="{{$setting->total_amount}}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Checkout Page Footer Text</label>
                            <textarea name="invoice_description" class="form-control" rows="3">{{$setting->invoice_description}}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Header Text</label>
                            <input type="text" name="header_text" class="form-control" value="{{$setting->header_text}}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Footer Text</label>
                            <textarea name="footer_text" id="footer_text" class="form-control" rows="3">{{$setting->footer_text}}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">About Us</label>
                            <textarea name="about_us" id="about_us" class="form-control" rows="3">{{$setting->about_us}}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Warranty</label>
                            <textarea name="warranty" id="warranty" class="form-control" rows="3">{{$setting->warranty}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save fa-lg mr-2"></i>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        // $(".custom-file-input").on("change", function() {
        //     var fileName = $(this).val().split("\\").pop();
        //     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        // });

        $("#about_us").summernote();
        $("#warranty").summernote();
    });
</script>
@endsection
