<!DOCTYPE html>
<?php
session_start();
require "functions/functions.php";
?>

<?php
if(isset($_POST['register'])){
    global $con;
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $insert_c = "insert into customers (cust_ip,cust_name,cust_email,cust_pass,cust_country,cust_city,cust_contact,cust_address,cust_image) 
                  values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
    $run_c = mysqli_query($con,$insert_c);
    $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_cart==0){
        $_SESSION['customer_email'] = $c_email;
        header('location: my_account.php');
    }
    else {
        $_SESSION['customer_email'] = $c_email;
        header('location: checkout.php');
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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
                <li><a href="customer/account.php">My Account</a></li>
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
                <div class="sidebar_title">Categories </div>
                <ul class="cats">
                    <?php getCats(); ?>
                </ul>
                <div class="sidebar_title">Brands </div>
                <ul class="cats">
                    <?php getBrands(); ?>
                </ul>
            </div>
            <div id="content_area">
                <div class="shopping_cart">
                    <?php cart(); ?>
                    <span style="float: right;
                    font-size: 18px; padding: 5px;line-height: 40px;">
                        Welcome guest! <b style="color: yellow">
                            Shopping Cart - </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?>
                        <a style="color: yellow" href="cart.php">Go to Cart</a>
                    </span>
                </div>

                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        <table align="center" width="750">
                            <tr align="center">
                                <td colspan="3"><h2>create an Account </h2></td>
                            </tr>
                            <tr>
                                <td align="right">Name: </td>
                                <td><input name="c_name" required></td>
                            </tr>
                            <tr>
                                <td align="right">Email: </td>
                                <td>
                                    <input name="c_email" onkeyup="checkEmail(this.value)" required>
                                    <span id="hint"></span>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Password: </td>
                                <td><input type="password" name="c_pass" required></td>
                            </tr>
                            <tr>
                                <td align="right">Image: </td>
                                <td><input type="file" name="c_image" required></td>
                            </tr>
                            <tr>
                                <td align="right">Country: </td>
                                <td>
                                    <select name="c_country">
                                        <option>Select a Country </option>
                                        <option>Afghanistan </option>
                                        <option>Pakistan</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">City: </td>
                                <td><input name="c_city" required></td>
                            </tr>
                            <tr>
                                <td align="right">Contact: </td>
                                <td><input name="c_contact" required pattern=".*"></td>
                            </tr>
                            <tr>
                                <td align="right">Address: </td>
                                <td><input name="c_address" required></td>
                            </tr>
                            <tr align="center">
                                <td colspan="3"><input type="submit" name="register" value="Create Account"></td>
                            </tr>
                        </table>

                    </form>


            </div>
        </div>
        <div id="footer">
            <h2> &copy; 2018 by Muhammad Ali Makhdoom</h2>
        </div>
    </div>
    <script>
        function checkEmail(email) {
            if(email==''){
                document.getElementById('hint').innerHTML = "";
            }
            else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('hint').innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "check_email.php?e="+email);
                xhttp.send();
            }
        }
    </script>
</body>
</html>
