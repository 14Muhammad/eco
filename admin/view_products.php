<?php include("functions.php"); ?>
<html lang="en">
<head>
    <title>Ecommerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initialscale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div>
        <a href="index.php"><img id="logo" style=" height:150px " src="../images/logo.jpg"></a>
        <img id="banner" src="../images/banner.gif"style=" height:150px;width:800px ">
    </div>
    <div>
        <div class="form-group" id="form" >
            <form class="navbar-form" method="get" action="results.php">
                <input type="text" class="form-control-range" name="user_query" placeholder="Search products">
                <input class="btn btn-success btn-block" type="submit" class="form-control" name="search" value="Search" >
            </form>
        </div>
    </div>
    <div id="content_area">
        <div class="container">
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
        <div class="products_box">
            <?php getPro('all_products'); ?>
        </div>

    </div>
</div>

</div>
<br><br>
<footer class="bg-warning text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                This is footer powered by <kbd>Farasat Ali Aziz</kbd>
            </div>
        </div>
    </div>
</footer>
</body>
</html>


<!--
<div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron text-center ">
        <h1>Products </h1>
        <ul class="list-group ">
   <php
            $get_products = "select * from products";
            $run_products = mysqli_query($con, $get_products);
            while ($row_products= mysqli_fetch_array($run_products)){
                $pro_id = $row_products['pro_id'];
                $pro_title = $row_products['pro_title'];
                $pro_brand = $row_products['pro_brand'];
                $pro_cat = $row_products['pro_cat'];
                $pro_price = $row_products['pro_price'];
                $pro_desc = $row_products['pro_desc'];
                $pro_image= $row_products['pro_image'];
                $pro_keywords = $row_products['pro_keywords'];

                echo "<li class='list-group-item'>$pro_title</li>";
				echo "<li class='list-group-item'>$pro_image</li>";


            }
            ?>
        </ul>
    </div>
</div>
-->