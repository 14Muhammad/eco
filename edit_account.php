<?php
    $user = $_SESSION['customer_email'];
    $get_cust = "select * from customers where cust_email='$user'";
    $run_cust = mysqli_query($con, $get_cust);
    $row_cust = mysqli_fetch_array($run_cust);
    $c_id = $row_cust['cust_id'];
    $name = $row_cust['cust_name'];
    $email = $row_cust['cust_email'];
    $pass = $row_cust['cust_pass'];
    $country = $row_cust['cust_country'];
    $city = $row_cust['cust_city'];
    $image = $row_cust['cust_image'];
    $contact = $row_cust['cust_contact'];
    $address = $row_cust['cust_address'];

if(isset($_POST['update'])){
    $customer_id = $c_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $update_c = "update customers set cust_name='$c_name',cust_email='$c_email',
                cust_pass='$c_pass',cust_city='$c_city',
                cust_contact='$c_contact',cust_address='$c_address',cust_image='$c_image'
                where cust_id = '$customer_id'";
    $run_update_c = mysqli_query($con,$update_c);
    if($run_update_c){
        header('location: my_account.php?edit_account');
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table width="600">
        <tr align="center">
            <td colspan="2"><h2>Update your Account </h2></td>
        </tr>
        <tr>
            <td align="right">Name: </td>
            <td><input name="c_name" value="<?php echo $name;?>" required></td>
        </tr>
        <tr>
            <td align="right">Email: </td>
            <td><input name="c_email" value="<?php echo $email;?>" required></td>
        </tr>
        <tr>
            <td align="right">Password: </td>
            <td><input type="password" name="c_pass" value="<?php echo $pass;?>" required></td>
        </tr>
        <tr>
            <td align="right">Image: </td>
            <td><input type="file" name="c_image" required>
                <img src="customer/customer_images/<?php echo $image?>" width="50" height="50px"></td>
        </tr>
        <tr>
            <td align="right">Country: </td>
            <td>
                <select name="c_country" disabled>
                    <option value="<?php  echo $country;?>" > <?php  echo $country;?> </option>
                    <option value="Afghanistan">Afghanistan </option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="China">China</option>
                    <option value="Canada">Canada</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">City: </td>
            <td><input name="c_city" value="<?php echo $city;?>"></td>
        </tr>
        <tr>
            <td align="right">Contact: </td>
            <td><input name="c_contact" required  value="<?php echo $contact;?>"></td>
        </tr>
        <tr>
            <td align="right">Address: </td>
            <td><input name="c_address" value="<?php echo $address;?>"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" name="update" value="Update Account"></td>
        </tr>
    </table>

</form>

