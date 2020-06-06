<?php  
 
 	// connect to database
	include('db/connection.php');
	 
	$insertdata="";
	$nocity="";

	if($myid=="for_display")
	{

		if (count($dbcities) > 0) { ?>
	  <div class="error">
		
		  <?php include('displaycities.php') ?></p>
	  	
 	 </div>

		<?php  }
		if($nocity !="")
		{  echo $nocity;}

	}


	 
	if($myid=="for_crud"){
		// session_start();

	// variable declaration
	$errors = array();
	
		//upadate city
		if (isset($_GET['op'])&&$_GET['op']==1) {

			$id=$_GET['id'];
			$status=$_GET['status'];
			if($status==1){
				$status='yes';
			}
			else
			{
				$status='no';
			}
			$id = mysqli_real_escape_string($con,$id );
			$query = "update cities set alert='$status' where id='$id'";
			 
			if (mysqli_query($con, $query)) {
				$insertdata= "Email Alert changed";
				header('location:home.php');
			}
			else
				{
					echo "mysql error";
				}
		}
		//delete city
		if (isset($_GET['op'])&&$_GET['op']==2) {

			$id=$_GET['id'];
			$id = mysqli_real_escape_string($con,$id );
			$query = "delete FROM cities WHERE id='$id'";
			 
			if (mysqli_query($con, $query)) {
				$insertdata= "City removed from favourite";
				header('location:home.php');
			}
			else
				{
					echo "mysql error";
				}
		}

			include('fetchcity.php');
				 //print_r($dbcities)   ;
			
			// city insert and fetch
			if (isset($_POST['save'])) {

				if(sizeof($dbcities)<5){
					//echo sizeof($dbcities);

					$country = $_POST['country_name'];  
					$cityid = $_POST['cities_id'];  
					$cityname=$_POST['cities_names'];

					if($cityname!='Select city'){

						// receive all input values from the form
						$country = mysqli_real_escape_string($con, $country);
						$cityid = mysqli_real_escape_string($con, $cityid);
						$cityname = mysqli_real_escape_string($con, $cityname);
						$userid=$_SESSION['userid'];
				

						// form validation: ensure that the form is correctly filled
						if (empty($country)) { array_push($errors, "country is required"); }
						if (empty($cityname)) { array_push($errors, "city is required"); }



						// register city if there are no errors in the form
						if (count($errors) == 0) {
					
							$query = "INSERT INTO cities (country, cityid, cityname,userid) 
							  VALUES('$country', '$cityid', '$cityname','$userid')";
							if(mysqli_query($con, $query))
								$insertdata = "country :".$country." and city name :".$cityname."is selected in your's favourite cities";

							else
								$insertdata ="retry";
							include('fetchcity.php');
						}

					}

					
				}
				else
				{
					 array_push($errors, "city selection max limit is five");
				}
			}
			
			
	   } 


	  
?>  