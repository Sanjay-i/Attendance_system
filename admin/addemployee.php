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
    <script src="dist/js/1.js"></script>
    <script src="dist/js/2.js"></script>
    <script src="dist/js/3.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

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

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Employee Tag</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_tag" placeholder="Enter Card Tag" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Firstname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Lastname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_lastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_address" placeholder="Enter Address" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact Info</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-7">
                                <select name="emp_gender" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not">Prefer Not to say</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-7">
                                <select name="emp_position" class="form-control" required>
                                    <option hidden> - Select -</option>

                                    <option value=""></option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Schedule</label>
                            <div class="col-sm-7">
                                <select name="emp_schedule" class="form-control" required>
                                    <option hidden> - Select -</option>

                                    <option value="">- </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

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
    <script>
        $(document).ready(function() {
            $('.emp_delete').click(function() {
                var emp_del_id = $(this).attr("id");
                $.ajax({
                    url: "controller.php",
                    method: "post",
                    data: {
                        emp_del_id: emp_del_id
                    },
                    success: function(data) {
                        $('#emp_delete_details').html(data);
                        $('#emp_delete_modal').modal("show");
                    }
                });
            });
        });
    </script>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>