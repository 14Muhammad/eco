<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Insert New Product </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">Product Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_title" name="pro_title" placeholder="Title"
                           pattern="\w+" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_cat">Product Category</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="pro_cat" id="pro_cat" required class="form-control">
                        <option selected>Select Category</option>
                        <?php
                        $get_cats = "select * from categories";
                        $run_cats = mysqli_query($con, $get_cats);
                        while ($row_cats= mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "<option value='$cat_id'>$cat_title </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3  d-none d-sm-block" for="pro_brand">Product Brand</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="pro_brand" id="pro_brand" required class="form-control">
                        <option>Select Brand</option>
                        <?php
                        $get_brands = "select * from brands";
                        $run_brands = mysqli_query($con, $get_brands);
                        while ($row_brands= mysqli_fetch_array($run_brands)){
                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];
                            echo "<option value='$brand_id'>$brand_title </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_image">Product Image</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control-file" type="file" id="pro_image" name="pro_image" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_price">Product Price</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_price" name="pro_price" placeholder="Product Price">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_desc">Product Description</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="form-control"  name="pro_desc" id="pro_desc" rows="4" placeholder="Product Description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_keywords">Product Keywords</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_keywords" name="pro_keywords" placeholder="Product Keywords">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="insert_post" name="insert_post"
                           value="Insert Product Now">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if(isset($_POST['insert_post'])){
    //getting text data from the fields
    $pro_title = $_POST['pro_title'];
    $pro_cat = $_POST['pro_cat'];
    $pro_brand = $_POST['pro_brand'];
    $pro_price = $_POST['pro_price'];
    $pro_desc = $_POST['pro_desc'];
    $pro_keywords = $_POST['pro_keywords'];
    //getting image from the field
    $pro_image = $_FILES['pro_image']['name'];
    $pro_image_tmp = $_FILES['pro_image']['tmp_name'];

    move_uploaded_file($pro_image_tmp,"product_images/$pro_image");

    $insert_product = "insert into products (pro_cat, pro_brand,pro_title,pro_price,pro_desc,pro_image,pro_keywords) 
                  VALUES ('$pro_cat','$pro_brand','$pro_title','$pro_price','$pro_desc','$pro_image','$pro_keywords');";
    $insert_pro = mysqli_query($con, $insert_product);
    if($insert_pro){
        header("location: ".$_SERVER['PHP_SELF']);
    }
}

?>