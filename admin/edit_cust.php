<?php
if(!isset($_SESSION['user_email']))
{
    header('location: login.php?not_admin=You are not Admin!');
}

if(isset($_GET['edit_cust'])) {
    $get_id = $_GET['edit_cust'];
    $get_pro = "select * from customers where cust_id='$get_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $row_pro = mysqli_fetch_array($run_pro);
    $cust_id = $row_pro['cust_id'];
    $cust_ip= $row_pro['cust_ip'];
    $cust_name = $row_pro['cust_name'];
    $cust_email = $row_pro['cust_email'];
    $cust_pass= $row_pro['cust_pass'];
    $cust_country = $row_pro['cust_country'];
    $cust_city = $row_pro['cust_city'];
    $cust_contact = $row_pro['cust_contact'];
    $cust_address = $row_pro['cust_address'];
    $cust_image = $row_pro['cust_image'];

}


if(isset($_POST['update_cust']))
{
    //getting text data from the fields
    $cust_name = $_POST['cust_name'];
    $cust_email = $_POST['cust_email'];
    $cust_pass= $_POST['cust_pass'];
    $cust_country = $_POST['cust_country'];
    $cust_city = $_POST['cust_city'];
    $cust_contact = $_POST['cust_contact'];
    $cust_address = $_POST['cust_address'];
    //getting image from the field
    $cust_image = $_FILES['cust_image']['name'];
    $cust_image_tmp = $_FILES['cust_image']['tmp_name'];

    move_uploaded_file($cust_image_tmp,"customer_images/$cust_image");

    $update_customer = "update customers set cust_name = '$cust_name', 
                                        cust_email = '$cust_email',
                                        cust_pass = '$cust_pass' ,
                                        cust_country = '$cust_country',
                                        cust_city = '$cust_city',
                                        cust_contact = '$cust_contact',
                                        cust_address = '$cust_address', 
                                        cust_image = '$cust_image' 
                                        where cust_id='$cust_id'";

    $update_cus = mysqli_query($con, $update_customer);
    if($update_cus)
    {
        header("location: index.php?view_customers");
    }
}

?>

<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Customer </h2>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_name">Customer Name</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cust_name" name="cust_name" placeholder="Name"
                           value="<?php echo $cust_name;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_email">Customer Email</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cust_email" name="cust_email" placeholder="Email"
                           value="<?php echo $cust_email;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_pass">Customer Password</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="password" id="cust_pass" name="cust_pass" placeholder="Password"
                           value="<?php echo $cust_pass;?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_country">Customer Country</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cust_country" name="cust_country" placeholder="Country"
                           value="<?php echo $cust_country;?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_city">Customer City</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cust_city" name="cust_city" placeholder="City"
                           value="<?php echo $cust_city;?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_contact">Customer Contact</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cust_contact" name="cust_contact" placeholder="Contact"
                           value="<?php echo $cust_contact;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_address">Customer Address</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="form-control"  name="cust_address" id="cust_address" rows="4" placeholder="Customer Address">
                        <?php echo $cust_address;?>
                    </textarea>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cust_image">Customer Image</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <img class="img-thumbnail" src='customer_images/<?php echo $cust_image;?>' width='80' height='80'>
                    <input class="form-control-file" type="file" id="cust_image" name="cust_image" required>
                </div>
            </div>

          <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_cust" name="update_cust"
                           value="Update Customer Now">
                </div>
            </div>
        </form>
    </div>
</div>

