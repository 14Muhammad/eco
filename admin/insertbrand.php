<?php
		include ('functions/db_connect.php');

		$brand_title=$_POST['brand_title'];
		$sql="INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES (NULL, '$brand_title')";
		$run=mysqli_query($con,$sql);
		header("refresh:1 ; URL=index.php?insert_brand");

?>