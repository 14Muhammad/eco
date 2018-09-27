<?php
require "functions/functions.php";
include ('functions/db_connect.php');
$image=$_GET['i'];
$chkimg="select from products where pro_image='$image'";
$run_title=mysqli_query($con,$chkimg);
$count=mysqli_num_rows($run_title);
if($count>0){
    echo"Image already exist";
}