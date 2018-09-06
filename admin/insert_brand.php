<h1 class="jumbotron text-center">Insert New Brand</h1>
<form action="" method="post" class="table table-striped table-hover" >
    <input type="text" name="new_brand" size="80" required>
    <input type="submit" name="insert_brand" value="Insert Brands" class="btn btn-outline-success">
</form>

<br><br><br><br><br><br>
<br><br><br><br><br><br>
<footer class="bg-warning text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                This is footer powered by <kbd>Farasat Ali Aziz</kbd>
            </div>
        </div>
    </div>
</footer>

<?php
if(isset($_POST['insert_brand'])){
    //getting text data from the fields
    $new_brand = $_POST['new_brand'];
    $insert_brands = "insert into brands (brand_title) 
                  VALUES ('$new_brand');";
    $insert_brands = mysqli_query($con, $insert_brands);
    if($insert_brands){
        //header("location: ".$_SERVER['PHP_SELF']);
        echo" Brand Successfuly inserted";
    }
}
?>

<!--
 * Created by PhpStorm.
 * User: farasaT
 * Date: 9/6/2018
 * Time: 7:00 PM
 -->