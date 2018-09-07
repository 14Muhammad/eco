<div class="offset-md-2 col-md-8">
    <h2 class="offset-lg-3 offset-md-2 offset-1 "> Products </h2>
    <table class="table table-bordered">
        <div class="table responsive">
            <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th >Description</th>
                <th>Image</th>
                <th >Key words</th>
                <th >Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_products = "select * from products";
            $run_products = mysqli_query($con, $get_products);
            while($row_products= mysqli_fetch_array($run_products)) {
                $pro_id= $row_products['pro_id'];
                $pro_cat = $row_products['pro_cat'];
                $pro_brand = $row_products['pro_brand'];
                $pro_title = $row_products['pro_title'];
                $pro_price= $row_products['pro_price'];
                $pro_desc = $row_products['pro_desc'];
                $pro_image = $row_products['pro_image'];
                $pro_keywords = $row_products['pro_keywords'];
                echo "<tr>
                      <td>$pro_title</td>
                      <td>$pro_price</td>
                      <td>$pro_desc</td>
                      <td><img src='product_images/$pro_image' width='50px' height='50px'></td>
                      <td>$pro_keywords</td>
                     <td> <a type='button' class='btn btn-outline-danger' href='delete.php?del=$pro_id'>Delete</a></td>
                  </tr>";
            }
            ?>
            </tbody>
        </div>
    </table>
</div>