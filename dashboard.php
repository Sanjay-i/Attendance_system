<?php
session_start();
include("conn.php");
extract($_REQUEST);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $num = $_POST['num'];

    $result = mysqli_query($data, "insert into user value('','$name','$email','$pass','$num')");

    if ($result) {
        $query = "SELECT ID, Email,Password,Name FROM user WHERE Email='$email' and Password='$pass' and Name='$name'";
        $result1 = mysqli_query($data, $query);
        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_email'] = $row['Email'];
            $_SESSION['user_name'] = $row['Name'];

            // print_r($_SESSION);
            // echo 'successfuly logged';

            header('location:view.php');
        }
    } else {
        echo "somthing wrong";
    }
}
