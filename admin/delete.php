<?php
include ('functions/db_connect.php');


global  $con;
if(isset($_GET['delete']))
{
        $del=$_GET['delete'];
        $del_pro = "delete from Products where pro_id='$del'";
        $run_del = mysqli_query($con, $del_pro);

        echo"Deleted!!";
}
?>