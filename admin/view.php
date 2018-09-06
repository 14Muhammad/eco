<h1> All product </h1>
<ul class="list-group">
    <?php

    $get_pro = "";
    if(!isset($_GET['cat']) && !isset($_GET['brand']) && !isset($_GET['search'])) {

        $get_pro = "select * from products";

        $get_pro = "select * from products order by RAND() limit 0,6";


    }
    $run_pro = mysqli_query($con,$get_pro);
    $count_pro = mysqli_num_rows($run_pro);


    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['pro_id'];
        $pro_cat = $row_pro['pro_cat'];
        $pro_brand = $row_pro['pro_brand'];
        $pro_title = $row_pro['pro_title'];
        $pro_price = $row_pro['pro_price'];
        $pro_image = $row_pro['pro_image'];
        echo"<td>
                     
                    <tr>  <td>$pro_title</td>
                     
 
                     <td><img src='product_images/$pro_image' width='100px' height='100px'></td>
                  
                      <td>$pro_price</td><br></tr>
                  </td>";
    }
    ?>



</ul>
