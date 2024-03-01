<?php

session_start();
//<---- destroyed  valuse ----------->


session_destroy();

// echo "success";
header('location:index.php');