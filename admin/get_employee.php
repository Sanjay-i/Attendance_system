<?php
include('../database.php');

//<-------------for update users-------->

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

?>
           

