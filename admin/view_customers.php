<h1> Cutomers Data</h1>
<table class="table table-bordered">
    <div class="table responsive">
        <thead>
            <tr>
              <th> Name</th>
              <th>Email</th>
              <th>Country</th>
                <th>City</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $get_cats = "select * from customers";
    $run_cats = mysqli_query($con, $get_cats);
    while($row_cats= mysqli_fetch_array($run_cats)) {
        $cust_id= $row_cats['cust_id'];
        $cust_name = $row_cats['cust_name'];
        $cust_email = $row_cats['cust_email'];
        $cust_country = $row_cats['cust_country'];
        $cust_city = $row_cats['cust_city'];
        $cust_contact = $row_cats['cust_contact'];
        $cust_address = $row_cats['cust_address'];
        $image = $row_cats['cust_image'];
        echo "<tr>
                      <td>$cust_name</td>
                      <td>$cust_email</td>
                      <td>$cust_country</td>
                      <td>$cust_city</td>
                      <td>$cust_contact</td>
                      <td>$cust_address</td>
                     <td><img src='../customer/customer_images/$image' width='50px' height='50px'></td>
                  </tr>";
    }
    ?>
        </tbody>
    </div>
</table>