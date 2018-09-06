<ul class="list-group"><div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Insert New Brand </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">brand Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="pro_title" name="pro_title" placeholder="Title">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="insert_brand" name="insert_brand"
                           value="Insert new brand">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if(isset($_POST['insert_brand'])){
    //getting text data from the fields

    $brand_title = $_POST['brand_title'];

    $insert_brand = "insert into brands (brand_title) 
                  VALUES ('$brand_title');";
    $insert_b = mysqli_query($con, $insert_brand);
    if($insert_b){
        header("location: ".$_SERVER['PHP_SELF']);
    }
    echo"<td>
                     
                    <tr>  <td>$pro_title</td>";
}

?>
</ul>
