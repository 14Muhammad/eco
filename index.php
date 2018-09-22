<!DOCTYPE html>
<?php
session_start();
require "functions/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta class="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Shop</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <script>
        function check_input(q){
            console.log(q);
            if(q == ''){
                document.getElementById('products_box').innerHTML = '';
            }
            else {
                var http = new XMLHttpRequest();
                http.onreadystatechange = function () {
                    if (http.readyState == 4 && http.status == 200){
                        document.getElementById('products_box').innerHTML = http.responseText;
                    }
                }
                http.open('get','search_products.php?pro=' + q);
                http.send();
            }
        }


    </script>
</head>
<body>
    <div class="main_wrapper" >
        <div class="header_wrapper">
                <a href="index.php"><img class="col-sm-9" id="logo" src="images/logo.jpg"></a>
                <img class="row-md-9" id="banner" src="images/banner.gif">

        </div>
        <div class="menubar" class="container">
            <ul id="menu" class="col-sm-12">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="#">Contact Us</a></li>

            </ul>
            <div id="form">
                <form method="get" action="results.php">
                   <div class="row">
                       <input type="text" name="user_query" onkeyup="check_input(this.value)" placeholder="Search products">
                       <input type="submit" name="search" value="Search">

                   </div>
                </form>
            </div>
        </div>
        <div class="content_wrapper" class="col-md-9">
            <div id="sidebar">
                <div class="sidebar_title">Categories </div>
                <ul class="cats">
                    <?php getCats(); ?>
                </ul>
                <div class="sidebar_title">Brands </div>
                <ul class="cats">
                    <?php getBrands(); ?>
                </ul>
            </div>
            <div id="content_area"     style="background-color: #9E9E9E;">
                <div class="shopping_cart" class="col-sm-9">
                    <?php cart(); ?>
                    <span style="float: right;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                        <?php
                        if(!isset($_SESSION['customer_email']))
                            echo "Welcome guest!";
                        else
                            echo "Welcome ".$_SESSION['customer_email'];
                         ?>
                        <b style="color: yellow">
                            Shopping Cart - </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?>
                        <a style="color: yellow" href="cart.php">Go to Cart</a>

                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a style='color: orange;' href='checkout.php'>Login</a>";
                            }
                            else{
                                echo "<a style='color: orange;' href='logout.php'>Logout</a>";
                            }
                        ?>
                    </span>
                </div>
                <div id="products_box" class="col-sm-12" class="products_box" class="img-thumbnail zoom">
                    <?php getPro(); ?>
                </div>

            </div>
        </div>
        <div id="footer">
            <h2> &copy; 2018 by Muhammad ali Makhdoom</h2>
        </div>
    </div>
</body>
</html>