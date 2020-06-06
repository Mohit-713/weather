
<?php 
session_start(); 
	
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}


	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<div class="header">
		<br><br>
	</div>
	<div class="content">

		<?php if(isset($_GET['sendalert'])) include("sendemail.php");?>
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p style="margin-left: 20px">Welcome <strong><?php echo $_SESSION['username'];?>
			
			<?php include('selectcity.php')
			 ?></strong></p>
			<!-- <p> <a href="home.php?logout='1'" style="color: red;">logout</a> </p> -->

		<?php endif ?>
	</div>
		
</body>
<!-- <html>
<frameset cols="30%,75%">
<frame name='main' src="selectcity.php" scrolling=no resize=no>
<frame name='child' src="weatherinfo.php" scrolling=yes>
</frameset>
</html>
 -->
