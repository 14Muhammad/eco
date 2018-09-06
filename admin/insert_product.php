<?php
require "../includes/db_connetion.php";
?>
<html>
    <head>
        <title> Inserting Product</title>

    </head>
    <h2>farast</h2>
    <body>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <table align="center" width="750" border="2" bgcolor="orange">
                <tr align="center">
                    <td colspan="2"><h2>Insert New Product here</h2></td>
                </tr>
                <tr>
                    <td align="right"><b> Product Title: </b></td>
                    <td><input type="text" name="pro_title" size="60" required></td>
                </tr>
                <tr>
                    <td align="right"><b> Product Category: </b></td>
                    <td>
                        <select name="pro_cat" required>
                            <option>Select a Category</option>
                            <?php
                            $get_cats = "select * from categories";
                            $run_cats = mysqli_query($con, $get_cats);
                            while ($row_cats= mysqli_fetch_array($run_cats)){
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];
                                echo "<option value='$cat_id'>$cat_title </option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b> Product Brand: </b></td>
                    <td>
                        <select name="pro_brand" required>
                            <option>Select a Brand</option>
                            <?php
                            $get_brands = "select * from brands";
                            $run_brands = mysqli_query($con, $get_brands);
                            while ($row_brands= mysqli_fetch_array($run_brands)){
                                $brand_id = $row_brands['brand_id'];
                                $brand_title = $row_brands['brand_title'];
                                echo "<option value='$brand_id'>$brand_title </option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b> Product Image: </b></td>
                    <td><input type="file" name="pro_image" required></td>
                </tr>
                <tr>
                    <td align="right"><b> Product Price: </b></td>
                    <td><input type="text" name="pro_price" required></td>
                </tr>
                <tr>
                    <td align="right"><b> Product Description: </b></td>
                    <td><textarea name="pro_desc" cols="40" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td align="right"><b> Product Keywords: </b></td>
                    <td><input type="text" name="pro_keywords" size="50" required></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="insert_post" value="Insert Product Now"></td>
                </tr>

            </table>

        </form>
    </body>
</html>

<?php
if(isset($_POST['insert_post'])){
    //getting text data from the fields
    $pro_title = $_POST['pro_title'];
    $pro_cat = $_POST['pro_cat'];
    $pro_brand = $_POST['pro_brand'];
    $pro_price = $_POST['pro_price'];
    $pro_desc = $_POST['pro_desc'];
    $pro_keywords = $_POST['pro_keywords'];
    //getting image from the field
    $pro_image = $_FILES['pro_image']['name'];
    $pro_image_tmp = $_FILES['pro_image']['tmp_name'];

    move_uploaded_file($pro_image_tmp,"product_images/$pro_image");

    $insert_product = "insert into products (pro_cat, pro_brand,pro_title,pro_price,pro_desc,pro_image,pro_keywords) 
                  VALUES ('$pro_cat','$pro_brand','$pro_title','$pro_price','$pro_desc','$pro_image','$pro_keywords');";
    $insert_pro = mysqli_query($con, $insert_product);
    if($insert_pro){
        header("location: ".$_SERVER['PHP_SELF']);
    }
}

?>