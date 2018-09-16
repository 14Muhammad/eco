<?php
require "functions/functions.php";
$pro = $_GET['pro'];
echo "
            
                    <img src='admin/product_images/$pro_image' class='img-thumbnail' width='180' height='180'>
                    <p> <b> Rs $pro_price/-  </b> </p>
                    <a href='details.php?pro_id=$pro_id' style='float: left'>Details</a>
                    <a href='index.php?add_cart=$pro_id'><button style='float: right;'>Add to Cart</button></a>
             
        ";

