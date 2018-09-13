<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<div class="row">
    <div class="col-sm-12">
        <h1>Brands</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $get_brands = "select * from brands";
            $run_brands = mysqli_query($con, $get_brands);
            $i=0;
            while ($row_brands= mysqli_fetch_array($run_brands)){
                $brand_id = $row_brands['brand_id'];
                $brand_title = $row_brands['brand_title'];
                ?>
                <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td><?php echo $brand_title; ?></td>
                    <td><a href="index.php?edit_brand=<?php echo $brand_id?>" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="index.php?del_brand=<?php echo $brand_id?>" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>