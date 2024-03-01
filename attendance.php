
<?php
date_default_timezone_set('Asia/Kolkata');  // ----------> get indian time

include('database.php');

$result;
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $check_in = $_POST['check_in'];
    $currentDateTime = date('Y-m-d H:i:s');
    // <--------------------------------check new time or old time ----------------->

    if ($check_in == 'true') {
        $query = "SELECT user_id FROM attendance WHERE user_id = '$user_id' AND DATE(check_in) = CURDATE()";
        $result1 = mysqli_query($data, $query);

        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => false,
                "message" => 'Already checked in'
            );
        } else {
            $rquery = mysqli_query($data, "INSERT INTO attendance(user_id, check_in) VALUES('$user_id','$currentDateTime')");
            $result = array(
                "status" => true,
                "message" => 'CheckIn Successfully',
                'time' => $currentDateTime
            );
        }
        //<------------------ old data display message already check in and out ----------->     
    } else {
        $query = "SELECT user_id FROM attendance WHERE user_id = '$user_id' AND DATE(check_out) = CURDATE()";
        $result1 = mysqli_query($data, $query);

        if (mysqli_num_rows($result1) > 0) {
            $result = array(
                "status" => false,
                "message" => 'Already checked out'
            );
        } else {
            $getQuery = "SELECT check_in, user_id FROM attendance WHERE user_id = '$user_id' AND DATE(check_in) = CURDATE()";
            $getResult = mysqli_query($data, $getQuery);
            $getRow = mysqli_fetch_assoc($getResult);
            $check_in = new DateTime($getRow['check_in']);
            $check_out = new DateTime($currentDateTime);

            //-----> Calculate the difference between check-in and check-out times
            $difference = date_diff($check_in, $check_out);

            //-----> Format the difference as hours and minutes
            $totalHours = $difference->format('%h hours %i minutes %s seconds');

            $rquery = mysqli_query($data, "UPDATE attendance SET check_out = '$currentDateTime', total_hours = '$totalHours' WHERE user_id = '$user_id' ");
            $result = array(
                "status" => true,
                "message" => 'Checkout Successfully',
                'time' => $currentDateTime
            );
        }
    }
}

echo json_encode($result);
