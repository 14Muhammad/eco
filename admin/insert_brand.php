<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Insert New Brand </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="brand_title">Brand</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="brand_title" name="brand_title" placeholder="Enter Brand">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="insert_brand" name="insert_brand"
                           value="Insert Brand">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];
    $insert_brand = "insert into brands (brand_title) VALUES ('$brand_title');";
    $insert_brand = mysqli_query($con, $insert_brand);
    if($insert_brand){
        header("location: index.php?view_brands");
    }
}

?>