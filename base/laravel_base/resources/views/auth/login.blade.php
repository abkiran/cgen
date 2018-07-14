<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/chicago/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/chicago/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/chicago/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/chicago/css/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/chicago/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/chicago/css/_all-skins.min.css">
    <link rel="stylesheet" href="/chicago/css/style.css">
    <link rel="stylesheet" href="/chicago/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page" style="height:auto">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{{config('app.name', 'Laravel')}}</b> System</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ url('/login') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}{{ $errors->has('user') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username / Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span> @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                    @if ($errors->has('user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span> @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span> @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{url('password/reset')}}">I forgot my password</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="/chicago/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/chicago/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/chicago/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>