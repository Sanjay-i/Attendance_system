<?php
//<----------- connect with database --------------->

include('../database.php');
include("check_session.php")
?>
<!DOCTYPE html>
<html>
<!-------------------------leave approval page ---------------->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Leave</title>

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
    <!---delete  sweetealert ---->
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    if (isset($_GET['leave_id'])) {

        $leave_id = $_GET['leave_id'];

        if ($_GET['action'] == 'delete') {

            

            $sql = "DELETE FROM `leave` WHERE id = '$leave_id'";
            $result = mysqli_query($data, $sql);
        } else {


            $leave_status = $_GET['status'];

            $query = "UPDATE `leave` SET leave_status = '$leave_status' WHERE id = '$leave_id' ";
            echo $query;
            $resquery = mysqli_query($data, $query);
        }
    } else {
        echo "somthing wrong";
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
                            <a href="index.php"> <button type="button" name="logout" class="dropdown-item dropdown-footer">Logout</button></a>
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
                        <!---------------- menu lists -------------->

                        <li class="nav-item">
                            <a href="home.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="employee_attendance.php" class="nav-link active">
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

                        <li class="nav-item">

                        <li class="nav-item">
                            <a href="leave.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Leave Type
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
        <!------- leave  list table in home page -------------->

        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Leave List</h1>
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

                                    <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                        <!--    <th>ID</th> -->
                                                <th>Name</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Description</th>
                                                <th>Leave Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT leave.id AS leave_id, leave.employee_id, leave.leave_from, leave.leave_to, leave.leave_description, leave.leave_status, user.name, user.id FROM `leave` LEFT JOIN `user` ON user.id = leave.employee_id";
                                            $result1 = mysqli_query($data, $sql);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result1)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                             <!--   <td>?php echo $row['leave_id']; ?></td> -->
                                             <!--   <td>?php echo $row['name'] . '(' . $row['employee_id'] . ')'; ?></td>--->
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['leave_from']; ?></td>
                                                    <td><?php echo $row['leave_to']; ?></td>
                                                    <td><?php echo $row['leave_description']; ?></td>

                                                    <td>
                                                        <?php
                                                        if ($row['leave_status'] == '0') {
                                                            echo "Applied";
                                                        }
                                                        if ($row['leave_status'] == '1') {
                                                            echo "Approved";
                                                        }
                                                        if ($row['leave_status'] == '2') {
                                                            echo "Rejected";
                                                        }
                                                        ?>
                                                        <select onchange="update_leave_status(<?php echo $row['leave_id']; ?>, this.options[this.selectedIndex].value)">
                                                            <option value="">Update Status</option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <!--   <button class="btn btn-success btn-flat emp_edit" id=""><i class="fas fa-edit"></i></button>  --->
                                                        <button class="btn btn-danger btn-flat emp_delete" onclick=delete_leave(<?php echo $row['leave_id']; ?>)><i class="fas fa-trash"></i></button>
                                                    </td>



                                                </tr>
                                            <?php
                                                $i++;
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

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
     <!--- delete -->
     <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script> -->
    <script>
         $(function() {
             $("#example1").DataTable();
             /* $('#example2').DataTable({
                 "paging": true,
                 "lengthChange": false,
                 "searching": false,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
             }); */
         });
    </script>
    <script>
        function update_leave_status(id, select_value) {
            window.location.href = 'leave_list.php?leave_id=' + id + '&status=' + select_value + '&action=update';
        }
     //<-----delete -------->   
        function delete_leave(id) { 
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    window.location.href = 'leave_list.php?leave_id=' + id + '&action=delete';
                }
            });
            
        }
    
    </script>
</body>

</html>