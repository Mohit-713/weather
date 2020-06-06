<?php 
session_start();

if (isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: home.php');
	}
include('login/authentication.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('images/GgyrPf.jpg');">

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="index.php">

		<?php include('error/error.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="login/register.php">Sign up</a>
		</p>
	</form>


</body>
</html>