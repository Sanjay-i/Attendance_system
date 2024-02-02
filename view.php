<?php
session_start();

if (isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
?>
    <html>

    <head>
        <title>Dashboard</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </head>
    <!-------check in check-out page----->

    <body>
        <div class="container">
            <div class="login">
                <div class="heading">Dashboard</div>
                <div class="alink"><a href="logout.php">Logout</a></div>
                <div class="profile">
                    <div>ID:<?= $_SESSION['user_id'] ?></div>
                    <div>Name:<?= $_SESSION['user_name'] ?></div>
                    <div>Email:<?= $_SESSION['user_email'] ?> </div>
                    <div><button onclick=checkIn() class="check-in-btn">Check in </button></div>
                    <span id="time"> </span>
                    <div><button onclick=checkOut() class="check-out-btn">Check out </button></div>
                </div>
            </div>
        </div>
    </body>

    <!------- add to id datetime check-in check-out ---->
    <script>
        function checkIn() {
            let dateTime = new Date().toDateString();
            $.ajax({
                type: "POST",
                url: "attendance.php",
                data: {
                    "userId": <?php echo $_SESSION['user_id']; ?>,
                    "checkIn": true,
                },
                success: function(data) {
                    let decodeData = JSON.parse(data);
                    if (data.status == true) {
                        alert("Checkin Successfully");
                    } else {
                        alert("already you checked in!!!");
                    }
                }
            });
        }

        //<!---------check-out button onclick function ------>  

        function checkOut() {
            let dateTime = new Date().toDateString();
            $.ajax({
                type: "POST",
                url: "attendance.php",
                data: {
                    "userId": <?php echo $_SESSION['user_id']; ?>,
                    "checkIn": false
                },
                success: function(data) {
                    let decodeData = JSON.parse(data);
                    if (data.status == true) {
                        alert("Checkout Successfully");
                    } else {
                        alert("already you checkout !!!");
                    }
                }
            });

        }
    </script>

    </html>
<?php
} else {
    header('location:index.php');
}

?>