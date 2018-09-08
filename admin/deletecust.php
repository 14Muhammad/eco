<?php
include ('functions/db_connect.php');
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	echo $id;
	$sql="DELETE FROM `customers` WHERE cust_id=$id";

	$run=mysqli_query($con,$sql);

	header("refresh:1 ; URL=index.php?view_customers");
}
?>