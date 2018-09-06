<h1 class="jumbotron text-center">Insert New Category</h1>
<form action="" method="post" class="table table-striped table-hover">
    <input type="text" name="new_cat" size="80" required>
    <input type="submit" name="insert_cate" value="Insert Category" class="btn btn-outline-success">
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
<!--
 * Created by PhpStorm.
 * User: farasaT
 * Date: 9/6/2018
 * Time: 7:03 PM
 -->