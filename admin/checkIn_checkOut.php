<?php
session_start();

if (isset($_SESSION['user_password']) && isset($_SESSION['user_name'])) {
    include('../database.php');

    /*--------- display time when user click check-in check-out ---------> */

    $userId = $_SESSION["user_id"];
    $checkInTime = "";
    $checkOutTime = "";
    $query = "SELECT * FROM attendance WHERE userId = '$userId'";
    $result1 = mysqli_query($data, $query);
    if (mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);

        $checkInTime = $row['checkIn'];
        $checkOutTime = $row['checkOut'];
    }
?>
    <html>

    <head>
        <title>Dashboard</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </head>
    <!-------check in check-out page -------------------------->

    <body>
        <div class="container">
            <div class="login">
                <div class="heading">Dashboard</div>
                <div class="alink"><a href="logout.php">Logout</a></div>
                <div class="profile">
                    <div>ID:<?= $_SESSION['user_id'] ?></div>
                    <div>Name:<?= $_SESSION['user_name'] ?></div>
                    <div>Password:<?= $_SESSION['user_password'] ?> </div>
                    <div><button onclick=checkIn() class="check-in-btn">Check in </button></div>
                    <span id="checkin-time"> <?= $checkInTime; ?> </span>
                    <div><button onclick=checkOut() class="check-out-btn">Check out </button></div>
                    <span id="checkout-time"> <?= $checkOutTime != '0000-00-00 00:00:00' ? $checkOutTime : ''; ?> </span>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header('location:index.php');
}

?>