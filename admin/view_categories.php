<h1> Categories </h1>
<ul class="list-group">
<?php
$get_cats = "select * from categories";
$run_cats = mysqli_query($con, $get_cats);
while ($row_cats= mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li class='list-group-item'>$cat_title</li>
    							<br>
   							 <a href='deletecat.php?delete=$cat_id' class='offset-4 col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Delete Category'  style='background-color:red'>
                              </a>
                              <a href='editcat.php?edit=$cat_id' class='offset-4 col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Edit Category'  >
                              </a>
                              <br>
                             
	";

}
?>
</ul>
