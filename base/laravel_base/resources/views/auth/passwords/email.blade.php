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
            <a href="/"><b>Chicago</b> Greeter</a>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">{{ __('Reset Password') }}</div>
            <!-- /.login-logo -->
            <div class="box-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="/chicago/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/chicago/js/bootstrap.min.js"></script>
    <!-- iCheck -->
</body>

</html>