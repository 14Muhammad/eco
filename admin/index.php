<?php
include ('functions/db_connect.php')
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
                        <a href="index.php?view">
                            <i class="fas fa-sitemap"></i> View All Products
                        </a>
                    </li>
                    <li>
                        <a href="index.php?insert_category">Insert New Category</a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">View All Categories</a>
                    </li>
                    <li>
                        <a href="index.php?insert_brand">Insert New Brand</a>
                    </li>
                    <li>
                        <a href="index.php?view_brands">View All Brands</a>
                    </li>
                    <li>
                        <a href="index.php?view_customers">View Customers</a>
                    </li>
                    <li>
                        <a href="index.php?view_orders">View Orders</a>
                    </li>
                    <li>
                        <a href="index.php?view_payments">View Payments</a>
                    </li>
                    <li>
                        <a href="logout.php">Admin logout</a>
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
                    <?php
                        if(isset($_GET['insert_product'])){
                            include ('insert_product.php');
                        }
                    else if(isset($_GET['view'])){
                        include ('view.php');
                    }
                        else if(isset($_GET['view_categories'])){
                            include ('view_categories.php');
                        }
                        else if(isset($_GET['view_customers'])){
                            include ('view_customers.php');
                        }
                        else if(isset($_GET['view_brands'])) {
                            include('view_brands.php');
                        }
                        else  if(isset($_GET['insert_brand'])){
                            include ('insert_brand.php');
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