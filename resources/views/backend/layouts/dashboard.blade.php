<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Open Graph Meta-->
        <meta property="og:image" content="{{asset('images/favicon.png')}}>
        <meta property="og:description" content="{{config('app.name')}} is the useful Accounting Web Application">
        <title>{{config('app.name')}}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('plugins/jqueryui-timepicker/dist/jquery-ui-timepicker-addon.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.min.css')}}"> --}}
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}">
        @yield('style')
    </head>
    <body class="app sidebar-mini rtl">
        <div id="ajax-loading" class="text-center">
            <img class="mx-auto" src="{{asset('images/loader.gif')}}" width="70" alt="" style="margin:45vh auto;">
        </div>
        <!-- Navbar-->
        <header class="app-header">
            @include('backend.layouts.header')
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            @include('backend.layouts.aside')
        </aside>
        <main class="app-content">
            @yield('content')
        </main>
        {{-- @include('elements.change_password') --}}
        <!-- Essential javascripts for application to work-->
        <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/main.js') }}"></script>
        {{-- <script src="{{ asset('backend/js/pusher.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('backend/js/notification.js') }}"></script> --}}
        <!-- The javascript plugin to display page loading on top-->
        <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        {{-- <script src="{{ asset('plugins/jqueryui-timepicker/dist/jquery-ui-timepicker-addon.min.js') }}"></script>
        <script src="{{asset('plugins/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/jquery.daterangepicker.min.js')}}"></script> --}}
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @yield('script')

        <!-- Google analytics script-->
        <script type="text/javascript">
            var notification = '<?php echo session()->get("success"); ?>';
            if(notification != ''){
                $.notify({
                    title: "Message : ",
                    message: notification,
                    icon: 'fa fa-check'
                },{
                    type: "success"
                });
            }

            var failed_string = '<?php echo session()->get("failed"); ?>';
            if(failed_string != ''){
                $.notify({
                    title: "Failed : ",
                    message: failed_string,
                    icon: 'fa fa-times-circle'
                },{
                    type: "info"
                });
            }


            var errors_string = '<?php echo json_encode($errors->all()); ?>';
            errors_string=errors_string.replace("[","").replace("]","").replace(/\"/g,"");
            var errors = errors_string.split(",");
            if (errors_string != "") {
                for (let i = 0; i < errors.length; i++) {
                    const element = errors[i];
                    $.notify({
                        title: "Error : ",
                        message: element,
                        icon: 'fa fa-exclamation-circle'
                    },{
                        type: "danger"
                    });
                }
            }
        </script>
    </body>
</html>
