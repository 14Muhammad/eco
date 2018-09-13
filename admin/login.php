<?php
session_start();
include ('functions/db_connect.php');
$error_msg = '';
if(isset($_POST['login'])){
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user==0){
        $error_msg = 'Password or Email is wrong, try again';
    }
    else{
        $_SESSION['user_email'] = $email;
        if(!empty($_POST['remember'])) {
            setcookie('user_email', $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('user_pass', $pass, time() + (10 * 365 * 24 * 60 * 60));
        } else {
            setcookie('user_email','' );
            setcookie('user_pass', '');
        }
        header('location:index.php?logged_in=You have successfully logged in!');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <title>Admin Login</title>
</head>
<body class="text-center">
    <form class="login_form" action="login.php" method="post">
        <h2 class="text-danger"><?php echo @$_GET['not_admin']?></h2>
        <h2 class="text-primary"><?php echo @$_GET['logged_out']?></h2>
        <h3 class="m-3">Admin Login </h3>
        <div><?php echo $error_msg;?></div>
        <input type="text" id="user_email" name="user_email"
               value="<?php echo @$_COOKIE['user_email']?>" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" id="user_pass" name="user_pass"
               value="<?php echo @$_COOKIE['user_pass']?>" class="form-control" placeholder="Password" required><br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <input class="btn btn-lg btn-primary mt-3" type="submit" name="login" value="Sign in">
    </form>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>



