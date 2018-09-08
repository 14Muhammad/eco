<h1> Brands </h1>
<ul class="list-group">
    <?php
    $get_brands = "select * from brands";
    $run_brands = mysqli_query($con, $get_brands);
    while ($row_brands= mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        echo "<li class='list-group-item'>$brand_title</li>
        					  <a href='deletebrand.php?delete=$brand_id' class='offset-4 col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Delete Brand'  style='background-color:red'>
                              </a>
                              <a href='editbrand.php?edit=$brand_id' class='offset-4 col-md-1 col-lg-1 col-sm-1'>
                              <input class='btn btn-default' type='button' value='Edit Brand'  >
                              </a>
                              <br>";

    }
    ?>
</ul>