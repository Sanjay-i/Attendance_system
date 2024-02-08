
<?php
date_default_timezone_set('Asia/Kolkata');

include('database.php');

$result;
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    $checkIn = $_POST['checkIn'];
    $currentDateTime = date('Y-m-d H:i:s');

    // <--------------------------------select only current date and time ----------------->

    if ($checkIn == 'true') {
        $query = "SELECT userId FROM attendance WHERE userId = '$userId' AND DATE(checkIn) = CURDATE()";
        $result1 = mysqli_query($data, $query);

        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => false,
                "message" => 'Already checked in'
            );
        } else {
            $rquery = mysqli_query($data, "INSERT INTO attendance(userId, checkIn) VALUES('$userId','$currentDateTime')");
            $result = array(
                "status" => true,
                "message" => 'CheckIn Successfully',
                'time' => $currentDateTime
            );
        }
        //<------------------ old data display message already check in and out ----------->     
    } else {
        $query = "SELECT userId FROM attendance WHERE userId = '$userId' AND DATE(checkOut) = CURDATE()";
        $result1 = mysqli_query($data, $query);

        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => false,
                "message" => 'Already checked out'
            );
        } else {
            $rquery = mysqli_query($data, "UPDATE attendance SET checkOut = '$currentDateTime' WHERE userId = '$userId' ");
            $result = array(
                "status" => true,
                "message" => 'Checkout Successfully',
                'time' => $currentDateTime
            );
        }
    }
}

echo json_encode($result);
