
<table class="table table-bordered">

<?php
$get_pro="select * from  products";
$run=mysqli_query($con,$get_pro);
while($row_col=mysqli_fetch_array($run))
{
    $pro_title=$row_col['pro_title'];
    $pro_price=$row_col['pro_price'];
    $pro_desc=$row_col['pro_desc'];
    $pro_image=$row_col['pro_image'];
    $pro_keywords=$row_col['pro_keywords'];
    ?>

            <tr>
                    <td > <?php echo $pro_title ?></td>
                    <td> <?php echo $pro_price ?></td>
                    <td > <?php echo $pro_desc ?></td>
                    <td> <img src="product_images/<?php echo $pro_image ?>" width="120px" height="80px"> </td>
                    <td> <?php echo $pro_keywords ?></td>

            </tr>




<?php
}
?>
    </table>
