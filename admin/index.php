<?php
session_start();
include ('functions/db_connect.php');
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <title>E-commerce Admin Panel</title>
        <title>Admin Panel</title>
    </head>
    <body>
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Admin Panel</h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="index.php?insert_product">
                            <i class="fas fa-plus"></i> Insert New Product
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view_products">
                            <i class="fas fa-sitemap"></i> View All Products
                        </a>
                    </li>
                    <li>
                        <a href="index.php?insert_category">
                            <i class="fas fa-plus"></i> Insert New Category
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">
                            <i class="fas fa-band-aid"></i> View All Categories
                        </a>
                    </li>
                    <li>
                        <a href="index.php?insert_brand">
                            <i class="fas fa-plus"></i> Insert New Brand
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view_brands">
                            <i class="fas fa-toolbox"></i> View All Brands</a>
                    </li>
                    <li>
                        <a href="index.php?view_customers">
                            <i class="fa fa-user-tie"></i> View Customers</a>
                    </li>
                    <li>
                        <a href="index.php?view_orders">
                            <i class="fa fa-shopping-bag"></i> View Orders</a>
                    </li>
                    <li>
                        <a href="index.php?view_payments">
                            <i class="fa fa-credit-card"></i> View Payments</a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out-alt"></i> Admin logout</a>
                    </li>
                </ul>
            </nav>
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </nav>
                <div class="container">
                    <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
                    <?php
                        if(isset($_GET['insert_product'])){
                            include ('insert_product.php');
                        }
                        else if(isset($_GET['view_products'])){
                            include ('view_products.php');
                        }
                        else if(isset($_GET['edit_pro'])){
                            include ('edit_pro.php');
                        }
                        else if(isset($_GET['del_pro'])){
                            include ('del_pro.php');
                        }
                        else if(isset($_GET['view_categories'])){
                            include ('view_categories.php');
                        }
                        else if(isset($_GET['insert_category'])){
                            include ('insert_category.php');
                        }
                        else if(isset($_GET['edit_cat'])){
                            include ('edit_cat.php');
                        }
                        else if(isset($_GET['del_cat'])){
                            include ('del_cat.php');
                        }
                        else if(isset($_GET['view_brands'])) {
                            include('view_brands.php');
                        }
                        else if(isset($_GET['insert_brand'])) {
                            include('insert_brand.php');
                        }
                        else if(isset($_GET['edit_brand'])) {
                            include('edit_brand.php');
                        }
                        else if(isset($_GET['del_brand'])) {
                            include('del_brand.php');
                        }
                        else if(isset($_GET['view_customers'])){
                            include ('view_customers.php');
                        }
                        else if(isset($_GET['del_customer'])){
                            include ('del_customer.php');
                        }


                        ?>
                </div>
            </div>
        </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });

            });
        </script>
    </body>
</html>