<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['del_brand'])){
    $del_id = $_GET['del_brand'];
    $del_pro = "delete from brands where brand_id='$del_id'";
    $run_del = mysqli_query($con,$del_pro);
    if($run_del){
        header('location: index.php?view_brands');
    }
}