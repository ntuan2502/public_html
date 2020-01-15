<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Đăng nhập</title>

	<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/logo.png')}}">
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
	@csrf

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="formSignin">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>

					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
						<div>
							<a href="/forgotPassword" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> -->

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="/login/facebook" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>
						<!-- <a href="/login/google" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-google" aria-hidden="true"></i>
						</a> -->
					</div>
				</form>
				<div class="login100-more" style="background-image: url({{$vsp_background->value}})">
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
	<!-- <script src="{{asset('public/login/js/main.js')}}"></script> -->
	<script src="{{asset('public/token.js')}}"></script>

	<script>
		$(document).ready(function() {
			$('#formSignin').submit(function(e) {
				e.preventDefault();
				var j_email = $('[name=email]');
				var j_password = $('[name=password]')
				var email = j_email.val();
				var password = j_password.val();
				var flag = true;
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

				if (email.length == 0) {
					if(password.length > 0){
						hideValidate(j_password);
					}
					j_email.parent().attr('data-validate', 'Email is required');
					flag = false;
				}
				if (password.length == 0) {
					if(email.length > 0){
						hideValidate(j_email);
					}
					j_password.parent().attr('data-validate', 'Password is required');
					flag = false;
				}

				if (email.length > 0 && regex.test(email) == false) {
					j_email.parent().attr('data-validate', 'Please enter a valid email address')
					flag = false;
				}

				if (flag == false) {
					return false;
				}

				$.ajax({
					url: '/login',
					type: 'post',
					data: {
						email: email,
						password: password,
					},
					error: function(err) {
						console.log(err);
					},
					success: function(data) {
						console.log(data);
						if (data.status === 0) {
							j_email.parent().attr('data-validate', 'Wrong account or password');
							j_password.parent().attr('data-validate', 'Wrong account or password');
							showValidate(j_email);
							showValidate(j_password);
						} else {
							window.location.href = data.redirect;
						}
					}
				});
				return false;
			});
		});
	</script>

	<script>
		$('.input100').each(function() {
			$(this).on('blur', function() {
				if ($(this).val().trim() != "") {
					$(this).addClass('has-val');
				} else {
					$(this).removeClass('has-val');
				}
			})
		})


		var input = $('.validate-input .input100');
		$('.validate-form').on('submit', function() {
			var check = true;
			for (var i = 0; i < input.length; i++) {
				if (validate(input[i]) == false) {
					showValidate(input[i]);
					check = false;
				}
			}
			return check;
		});


		$('.validate-form .input100').each(function() {
			$(this).focus(function() {
				hideValidate(this);
			});
		});

		function validate(input) {
			if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
				if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
					return false;
				}
			} else {
				if ($(input).val().trim() == '') {
					return false;
				}
			}
		}

		function showValidate(input) {
			var thisAlert = $(input).parent();
			$(thisAlert).addClass('alert-validate');
		}

		function hideValidate(input) {
			var thisAlert = $(input).parent();
			$(thisAlert).removeClass('alert-validate');
		}
	</script>

</body>

</html>