<?php
include('../database.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR | Dashboard</title>

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

    <?php
    include("header.php");
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    if (isset($_POST['add_employee'])) {
        // $id = $_POST['emp_id'];
        $name = $_POST['emp_name'];
        $pass = md5($_POST['emp_password']);
        $email = $_POST['emp_email'];
        $contact = $_POST['emp_contact'];
        $is_admin = $_POST['is_admin'];

        $query = "INSERT INTO user(name, email, password, mobile_number, is_admin) VALUES ('$name','$email','$pass','$contact', $is_admin)";
        $resquery = mysqli_query($data, $query);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "New Employee has been ADded!",
                     type: "success"
                   }).then(function() {
                       window.location = "employee.php";
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
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
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

                        <li class="nav-item">
                            <a href="home.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="employee_attendance.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Attendance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="employee.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="leave.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Leave Type Master
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="department.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    department
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="leave_list.php" class="nav-link">
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


        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Employee List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Employee List</li>
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
                                            <th>Employee ID</th>

                                            <th>Name</th>
                                            <th>Password</th>
                                            <th>contact</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = " SELECT * FROM user ";
                                        $result1 = mysqli_query($data, $sql);
                                        while ($row = mysqli_fetch_array($result1)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['mobile_number']; ?></td>

                                                <td>
                                                    <button class="btn btn-success btn-flat emp_edit" id=""><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-flat emp_delete" id=""><i class="fas fa-trash"></i></button>
                                                </td>
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


        </div>

    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">

                        <!-- <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="emp_password" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="emp_email" placeholder="Enter Password" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-7">
                                <select name="department" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <?php
                                    $sql = "SELECT * FROM department";
                                    $result = mysqli_query($data, $sql);
                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Admin</label>
                            <div class="col-sm-7">
                                <select name="is_admin" class="form-control" required>
                                    <option value="1"> yes</option>

                                    <option value="0"> no</option>

                                </select>
                            </div>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add_employee"><i class="fas fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div id="emp_edit_modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editing...</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>


                        <form method="POST">
                            <div class="modal-body" id="emp_edit_details">
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat" name="emp_update"><i class="fas fa-check"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div id="emp_delete_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST">
                        <div class="modal-body" id="emp_delete_details">
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-danger btn-flat" name="emp_delete"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <?php
    include("footer.php");
    ?>
</body>

</html>