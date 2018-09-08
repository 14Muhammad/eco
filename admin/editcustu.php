<?php
		include ('functions/db_connect.php');
		$cust_id=$_POST['id'];
		$cust_name=$_POST['cust_name'];
		$cust_email=$_POST['cust_email'];
		$cust_pass=$_POST['cust_pass'];
		$cust_country=$_POST['cust_country'];
		$cust_city=$_POST['cust_city'];
		$cust_contact=$_POST['cust_contact'];
		$cust_address=$_POST['cust_address'];
		
		


		$sql1="UPDATE `customers` SET `cust_name`='$cust_name',`cust_email`='$cust_email',`cust_pass`='$cust_pass',`cust_country`='$cust_country',`cust_city`='$cust_city',`cust_contact`='$cust_contact',`cust_address`='$cust_address' WHERE cust_id='$cust_id'";
		$run=mysqli_query($con,$sql1);
		header("refresh:1 ; URL=index.php?view_customers");

?>