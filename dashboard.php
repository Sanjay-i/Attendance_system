<!-- php
session_start();
include("database.php");
extract($_REQUEST);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $pass = $_POST['pass'];


    $result = mysqli_query($data, "INSERT INTO user VALUES('','$name','','$pass','')");

    if ($result) {
        $query = "SELECT ID,Password,Name FROM user WHERE Password='$pass'";
        $result1 = mysqli_query($data, $query);
        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_password'] = $row['Password'];
            $_SESSION['user_name'] = $row['Name'];

            // print_r($_SESSION);
            // echo 'successfuly logged';

            header('location:view.php');
        }
    } else {
        echo "somthing wrong";
    }
} -->
<!--------- home page or  welcome page ------------->
<?php
session_start();

// print_r($_SESSION);
if (isset($_SESSION['Name'])) {
    include('database.php');

    /*--------- display time when user click check-in check-out ---------> */

    $userId = $_SESSION["user_id"];
    $checkInTime = "";
    $checkOutTime = "";
    $query = "SELECT * FROM attendance WHERE userId = '$userId' AND DATE(checkIn) = CURDATE()";
    $result1 = mysqli_query($data, $query);
    if (mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);

        $checkInTime = $row['checkIn'];
        $checkOutTime = $row['checkOut'];
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Management | Home page </title>
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

        <!------------------- added header portion ---------------------->
        <?php
        include("header.php");
        ?>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">

                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user"></i>
                            <span class="hidden-xs"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
                                <div class="image">
                                    <img src="" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
                                </div>
                            </span>

                            <!----------------------------home page side menubare options ------------------------------->
                            <form method="POST">
                                <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

                <a href="" class="brand-link">
                    <img src="dist\css\js\img\685933.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">
                        <div>ID:<?= $_SESSION['user_id'] ?></div>
                        <div>Name:<?= $_SESSION['Name'] ?></div>
                    </span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                            <!---------------- menu lists -------------->

                            <li class="nav-item">
                                <a href="home.php" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>





                            <li class="nav-item">
                                <a href="leave.php" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Leave Type
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="leave_list.php" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Leave Management
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </aside>
            <!---------------------------right side link options ----------------------------------------->
            <div class="content-wrapper">
                <div class="content-header">
                    <div style="padding-top: 10px;">
                        <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> .</marquee>
                    </div>
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                            <div class="container">
                                <div class="login">
                                    <div class="profile">
                                        <div><button onclick=checkIn() class="check-in-btn">Check in </button></div>
                                        <span id="checkin-time"> <?= $checkInTime; ?> </span>
                                        <div><button onclick=checkOut() class="check-out-btn">Check out </button></div>
                                        <span id="checkout-time"> <?= $checkOutTime != '0000-00-00 00:00:00' ? $checkOutTime : ''; ?> </span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!------------ display the home page options like status and total employee,on time ---------------------->

            </div>
            <div>
                <p class="footer_copy " style="text-align: center;"><?php echo "20" . date("y"); ?> © <a href="https://developerrony.com"> welcome</a>. All right reserved by <a href="">sanjay</a> </p>

            </div>
            <!------------------ added footer portion --------------------->
            <?php
            include("footer.php");
            ?>
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="plugins/datatables/jquery.dataTables.js"></script>
            <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
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
                            if (decodeData.status) {
                                $("#checkin-time").html(decodeData.time);
                            }
                            alert(decodeData.message);
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
                            if (decodeData.status) {
                                $("#checkout-time").text(decodeData.time);
                            }
                            alert(decodeData.message);
                        }
                    });

                }
            </script>
    </body>

    </html>

<?php
} else {
    header('location:login.php');
}

?>