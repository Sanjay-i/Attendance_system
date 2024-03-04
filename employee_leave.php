<?php
//<----------- connect with database --------------->
session_start();
include('database.php');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee |Leave</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
  //<----------insert apply leave type into leave table ---------> 
   
    if (isset($_POST['add_leave'])) {

        $leave_type_id = $_POST['leave_type_id'];
        $leave_from = $_POST['leave_from'];
        $leave_to = $_POST['leave_to'];
        $employee_id = $_SESSION['user_id'];
        $leave_description = $_POST['leave_description'];

        $query = "INSERT INTO `leave` (`employee_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_description`, `leave_status`) VALUES ('$employee_id', '$leave_type_id', '$leave_from', '$leave_to', '$leave_description', '0')";

        $resquery = mysqli_query($data, $query);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "Leave Applyed!",
                     type: "success"
                   }).then(function() {
                       window.location = "employee_leave.php";
                   });
             }, 30);
         </script>';
    }

    ?>

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
                        <br>
                  <!--  <div>id:?= $_SESSION['user_id'] ?></div> -->
                        <div>Email:<?= $_SESSION['email'] ?></div>
                    </span>
                </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                        <!---------------- menu bar lists -------------->

                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                                <a href="employee_leave.php" class="nav-link">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Leave
                                    </p>
                                </a>
                            </li>


                    </ul>
                </nav>

            </div>

        </aside>
    <!--------------------leave apply page---------------------->

        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Apply Leave</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Leave</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="right">
                                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>Add Leave</button>
                                </div><br>

              <!---------- showing table in leave apply page ----------->

                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                     
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = " SELECT * FROM `leave`";
                                        $result1 = mysqli_query($data, $sql);
                                        while ($row = mysqli_fetch_array($result1)) {

                                        ?>
                                            <tr>
                                          
                                                <td><?php echo date("d-m-Y   ", strtotime($row['leave_from'])); ?></td>
                                                <td><?php echo date("d-m-Y  ", strtotime($row['leave_to'])); ?></td>
                                                <td><?php echo $row['leave_description']; ?></td>
                                                
                                                <td>
                                                    <?php
                                                    if ($row['leave_status'] == 0) {
                                                        echo "Applied";
                                                    }
                                                    if ($row['leave_status'] == 1) {
                                                        echo "Approved";
                                                    }
                                                    if ($row['leave_status'] == 2) {
                                                        echo "Rejected";
                                                    } ?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!---------------------------------------add leave employee ------------------>
<!------------------------------------------------------------------------------------->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Leave</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Leave Type</label>
                                        <div class="col-sm-9">
                                            <select name="leave_type_id" class="form-control" required>
                                                <option hidden>Select Leave -</option>
                                                <?php
                                                $sql = "SELECT * FROM leave_type";
                                                $result = mysqli_query($data, $sql);
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['leave_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="leave_from" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="leave_to" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Leave Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="leave_description" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i ></i> Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="add_leave"><i></i> Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

</body>

</html>