<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} : {{ $siteTitle??"Dashboard" }}</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/chicago/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/chicago/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/chicago/css/_all-skins.min.css">
    <link rel="stylesheet" href="/chicago/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="/chicago/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/chicago/css/style.css">
    <link rel="stylesheet" href="/chicago/plugins/toaster/toastr.min.css">
    <link rel="stylesheet" href="/chicago/plugins/pace/pace.min.css">

    <!-- jQuery 3 -->
    <script src="/chicago/js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Material Design -->
    <!-- <link rel="stylesheet" href="/chicago/css/bootstrap-material-design.min.css"> -->
    <!-- <link rel="stylesheet" href="/chicago/css/ripples.min.css">
    <link rel="stylesheet" href="/chicago/css/MaterialAdminLTE.min.css"> -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
    @include('layouts.partials.header')
    <!-- Left side column. contains the logo and sidebar -->
    <?php if (!Auth::guest()) { ?>
        @include('layouts.partials.sidebar')
    <?php } ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="#content">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2002-{{date('Y')}} <a href="https://www.chicagogreeter.com/">Chicagogreeter</a>.</strong>All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 3.3.7 -->
    <script src="/chicago/js/bootstrap.min.js"></script>
    <script src="/chicago/js/jquery.validate.min.js"></script>
    <!-- FastClick -->
    <script src="/chicago/js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/chicago/js/adminlte.min.js"></script>

    <script src="/chicago/plugins/toaster/toastr.min.js"></script>
    <script src="/chicago/js/base.js"></script>
    <!-- PACE -->
    <script src="/chicago/plugins/pace/pace.min.js"></script>

    <!-- Material Design -->
   <!--  <script src="/chicago/js/material.min.js"></script>
    <script src="/chicago/js/ripples.min.js"></script>
    <script>
        $.material.init();
    </script> -->
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

      @if(Session::has('message'))
        var type = "{{ Session::get('alert-type') }}";
        switch(type){
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;

            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            default:
                toastr.success("{{ Session::get('message') }}");
                break;
        }
      @endif
    </script>
</body>
</html>