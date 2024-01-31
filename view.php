<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
?>
    <html>

    <head>
        <title>Dashboard</title>
        <link href="css/mystyle.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="login">
                <div class="heading">Dashboard</div>
                <div class="alink"><a href="logout.php">Logout</a></div>
                <div class="profile">
                    <div>Name:<?= $_SESSION['user_name'] ?></div>
                    <div>Email:<?= $_SESSION['user_email'] ?> </div>
                    <div><button class="check-in-btn">Check in </button></div>
                    <div><button class="check-out-btn">Check out </button></div>
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