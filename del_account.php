<?php
$user = $_SESSION['customer_email'];
if(isset($_POST['yes'])){
    $del_cust = "delete  from customers where cust_email='$user'";
    mysqli_query($con,$del_cust);
    header('location: logout.php');
}
if(isset($_POST['no'])){
    header('location: my_account.php');
}
?>
<br>
<h2 style="text-align: center";>Do you really want to DELETE your account? </h2>
<br>
<form action="" method="post">
    <input type="submit" name="yes" value="Yes I want">
    <input type="submit" name="no" value="No I was Joking">
</form>