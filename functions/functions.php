<?php
require "./includes/db_connetion.php";

//getting Categories
function getCats(){
    global $con;
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);
    while ($row_cats= mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "<li><a href='index.php?cat=$cat_id'> $cat_title </a></li>";
    }
}

//getting Brands
function getBrands(){
    global $con;
    $get_brands = "select * from brands";
    $run_brands = mysqli_query($con, $get_brands);
    while ($row_brands= mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        echo "<li><a href='index.php?brand=$brand_id'> $brand_title </a></li>";
    }
}

function getPro($flag = ''){
    global $con;
    $get_pro = "";
    if(!isset($_GET['cat']) && !isset($_GET['brand']) && !isset($_GET['search'])) {
        if($flag == 'all_products')
            $get_pro = "select * from products";
        else
            $get_pro = "select * from products order by RAND() limit 0,6";
    } else if(isset($_GET['cat'])){
        $pro_cat_id = $_GET['cat'];
        $get_pro = "select * from products where pro_cat = '$pro_cat_id'";
    } else if(isset($_GET['brand'])){
        $pro_brand_id = $_GET['brand'];
        $get_pro = "select * from products where pro_brand = '$pro_brand_id'";
    } else if(isset($_GET['search'])){
        $search_query = $_GET['user_query'];
        $get_pro = "select * from products where pro_keywords like '%$search_query%'";
    }
    $run_pro = mysqli_query($con,$get_pro);
    $count_pro = mysqli_num_rows($run_pro);
    if($count_pro==0){
        echo "<h2> No Product found in selected criteria </h2>";
    }
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['pro_id'];
        $pro_cat = $row_pro['pro_cat'];
        $pro_brand = $row_pro['pro_brand'];
        $pro_title = $row_pro['pro_title'];
        $pro_price = $row_pro['pro_price'];
        $pro_image = $row_pro['pro_image'];
        echo "
                <div class='single_product'>
                    <h3>$pro_title</h3>
                    <img src='admin/product_images/$pro_image' width='180' height='180'>
                    <p> <b> Rs $pro_price/-  </b> </p>
                    <a href='details.php?pro_id=$pro_id' style='float: left'>Details</a>
                    <a href='index.php?add_cart=$pro_id'><button style='float: right;'>Add to Cart</button></a>
                </div>
        ";
    }
}
//getting the user IP address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
//creating the shopping cart
function cart(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add = '$ip' AND p_id='$pro_id '";
        $run_check = mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        } else {
            $insert_pro = "insert into cart (p_id, ip_add) VALUES
                      ('$pro_id','$ip')";
            $run_pro = mysqli_query($con,$insert_pro);
            if($run_pro)
                header('location:'.$_SERVER['PHP_SELF']);
        }
    }
}
//getting the total added items.
function total_items(){
    global $con;
    $ip = getIp();
    $get_items = "select * from cart where ip_add='$ip'";
    $run_items = mysqli_query($con,$get_items);
    $count_items = 0;
    while($row = mysqli_fetch_array($run_items))
        $count_items += $row['qty'];
    echo $count_items;
}
//getting the total price of the items in the cart
function total_price(){
    global $con;
    $ip = getIp();
    $total = 0;
    $sel_price = "select * from cart where ip_add = '$ip'";
    $run_price = mysqli_query($con,$sel_price);
    while($cart_row = mysqli_fetch_array($run_price)){
        $pro_id = $cart_row['p_id'];
        $pro_qty = $cart_row['qty'];
        $pro_price = "select * from products where pro_id = '$pro_id'";
        $run_pro_price = mysqli_query($con, $pro_price);
        while ($pro_row = mysqli_fetch_array($run_pro_price)){
            $pro_price = $pro_row['pro_price'];
            $pro_price_all_items = $pro_price * $pro_qty;
            $total += $pro_price_all_items;
        }
    }
    echo 'Rs '.$total.'/-';
}
