<div class="row">
  <div class="column">
    <div class="row form-group">
      
      <h5 class="offset-1 col-md-2 col-lg-2 col-sm-2"><b> Product Title</b></h5>
      <h5 class="col-md-2 col-lg-2 col-sm-2"><b> Product Price</b></h5>
      <h5 class="col-md-2 col-lg-2 col-sm-2"><b> Product Description</b></h5>
      <h5 class="col-md-1 col-lg-1 col-sm-1"><b> Product Image</b></h5>
      <h5 class="col-md-1 col-lg-1 col-sm-1"><b> Delete Product</b></h5>
      <h5 class="col-md-1 col-lg-1 col-sm-1"><b> Edit Product</b></h5>

    </div>
             <?php
            $get_cats = "select * from products";
            $run_cats = mysqli_query($con, $get_cats);
            while($row_cats= mysqli_fetch_array($run_cats)) {
                $pro_title=$row_cats['pro_title'];
                $pro_price=$row_cats['pro_price'];
                $pro_desc=$row_cats['pro_desc'];
                $pro_image=$row_cats['pro_image'];
                $pro_id=$row_cats['pro_id'];
                echo "<div class='row form-group'>

                              <label class='offset-1 col-md-2 col-lg-2 col-sm-2'> $pro_title</label>
                              <label class='col-md-2 col-lg-2 col-sm-2'> $pro_price</label>
                              <label class='col-md-2 col-lg-2 col-sm-2'> $pro_desc</label>
                              
                              <img src='product_images/$pro_image' width='100px' height='75px' class='col-md-1 col-lg-1 col-sm-1'>

                              <a href='delete.php?delete=$pro_id' class='col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Delete'  >
                              </a>
                             
                              <a href='edit.php?edit=$pro_id' class='col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Edit'  >
                              </a>
                              </div>
                      ";
            }
            ?>
     
    
  </div>
</div>


