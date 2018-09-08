<?php
	include ('functions/db_connect.php');
	if(isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$sql=mysqli_query($con,"select * from categories where cat_id=$id");
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
  	body{
  		margin-top: 15%;
  	}
  </style>
</head>
<body>
	<div class="table-responsive">
		<form action="editcatu.php" method="POST">
		<table class="table" >
			<input type="hidden" name="id" value="<?php echo $row['cat_id']?>">
			<tr>
				<td colspan="2" align="center">
					<h1>Edit Category Name</h1>
				</td>
			</tr>
			<tr>
				<td>
					<label>Category Name </label>
				</td>
				<td>
					<input type="text" name="cat_title" value="<?php echo $row['cat_title']?>" >
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