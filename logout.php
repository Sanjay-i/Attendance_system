<?php

session_start();
//<---- destroyed  valuse ----------->
// $_SESSION['user_id'] = '';

session_destroy();

// echo "success";
header('location:login.php');
