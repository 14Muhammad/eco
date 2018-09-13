<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<div class="row">
    <div class="col-sm-12">
        <h1>Customers</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_cust = "select * from customers";
            $run_cust = mysqli_query($con,$get_cust);
            $count_cust = mysqli_num_rows($run_cust);
            if($count_cust==0){
                echo "<h2> No Customer found </h2>";
            }
            else {
                $i = 0;
                while ($row_cust = mysqli_fetch_array($run_cust)) {
                    $cust_id = $row_cust['cust_id'];
                    $cust_name = $row_cust['cust_name'];
                    $cust_email = $row_cust['cust_email'];
                    $cust_image = $row_cust['cust_image'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $cust_name; ?></td>
                        <td><?php echo $cust_email; ?></td>
                        <td><img class="img-thumbnail" src='../customer/customer_images/<?php echo $cust_image;?>' width='80' height='80'></td>
                        <td><a href="index.php?del_customer=<?php echo $cust_id?>" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>