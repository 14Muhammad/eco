<?php
include ('functions/db_connect.php')
?>

<?php
if(isset($_POST['login']))
{
    global $con;
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sel_c = "select * from users where user_pass = '$pass' AND user_email = '$email'";
    $run_c = mysqli_query($con,$sel_c);
    $check_c = mysqli_num_rows($run_c);
    if($check_c==0){
        header('location:'.$_SERVER['PHP_SELF']);
        exit();
    }
    else
    {
        session_start();
        $_SESSION['user_email'] = $email;
        echo "<script> location.href='index.php'</script>";
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
    <style>

        input[id="inputEmail"]:invalid
                           {
                                background-color: red;
                           }
    </style>
</head>
<body class="text-center">
    <form class="login_form" action="" method="post">
        <h3 class="m-3">Admin Login </h3>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" autofocus>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary mt-3" type="submit" name="login">Sign in</button>
    </form>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>