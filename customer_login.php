<?php
if(isset($_POST['login']))
{
    global $con;
    $ip = getIp();
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];
    $sel_c = "select * from customers where cust_pass = '$c_pass' AND cust_email = '$c_email'";
    $run_c = mysqli_query($con,$sel_c);
    $check_c = mysqli_num_rows($run_c);
    if($check_c==0){
        header('location:'.$_SERVER['PHP_SELF']);
        exit();
    }
    $sel_cart = "select * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_c > 0 && $check_cart ==0){
        $_SESSION['customer_email'] = $c_email;
        header('location: my_account.php');
    }else{
        echo "here2";
        $_SESSION['customer_email'] = $c_email;
        header('location: checkout.php');
    }
}
?>
<div>
    <form method="post" action="">
        <table width="500" align="center" bgcolor="skyblue">
            <tr align="center">
                <td colspan="2"><h2>Login or Register to Buy!</h2></td>
            </tr>
            <tr>
                <td align="right"><b>Email: </b></td>
                <td><input type="text" name="email"  placeholder="Enter email" required></td>
            </tr>
            <tr>
                <td align="right"><b>Password:</b></td>
                <td><input type="password" name="pass" placeholder="Enter password" required></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="checkout.php?forgot_pass">Forgot Password? </a></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
        <h2 style="padding: 5px;float: left;">
            <a style="text-decoration: none;" href="customer_register.php">Register Here</a>
        </h2>
    </form>
</div>
