<!DOCTYPE html>
<?php
session_start();
require "functions/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <style>
        .main_wrapper {
            background-color: pink;
        }
        .cats a {
            color: orange;
            font-size: 16px;
        }
        .cats a:hover {
            color: white;
        }
    </style>
</head>
<body>
<div class="main_wrapper">
    <div class="header_wrapper">
        <a href="index.php"><img id="logo" src="images/logo.jpg"></a>
        <img id="banner" src="images/banner.gif">
    </div>
    <div class="menubar">
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="my_account.php">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div id="form">
            <form method="get" action="results.php">
                <input type="text" name="user_query" placeholder="Search products">
                <input type="submit" name="search" value="Search">
            </form>
        </div>
    </div>
    <div class="content_wrapper">
        <div id="sidebar">
            <div class="sidebar_title">My Account </div>
            <ul class="cats">
                <?php
                    $user = $_SESSION['customer_email'];
                    $get_img = "select * from customers where cust_email='$user'";
                    $run_img = mysqli_query($con, $get_img);
                    $row_img = mysqli_fetch_array($run_img);
                    $c_image = $row_img['cust_image'];
                    $c_name = $row_img['cust_name'];
                    echo "<img src='customer/customer_images/$c_image' width='150' height='150' 
                            style='border: 2px solid white;border-radius: 50%;'>"
                ?>
                <li><a href="my_account.php?my_orders">My Orders</a></li>
                <li><a href="my_account.php?edit_account">Edit Account</a></li>
                <li><a href="my_account.php?change_pass">Change Password</a></li>
                <li><a href="my_account.php?del_account">Delete Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="content_area">
            <div class="shopping_cart">
                <?php cart(); ?>
                <span style="float: right;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                    <?php
                        if(isset($_SESSION['customer_email'])){
                            echo "Welcome ".$_SESSION['customer_email'];
                            echo "<a style='color: orange;' href='../logout.php'> Logout</a>";
                        } else {
                            header('location: index.php');
                        }
                    ?>
                    </span>
            </div>
            <div class="products_box">
                <?php
                    if(!isset($_GET['my_orders'])) {
                        if (!isset($_GET['edit_account'])) {
                            if (!isset($_GET['change_pass'])) {
                                if (!isset($_GET['del_account'])) {
                                    echo "<h2 style='padding: 20px;'> Welcome:  $c_name </h2>";
                                    echo "<b>you can see your orders' progress by clicking this <a href='my_account.php?my_orders'> link </a></b>";
                                }
                            }
                        }
                    }
                ?>
                <?php
                    if(isset($_GET['edit_account'])){
                        include ('edit_account.php');
                    }else
                    if(isset($_GET['change_pass'])){
                        include ('change_pass.php');
                    }else
                    if(isset($_GET['del_account'])){
                        include ('del_account.php');
                    }

                ?>


            </div>

        </div>
    </div>
    <div id="footer">
        <h2> &copy; 2018 by Muhammad Ali Makhdoom</h2>
    </div>
</div>
</body>
</html>