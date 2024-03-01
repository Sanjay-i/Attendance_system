<?php

session_start();


if(isset($_SESSION) && $_SESSION['is_admin'] != 1) {
   echo '<script>window.location.href = "index.php";</script>'; 
   exit;
} 