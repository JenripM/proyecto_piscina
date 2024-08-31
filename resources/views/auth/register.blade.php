<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/assets/images/favicon.png') }}" type="image/png">
    <title>Registro</title>
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

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

                        <h2 class="header-title text-center">Registrate</h2>
                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="block text-sm text-gray-800"
                                    :value="__('name')">Nombres y Apellidos: </label>
                                <input type="text" id="name" name="name" :value="old('name')" required autofocus
                                    class="form-control ">
                            </div>
                            <div class="form-group">
                                <label for="email" class="block text-sm text-gray-800"
                                    :value="__('email')">Email: </label>
                                <input type="email" id="email" name="email" :value="old('email')" required autofocus
                                    class="form-control ">
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="password" class="block text-sm text-gray-800"
                                        :value="__('Password')">Password</label>
                                    <input type="password" id="password" name="password" required
                                        autocomplete="new-password"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="password" class="block text-sm text-gray-800"
                                        :value="__('Confirm Password')">Confirmar Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        autocomplete="new-password"
                                        class="form-control">
                                </div>
                            </div>

                        
                            <div class="form-group">
                                <input type="submit" value="Registrar" class="btn btn-primary btn-block">
                            </div>

                            <p class="mt-8 text-xs font-light text-center text-gray-700"> Ya tienes cuenta? <a href="{{route('login')}}"
                                class="font-medium text-blue-600 hover:underline">Login</a></p>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- End core plugin -->


</body>

</html>
