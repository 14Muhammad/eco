<?php
include ('functions/db_connect.php');
global $con;
if(isset($_GET['del'])){
    $delete=$_GET['del'];
    $del_pro = "delete from products where pro_id='$delete' ";
    $run_del = mysqli_query($con,$del_pro);
    if( $run_del>0){
        echo" Successfully deleted ";
    }
}
?>