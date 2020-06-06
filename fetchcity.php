<?php			
			//session_start();
			//fetch data
			
			$query = "SELECT * FROM cities";
			
			if(!isset($_GET['sendalert'])){
				$userid=$_SESSION['userid'];
				$query .= " where userid='$userid'";
			}
			
			$results = mysqli_query($con, $query);
			$dbcities=array();


			if (mysqli_num_rows($results) > 0) {
				while($row = mysqli_fetch_assoc($results)) {
					 $arrayName = array('id' => $row["id"],'country' => $row["country"],'cityid' => $row["cityid"],'cityname' => $row["cityname"],'alert' => $row["alert"] );

					array_push($dbcities,$arrayName); 

					
				 }
				 }else {
				$nocity="No City is selected in favourite list";
			}
?>