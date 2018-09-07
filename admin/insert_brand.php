<br><br>
<form action="" method="post" enctype="multipart/form-data">

    <h2 class="offset-lg-3 offset-md-2 offset-sm-1 "> Insert New Brands </h2>

    <div class="offset-sm-3 col-12 col-sm-6">

        <input class="input-group" type="text"  name="brand" id="brands" placeholder="Enter Brand"
               required pattern="([A-Za-z]{3,}|([A-Za-z]{1,}\s?[A-Za-z]{1,})+)">
    </div>
    <br>
    <div class="offset-sm-3 col-12 col-sm-6">
        <input class="btn btn-block btn-primary " type="submit" name="insert_brand"
               value="Insert Brand">
    </div>

</form>

<br>
<?php
if(isset($_POST['insert_brand'])){
    //getting text data from the fields
    $new_brand = $_POST['brand'];

    $insert_brand = "insert into brands (brand_title) 
                  VALUES ('$new_brand');";
    $insert_brand = mysqli_query($con, $insert_brand);


    header('location: index.php?view_brands');
}
?>