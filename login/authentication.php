<?php 
	
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// connect to database
		include('../db/connection.php');
		// receive all input values from the form
		$name=$_POST['username'];
		$name = mysqli_real_escape_string($con,$name );
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			$query = "INSERT INTO user (name, email, password) 
					  VALUES('$name', '$email', '$password')";
			if(mysqli_query($con, $query))
			{
				array_push($errors, "registration Done!");
				header('location:../index.php');
			}
			else
				array_push($errors, "Something Wrong Try Again");

		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {

		// connect to database
		include('db/connection.php');
		
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		echo $password ;

		if (empty($email)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			echo $password ;

			$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) {

				$row = mysqli_fetch_assoc($results);
                
                $_SESSION["username"]=$row['name'];
                $_SESSION["userid"]=$row['id'];
                
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>