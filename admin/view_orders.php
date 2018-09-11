<div class="container">
    <h2 class="offset-lg-3 offset-md-2 offset-1 "><b>Orders </b> </h2>
    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th class=' col-md-1 col-lg-1'>Title</th>
            <th class=' col-md-1 col-lg-1'>Price</th>
            <th class=' col-md-1 col-lg-1'>Image</th>
            <th d-sm-none col-md-4 col-lg-4>Description</th>
            <th class=' col-md-1 col-lg-1'>Key words</th>
            <th class=' col-md-4 col-lg-4'>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $get_orders = "select * from cart";
        $run_orders = mysqli_query($con, $get_orders);
        while($row_orders= mysqli_fetch_array($run_orders)) {

            $pro_id= $row_orders['p_id'];
            $get_products = "select * from products where $pro_id='$pro_id'";
            $run_products = mysqli_query($con, $get_products);
            $row_products= mysqli_fetch_array($run_products);
            $pro_id= $row_products['pro_id'];
            $pro_cat = $row_products['pro_cat'];
            $pro_brand = $row_products['pro_brand'];
            $pro_title = $row_products['pro_title'];
            $pro_price= $row_products['pro_price'];
            $pro_desc = $row_products['pro_desc'];
            $pro_image = $row_products['pro_image'];
            $pro_keywords = $row_products['pro_keywords'];

            echo "<tr>
                      <div class='row'>
                      <td class=' col-md-1 col-lg-1'>$pro_title</td> 
                      <td class=' col-md-1 col-lg-1'>$pro_price</td>
                      <td class=' col-md-1 col-lg-1'><img src='product_images/$pro_image' width='50px' height='50px'></td>
                      <td class='d-sm-none col-md-4 col-lg-4'>$pro_desc</td>
                      <td class=' col-md-1 col-lg-1'>$pro_keywords</td>
                      <td class=' col-md-4 col-lg-4'> <a type='button' class='btn btn-danger' href='delete.php?del=$pro_id'>
                      <i class='fa fa-trash-alt'></i> Delete</a></td>
                       </div>     
                      
                  </tr>";

        }
        ?>

        </tbody>
    </table>
</div>