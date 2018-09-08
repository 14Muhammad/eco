<?php
		include ('functions/db_connect.php');
		$brand_id=$_POST['id'];
		$brand_title=$_POST['brand_title'];
		
		


		$sql1="UPDATE `brands` SET `brand_title`='$brand_title' WHERE brand_id=$brand_id";
		$run=mysqli_query($con,$sql1);
		header("refresh:1 ; URL=index.php?view_brands");

?>