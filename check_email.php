<?php
require "functions/functions.php";
$e = $_REQUEST["e"];
$sel_email = "select * from customers where cust_email= '$e'";
$run_email  = mysqli_query($con,$sel_email);
$count = mysqli_num_rows($run_email);
if($count>0){
    echo "Email already registered";
}