<?php
if(!isset($_SESSION['user_email']))
{
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['detail_cust'])) {
    $get_id = $_GET['detail_cust'];
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


?>

<div class="row">
    <div class="col-sm-12">
        <h1>Customer</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td><?php echo $cust_name; ?></td>
                <td><?php echo $cust_email; ?></td>

                <td><?php echo $cust_pass; ?></td>
                <td><?php echo $cust_country; ?></td>
                <td><?php echo $cust_city; ?></td>
                <td><?php echo $cust_contact; ?></td>
                <td><?php echo $cust_address; ?></td>
                <td><img class="img-thumbnail" src='../customer/customer_images/<?php echo $cust_image;?>' width='80' height='80'></td>

            </tbody>
        </table>
    </div>
</div>
