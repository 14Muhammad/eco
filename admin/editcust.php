<?php
	include ('functions/db_connect.php');
	if(isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$sql=mysqli_query($con,"select * from customers where cust_id=$id");
		$row=mysqli_fetch_array($sql);
		
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	table{
  		text-align: center;
  	}
  	input{
  		width: 500px;
  	}
  	
  </style>
</head>
<body>
	<div class="table-responsive">
		<form action="editcustu.php" method="POST">
		<table class="table" >
			<input type="hidden" name="id" value="<?php echo $row['cust_id']?>">
			<tr>
				<td colspan="2" align="center">
					<h1>Edit Customers</h1>
				</td>
			</tr>
			<tr>
				<td>
					<label>Name </label>
				</td>
				<td>
					<input type="text" name="cust_name" value="<?php echo $row['cust_name']?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Email </label>
				</td>
				<td>
					<input type="text" name="cust_email" value="<?php echo $row['cust_email']?>" >
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					<label>Password </label>
				</td>
				<td>
					<input type="text" name="cust_pass" value="<?php echo $row['cust_pass']?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Country </label>
				</td>
				<td>
					<input type="text" name="cust_country" value="<?php echo $row['cust_country']?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label>City</label>
				</td>
				<td>
					<input type="text" name="cust_city" value="<?php echo $row['cust_city']?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Contact</label>
				</td>
				<td>
					<input type="text" name="cust_contact" value="<?php echo $row['cust_contact']?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Address</label>
				</td>
				<td>
					<input type="text" name="cust_address" value="<?php echo $row['cust_address']?>" >
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Update">
				</td>
			</tr>
		</table>
		</form>
		
	</div>
</body>
</html>