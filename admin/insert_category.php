<h1>Insert New Category</h1>
<form action="" method="post"  >
    <input type="text" name="new_cat" size="60" required>
    <input type="submit" name="insert_cate" value="Insert Category">
</form>
<?php
if(isset($_POST['insert_cate'])){
    //getting text data from the fields
    $new_cat = $_POST['new_cat'];

    $insert_cat = "insert into categories (cat_title) 
                  VALUES ('$new_cat');";
    $insert_cat = mysqli_query($con, $insert_cat);
    if($insert_cat){
        //header("location: ".$_SERVER['PHP_SELF']);
        echo" Category Successfuly inserted";
    }
}
?>