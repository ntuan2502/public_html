<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('public/login/images/icons/favicon.ico')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/animate/animate.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/css/util.css')}}">
	<link rel="stylesheet" href="{{asset('public/login/css/main.css')}}">
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Forgot Password
					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset Password
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="/login" class="txt1">
								Signin
							</a>
							or
							<a href="/register" class="txt1">
								Signup
							</a>
						</span>
					</div>

				</form>

				<div class="login100-more" style="background-image: url({{asset('public/login/images/bg-01.jpg')}})">
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('public/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('public/login/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('public/login/js/main.js')}}"></script>

</body>

</html>