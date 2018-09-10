<?php
if(isset($_GET['del_cat'])){
    $del_id = $_GET['del_cat'];
    $del_pro = "delete from categories where cat_id='$del_id'";
    $run_del = mysqli_query($con,$del_pro);
    if($run_del){
        header('location: index.php?view_categories');
    }

}