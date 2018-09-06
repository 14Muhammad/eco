<h2>Insert New Brand</h2>
<form action="" method="post"  >
    <input type="text" name="new_brand" size="60" required>
    <input type="submit" name="insert_brand" value="Insert Brands">
</form>
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