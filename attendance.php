
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
            $getQuery = "SELECT checkIn, userId FROM attendance WHERE userId = '$userId' AND DATE(checkIn) = CURDATE()";
            $getResult = mysqli_query($data, $getQuery);
            $getRow = mysqli_fetch_assoc($getResult);
            $checkIn = new DateTime($getRow['checkIn']);
            $checkOut = new DateTime($currentDateTime);

            // Calculate the difference between check-in and check-out times
            $difference = date_diff($checkIn, $checkOut);

            // Format the difference as hours and minutes
            $totalHours = $difference->format('%h hours %i minutes %s seconds');

            $rquery = mysqli_query($data, "UPDATE attendance SET checkOut = '$currentDateTime', total_hours = '$totalHours' WHERE userId = '$userId' ");
            $result = array(
                "status" => true,
                "message" => 'Checkout Successfully',
                'time' => $currentDateTime
            );
        }
    }
}

echo json_encode($result);
