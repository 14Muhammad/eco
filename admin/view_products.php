<?php
/**
 * Created by PhpStorm.
 * User: Fahad Ali
 * Date: 9/6/2018
 * Time: 3:13 PM
 */
?>
<h1>All Products</h1>
<table class="table table-bordered">
    <div class="table responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Title</th>
            <th>Product Categories</th>
            <th>Price</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $get_pro = "select * from products";

        $run_pro = mysqli_query($con, $get_pro);

        $i = 0;

        while ($row_pro=mysqli_fetch_array($run_pro)){

            $pro_id = $row_pro['pro_id'];
            $pro_title = $row_pro['pro_title'];
            $pro_cat = $row_pro['pro_cat'];
            $pro_image = $row_pro['pro_image'];
            $pro_price = $row_pro['pro_price'];
            $i++;

            ?>
            <tr align="center">
                <td><?php echo $i;?></td>
                <td><?php echo $pro_title;?></td>
                <td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
                <td><?php echo $pro_price;?></td>
                <td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
                <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>

            </tr>
        <?php } ?>
        </tbody>
    </div>
</table>
