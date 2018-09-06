<h1> Brands </h1>
<ul class="list-group">
    <?php
    $get_brands = "select * from brands";
    $run_brands = mysqli_query($con, $get_brands);
    while ($row_brands= mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        echo "<li class='list-group-item'>$brand_title</li>";
    }
    ?>
</ul>