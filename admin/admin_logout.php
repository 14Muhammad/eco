<?php
session_start();
session_destroy();
if(isset($_POST['logout'])) {
    header('location: index.php');
}
?>
<html>
<head>

</head>
<body style="background:gray">
<div style="color:skyblue  margin: auto; text-align: center;" >
    <p style="color:skyblue">for logout the admin panal</p>
    <tr style="font_color:white"> <input type="submit" name="logout" value="logout"></tr>
</div>
</body>

</html>
