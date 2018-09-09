<?php
include ('functions/db_connect.php');
if(isset($_GET['del']))
{
	$id=$_GET['del'];
	$sql= "DELETE FROM `cart` WHERE `p_id` = $id";
	$run =mysqli_query($con,$sql);
	if($run)
	{
		echo '<script>alert("Deleted Successfully");</script>';
		header("refresh:2;URL=index.php?view_orders");
	}
	else
	{
		echo '<script>alert("Error while deleting order");</script>';
	}
}


?>