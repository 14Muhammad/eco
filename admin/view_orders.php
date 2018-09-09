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
</head>
<body>
    <h1>Orders</h1>
    <div id="content_area">
        <?php
            global $con;
            $ip = getIp();
            if(isset($_POST['update_cart'])){
                /*Way 1 to do */
                //foreach (array_combine($_POST['product_id'], $_POST['qty']) as $pro_id => $qty) {
                /*Way 2 to do */
                for($i =0; $i< sizeof($_POST['product_id']); $i++){
                    $pro_id = $_POST['product_id'][$i];
                    $qty = $_POST['qty'][$i];
                    if($qty > 0) {
                        $update_qty = "update cart set qty='$qty' where p_id='$pro_id' AND ip_add='$ip'";
                        $run_qty = mysqli_query($con, $update_qty);
                    }
                }
                if(isset($_POST['remove'])) {
                    foreach ($_POST['remove'] as $remove_id) {
                        $del_pro = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                        $run_del = mysqli_query($con, $del_pro);
                    }
                }
                    header('location: '.$_SERVER['PHP_SELF']);
            }
            if(isset($_POST['continue'])){
                header('location: index.php');
            }
        ?>
        <div class="products_box">
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-striped">
                <tr align="center">
                    <th> Product(s) </th>
                    <th> Quantity </th>
                    <th> Unit Price </th>
                    <th> Items Total </th>
                    <th> Actions </th>
                </tr>
                <?php
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
                            $pro_title = $pro_row['pro_title'];
                            $pro_image = $pro_row['pro_image'];
                            $pro_price = $pro_row['pro_price'];
                            $pro_price_all_items = $pro_price * $pro_qty;
                            $total += $pro_price_all_items;
                ?>
                <tr align="center">
                    <td><?php echo $pro_title; ?> 
                    <br>
                    <img src="product_images/<?php echo $pro_image; ?>"width="60" height="60">
                    </td>
                    <td><lable size="2"><?php echo $pro_qty;?></lable>
                    <input name="product_id[]" type="hidden" value="<?php echo $pro_id;?>">
                    </td>
                    <td><?php echo "Rs " . $pro_price . "/-"; ?></td>
                    <td><?php echo "Rs " . $pro_price_all_items . "/-"; ?></td>
                    <td><a href="del_order.php?del=<?php echo"$pro_id" ?>" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr align="right">
                    <td colspan="3" align="center"><b>Sub Total:</b></td>
                    <td colspan="2" align="center"><?php echo "Rs ".$total."/-"; ?></td>
                </tr>
            </table>
        </form>
</body>
</html>