<?php
session_start();
session_destroy();
header('location:login.php?logged_out=You have logged out');