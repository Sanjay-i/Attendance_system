<?php
session_start();
//<---- destroyed  valuse ----------->
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);

// echo "success";
header('location:index.php');
