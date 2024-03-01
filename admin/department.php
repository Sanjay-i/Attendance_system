<?php
//<----------- connect with database --------------->

include('../database.php');

// $res = mysqli_query($data, "SELECT * FROM department");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | depaertment</title>

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

 <!---------- delete query in user table --------------->
 <?php
    if (isset($_GET['id'])) {

        if ($_GET['action'] == 'delete') {

            $id = $_GET['id'];

            $sql = "DELETE FROM `department` WHERE id = '$id'";
            $result = mysqli_query($data, $sql);
        }
    } else {
        echo " fdf ";
    }
    ?>

<!----- add new departments-------------->
    <?php
    if (isset($_POST['add_department'])) {

        $department_name = $_POST['department'];


        $query = "INSERT INTO department(department) VALUES ('$department_name')";
        $resquery = mysqli_query($data, $query);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "New department  Added!",
                     type: "success"
                   }).then(function() {
                       
                   });
             }, 30);
         </script>';
    }

    ?>
     <!------------------update query user table ----------->
     <?php
    if (isset($_POST['update_department'])) {

        $id =$_POST['id'];
        $department = $_POST['department'];

      
       

        $sql = "UPDATE department SET department = '$department' 
        WHERE id = '$id'";
        $result = mysqli_query($data, $sql);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "Updated department!",
                     type: "success"
                   }).then(function() {
                       window.location = "department.php";
                   });
             }, 30);
         </script>';
    } else {
        echo "update note success";
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
                        <!---------------- menu bar lists -------------->

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
        <!------- department list table in home page -------------->

        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Department </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">department</li>
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
                                            <th>S.No</th>
                                       <!--  <th> ID</th> -->
                                            <th>Department Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //         while ($row = mysqli_fetch_assoc($res)) {
                                        $sql = " SELECT * FROM department ";
                                        $result1 = mysqli_query($data, $sql);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result1)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                            <!--<td>?php echo $row['id'] ?></td>-->
                                                <td><?php echo $row['department'] ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-flat department_edit" data-id="<?php echo $row['id'];  ?>"  id=""><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-flat department_delete" onclick="delete_leave(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i></button>
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
                                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class=""></i> Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="add_department"><i class="fas fa-submit"></i>submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!--------update---->
            <div class="modal fade" id="modal-default-update">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Department</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" id="DepartmentForm" enctype="multipart/form-data">


                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <label class="col-sm-3 col-form-label"> Update department</label>
                                    <br>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="department" name="department" placeholder="Enter deaprtment" required>
                                    </div>
                                </div>

                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class=""></i> Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="update_department"><i class="fas fa-submit"></i>update</button>

                                 <input type="hidden" name="id" id="id" />
                                </div>
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
    <!--- delete -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        function update_leave_status(id, select_value) {
            window.location.href = 'department.php?id=' + id + '&status=' + select_value + '&action=update';
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
                    window.location.href = 'department.php?id=' + id + '&action=delete';
                }
            });
            
        }
    
    </script>

    <!---update---->
    <script>
//<------- update user table condition ---------->    

    $('.department_edit').click(function() {
        var id = $(this).data("id");
        $.ajax({
            url:'get_employee.php',
            method:"POST",
            data:{department_id:id},
            dataType:"json",
            success:function(data){  
                var result = data;   
                console.log(result);  
                var item = result.record;      
                $("#modal-default-update").on("shown.bs.modal", function () { 
                    $('#DepartmentForm')[0].reset();
                    
                    $('#department').val(item['department']);
                    $('#id').val(item['id']); 
                   
                    $('.modal-title').html("<i ></i> Update department");
                  
                    $('#save').val('Save');

                }).modal({
                    backdrop: 'static',
                    keyboard: false
                });         
            }
        });
    });
    
    </script>

</body>

</html>