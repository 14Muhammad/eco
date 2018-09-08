<?php
		include ('functions/db_connect.php');
		$cat_id=$_POST['id'];
		$cat_title=$_POST['cat_title'];
		
		


		$sql1="UPDATE `categories` SET `cat_title`='$cat_title' WHERE cat_id=$cat_id";
		$run=mysqli_query($con,$sql1);
		header("refresh:1 ; URL=index.php?view_categories");

?>