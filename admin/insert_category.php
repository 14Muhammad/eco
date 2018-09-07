

<br><br>
<form action="" method="post" enctype="multipart/form-data">

    <h2 class="offset-lg-3 offset-md-2 offset-sm-1 "> Insert New Category </h2>

    <div class="offset-sm-3 col-12 col-sm-6">

    <input class="input-group" type="text"  name="category" id="cat" placeholder="Enter Category"
           required pattern="([A-Za-z]{3,}|([A-Za-z]{1,}\s?[A-Za-z]{1,})+)">
    </div>
    <br>
    <div class="offset-sm-3 col-12 col-sm-6">
    <input class="btn btn-block btn-primary " type="submit" name="insert_cate"
           value="Insert Category">
    </div>

</form>

<br>
<?php
if(isset($_POST['insert_cate'])){
    //getting text data from the fields
    $new_cat = $_POST['category'];

    $insert_cat = "insert into categories (cat_title) 
                  VALUES ('$new_cat');";
    $insert_cat = mysqli_query($con, $insert_cat);

    //echo " <h4 class='offset-sm-3 col-12 col-sm-6'>Successfully new Category Inserted!!</h4>";
    //sleep(2);
    header('location: index.php?view_categories');
}
?>