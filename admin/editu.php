<?php
		include ('functions/db_connect.php');
		$pro_id=$_POST['id'];
		$pro_title=$_POST['pro_title'];
		$pro_price=$_POST['pro_price'];
		$pro_desc=$_POST['pro_desc'];
		$pro_keywords=$_POST['pro_keywords'];

		


		$sql1="UPDATE `products` SET `pro_title`='$pro_title',`pro_price`='$pro_price',`pro_desc`='$pro_desc',`pro_keywords`='$pro_keywords' WHERE pro_id=$pro_id";
		$run=mysqli_query($con,$sql1);
		header("refresh:1 ; URL=index.php?view_products");

?>