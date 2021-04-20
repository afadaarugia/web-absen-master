<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN ABSENPLUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="shortcut icon" href="{{asset('/images/Logo_kota_Samarinda_mini.png')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/su/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/su/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="post" action="{{ url('/login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
						LOGIN ABSENPLUS
					</span>
                    
                    <br>

                    <!-- <span class="login100-form-title p-b-34 p-t-25">
                        AbsenDulu
                    </span> -->
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="email" placeholder="email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-30">
                        <a class="txt1" href="#">
                            Lupa Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/bootstrap/js/popper.js')}}"></script>
    <script src=""></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('/su/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/su/js/main.js')}}"></script>

</body>
</html>
