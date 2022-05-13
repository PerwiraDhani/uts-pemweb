<?php

require_once("config.php");

if(isset($_POST['register'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$no = $_POST['noHp'];

    $sql = "INSERT INTO donatur (nama, email, username, password, no_hp) 
            VALUES ('$name', '$email', '$username', '$password', '$no')";
    $stmt = mysqli_query($db, $sql);

    if($stmt){
		header("Location: login.php");
	} 
}

?>

<!DOCTYPE html>
<html lang="en">
	
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="" method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						SIGN UP
					</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="name" placeholder="Your Name" required>
						<span class="focus-input100"></span>
					</div>	

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="noHp" placeholder="Phone Number" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="email" name="email" placeholder="Email" required> 
						<span class="focus-input100"></span>
					</div>	

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<br>
							Already have an account?
							<br>
							<a href="login.php" class="txt1">
								Login Here
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
					<button class="login100-form-btn" name="register">
							SIGN UP
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="assets/vendor/animsition/js/animsition.min.js"></script>

	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/vendor/select2/select2.min.js"></script>

	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<
	<script src="assets/js/main.js"></script>

</body>
</html>