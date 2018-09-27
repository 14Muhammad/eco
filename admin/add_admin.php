<?php
/**
 * Created by PhpStorm.
 * User: saadi
 * Date: 27-Sep-18
 * Time: 02:29 PM
 */
include ('functions/db_connect.php');
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
?>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <h2 class="offset-lg-3 offset-md-2 offset-1 "> Add Admin </h2>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">New Admin Email</label>
                    <div class="col-12 col-sm-8 col-lg-9">
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email..."
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="pro_title">New Admin Password</label>
                    <div class="col-12 col-sm-8 col-lg-9">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password..."
                                required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-3 col-12 col-sm-6">
                        <input class="btn btn-block btn-primary btn-lg" type="submit" id="add" name="add"
                               value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
if(isset($_POST['add'])){
    //getting text data from the fields
    $email = $_POST['email'];
    $user_pass = $_POST['password'];

    $add_admin = "insert into admins (user_email, user_pass) 
                  VALUES ('$email','$user_pass');";
    $insert_admin = mysqli_query($con, $add_admin);
}

?>