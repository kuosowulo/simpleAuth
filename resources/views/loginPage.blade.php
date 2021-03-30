<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('/') }}loginPage/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/') }}loginPage/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<div class="login100-form-title" style="background-image: url('loginPage/images/loginPageBg.jpg')">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="/login">
					{{ csrf_field() }}
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" id="email" type="email" name="email" placeholder="Enter username" value="" required autofocus>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" id="password" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="{{ asset('/') }}loginPage/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/select2/select2.min.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{ asset('/') }}loginPage/vendor/countdowntime/countdowntime.js"></script>
	<script src="{{ asset('/') }}loginPage/js/main.js"></script>

</body>
</html>