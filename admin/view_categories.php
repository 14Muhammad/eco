<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
<div class="row">
    <div class="col-sm-12">
        <h1>Categories</h1>
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
            $get_cats = "select * from categories";
            $run_cats = mysqli_query($con, $get_cats);
            $i=0;
            while ($row_cats= mysqli_fetch_array($run_cats)){
                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];
                ?>
                <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td><?php echo $cat_title; ?></td>
                    <td><a href="index.php?edit_cat=<?php echo $cat_id?>" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="index.php?del_cat=<?php echo $cat_id?>" class="btn btn-danger">
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