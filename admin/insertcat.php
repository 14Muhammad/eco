<?php
		include ('functions/db_connect.php');

		$cat_title=$_POST['cat_title'];
		$sql="INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$cat_title')";
		$run=mysqli_query($con,$sql);
		header("refresh:1 ; URL=index.php?insert_category");

?>