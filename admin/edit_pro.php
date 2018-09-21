<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['edit_pro'])){
    $get_id = $_GET['edit_pro'];
    $get_pro = "select * from products where pro_id='$get_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $row_pro = mysqli_fetch_array($run_pro);
    $pro_id = $row_pro['pro_id'];
    $pro_title = $row_pro['pro_title'];
    $pro_cat = $row_pro['pro_cat'];
    $pro_brand = $row_pro['pro_brand'];
    $pro_title = $row_pro['pro_title'];
    $pro_price = $row_pro['pro_price'];
    $pro_image = $row_pro['pro_image'];
    $pro_desc = $row_pro['pro_desc'];
    $pro_keywords = $row_pro['pro_keywords'];

    $get_cat = "select * from categories where cat_id = '$pro_cat'";
    $run_cat = mysqli_query($con,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];

    $get_brand = "select * from brands where brand_id = '$pro_brand'";
    $run_brand = mysqli_query($con,$get_brand);
    $row_brand = mysqli_fetch_array($run_brand);
    $brand_title = $row_brand['brand_title'];
}
if(isset($_POST['update_pro'])){
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

    $update_product = "update products set pro_cat = '$pro_cat', 
                                        pro_brand = '$pro_brand',
                                        pro_title = '$pro_title' ,
                                        pro_price = '$pro_price',
                                        pro_desc = '$pro_desc',
                                        pro_image = '$pro_image', 
                                        pro_keywords = '$pro_keywords' 
                                        where pro_id='$pro_id'";

    $update_pro = mysqli_query($con, $update_product);
    if($update_pro){
        header("location: index.php?view_products");
    }
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Product </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">Product Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_title" name="pro_title" placeholder="Title"
                           value="<?php echo $pro_title;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_cat">Product Category</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select name="pro_cat" id="pro_cat" required class="form-control">
                        <option><?php echo $cat_title;?></option>
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
                        <option><?php echo $brand_title;?></option>
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
                    <img class="img-thumbnail" src='product_images/<?php echo $pro_image;?>' width='80' height='80'>
                    <input class="form-control-file" type="file" id="pro_image" name="pro_image" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_price">Product Price</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_price" name="pro_price" placeholder="Product Price"
                           value="<?php echo $pro_price;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_desc">Product Description</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="form-control"  name="pro_desc" id="pro_desc" rows="4" placeholder="Product Description">
                        <?php echo $pro_desc;?>
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_keywords">Product Keywords</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_keywords" name="pro_keywords" placeholder="Product Keywords"
                           value="<?php echo $pro_keywords;?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_pro" name="update_pro"
                           value="Update Product Now">
                </div>
            </div>
        </form>
    </div>
</div>
