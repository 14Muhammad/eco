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
        $run_pro = mysqli_query($con, $get_pro);// here is error: Undefined variable: con in
        while($row_pro= mysqli_fetch_array($run_pro))
        {
            $pro_id= $row_pro['pro_id'];
            $pro_cat = $row_pro['pro_cat'];
            $pro_title = $row_pro['pro_title'];
            $pro_price = $row_pro['peo_price'];
            $pro_image = $row_pro['pro_image'];
            echo "<tr>
                      <td>$pro_id</td>
                      <td>$pro_cat</td>
                      <td>$pro_title</td>
                      <td>$pro_price</td>
                     <td><img src='../admin/product_images/$image' width='50px' height='50px'></td>
                  </tr>";
        }
        ?>

        </tbody>
    </div>
</table>
