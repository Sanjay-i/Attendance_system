<?php
//<----------- connect with database --------------->

include('database.php');

// $res = mysqli_query($data, "SELECT * FROM department");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | Add_leave</title>

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
    if (isset($_POST['add_department'])) {

        $department_name = $_POST['department'];


        $query = "INSERT INTO department(department) VALUES ('$department_name')";
        $resquery = mysqli_query($data, $query);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "New Employee has been ADded!",
                     type: "success"
                   }).then(function() {
                       window.location = "employee_list.php";
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
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background: #1c2121;">
                            <div class="image">
                                <img src="dist/img/me.jpg" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
                            </div>
                        </span>

                        <form method="POST">
                            <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

            <a href="home.php" class="brand-link">
                <img src="dist\css\js\img\685933.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Employ Attendance</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                        <!---------------- menu bar lists -------------->

                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="" class="nav-link active">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Leave
                                </p>
                            </a>
                        </li>




                    </ul>
                </nav>

            </div>

        </aside>
        <!------- department list table in home page -------------->

        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Leave</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Add_leave</li>
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
                                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> New</button>
                                </div><br>
                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th> ID</th>

                                            <th>Department Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //         while ($row = mysqli_fetch_assoc($res)) {
                                        $sql = " SELECT * FROM department ";
                                        $result1 = mysqli_query($data, $sql);
                                        while ($row = mysqli_fetch_array($result1)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['department'] ?></td>

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

            <!-----add department form page --------->

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Department</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">


                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <label class="col-sm-3 col-form-label"> Add department</label>
                                    <br>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="department" placeholder="Enter deaprtment" required>
                                    </div>
                                </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" name="add_department"><i class="fas fa-submit"></i>submit</button>
                            </form>
                        </div>
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