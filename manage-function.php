<!-- php
include('database.php');

extract($_REQUEST);

$query = "SELECT * from user where Name='$name' and Password='$pass'  ";

$result = mysqli_query($data, $query);
echo $result;

if (mysqli_num_rows($result) > 0) {
} -->
<?php

if (isset($_POST["edit_sched"])) {
    $id = $_POST['del_id'];
    $in = $_POST['sched_update_in'];
    $out = $_POST['sched_update_out'];

    $sql = "UPDATE emp_sched SET sched_in = '$in', sched_out = '$out' WHERE sched_id = '$id'";
    $result = mysqli_query($db, $sql);

    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_sched.php";
                  });
            }, 30);
        </script>';
}
//--------------------------------------
if (isset($_POST["emp_update"])) {
    $card = $_POST["id"];
    $fname = $_POST['update_fname'];
    $lname = $_POST['update_lname'];
    $address = $_POST['update_address'];
    $contact = $_POST['update_contact'];
    $gender = $_POST['update_gender'];

    $sql = "UPDATE emp_list SET emp_fname = '" . $fname . "', emp_lname = '" . $lname . "', emp_address = '" . $address . "', emp_contact = '" . $contact . "', emp_gender = '" . $gender . "'
     WHERE emp_id = '" . $card . "'";
    $result = mysqli_query($db, $sql);

    echo '<script>
              setTimeout(function() {
                  Swal.fire({
                      title: "Success !",
                      text: "Employee Information has been updated !",
                      type: "success"
                    }).then(function() {
                        window.location = "employee_list.php";
                    });
              }, 30);
          </script>';
}

//---------------------------------------
if (isset($_POST["leave_status"])) {
    // $id = $_POST['del_id'];

    $sql = "DELETE FROM leave WHERE id = '$leave_id'";
    $result = mysqli_query($data, $sql);

    echo "Employee has been Deleted !";
}
