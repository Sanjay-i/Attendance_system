<?php
include('../database.php');

//<------------- update for users-------->

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $result;
    $query = "SELECT * FROM user WHERE id = '$id' ";
    $result1 = mysqli_query($data, $query);
    if (mysqli_num_rows($result1) > 0) {
        $result = array(
            "status" => true,
            "record" => mysqli_fetch_assoc($result1) 
        ); 
    } else{
        $result = array(
            "status" => false,
            "record" => [] 
        );
    }
    echo json_encode($result);

}

//<------- udate for department ---------->

    if(isset($_POST['department_id'])){
        $id = $_POST['department_id'];
        $result;
        $query = "SELECT * FROM department WHERE id = '$id' ";
        $result1 = mysqli_query($data, $query);
        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => true,
                "record" => mysqli_fetch_assoc($result1) 
            ); 
        } else{
            $result = array(
                "status" => false,
                "record" => [] 
            );
        }
        echo json_encode($result);

    }

 //<------- udate for leave_type ---------->

    if(isset($_POST['leavetype_id'])){
        $id = $_POST['leavetype_id'];
        $result;
        $query = "SELECT * FROM leave_type WHERE id = '$id' ";
        $result1 = mysqli_query($data, $query);
        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => true,
                "record" => mysqli_fetch_assoc($result1) 
            ); 
        } else{
            $result = array(
                "status" => false,
                "record" => [] 
            );
        }
        echo json_encode($result);

    }


?>
           

