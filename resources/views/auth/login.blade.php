<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/png">
    <title>Iniciar Sesion</title>
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="sticky-header" style="background-image: url(fondo.jpg); background-size: cover; height:100vh">


    <!--Start login Section-->
    <section class="login-section">
        <div class="container">
            <div class="row">
                <div class="login-wrapper">
                    <div class="login-inner">

                        <div class="logo">
                            <img src="assets/images/logo-dark.png" alt="logo" />
                        </div>

                        <h2 class="header-title text-center">Login</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="block text-sm text-gray-800"
                                    :value="__('email')">Email</label>
                                <input type="email" id="email" name="email" :value="old('email') " required
                                    autofocus
                                    class="form-control ">
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="password" class="block text-sm text-gray-800"
                                        :value="__('Password')">Password</label>
                                    <input type="password" id="password" name="password" required
                                        autocomplete="current-password"
                                        class="form-control">
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-xs text-gray-600 hover:underline">Forget Password?</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="pull-left">
                                    <div class="checkbox primary">
                                        <input id="checkbox-2" type="checkbox">
                                        <label for="checkbox-2">Remember me</label>
                                    </div>
                                </div>

                                <div class="pull-right">
                                    <a href="reset-password.html" class="a-link">
                                        <i class="fa fa-unlock-alt"></i> Forgot password?
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-primary btn-block">
                            </div>

                            <p class="mt-8 text-xs font-light text-center text-gray-700"> No tienes cuenta? <a href="{{route('register')}}"
                                class="font-medium text-blue-600 hover:underline">Register</a></p>
                        </form>

                        <div class="copy-text">
                            <p class="m-0">2017 &copy; Meter admin</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End login Section-->

    <!--Begin core plugin -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- End core plugin -->


</body>

</html>
