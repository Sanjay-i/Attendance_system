<?php

session_start();

if(isset($_SESSION) && $_SESSION['is_admin'] == 1) {
   echo '<script>window.location.href = "admin/index.php";</script>'; 
   exit;
} 