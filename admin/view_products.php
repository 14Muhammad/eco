<div class="row">
    <div class="offset-md-2 col-md-8">

           <h2>All Products</h2>
             <p>The .table-striped class adds zebra-stripes to a table:</p>
               <table class="table table-striped">
                    <thead>
                    <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Keyword</th>

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
                  
                     
                         <td> <a type='button' class='btn btn-primary  a-btn-slide-text' href='delete.php?delete=$pro_id'>Delete   
                                     
                            </a></td>
                           
                 <!--           <td  <a href=\"#\" class=\"btn btn-primary a-btn-slide-text\">
                               <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
                                <span><strong>Edit</strong></span>
                                         
                            </a>
                         </td> -->
                  </tr>";
        }
        ?>
        </tbody>
    </table>

    </div>
</div>
x

