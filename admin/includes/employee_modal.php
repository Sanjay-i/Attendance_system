<!-------------- Add Employees ----------------------------->

<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Employee</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="reference_number" class="col-sm-3 control-label">Reference Number</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="reference_number" name="reference_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone Number</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="residence_status" class="col-sm-3 control-label">Residence Status</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="residence_status" id="residence_status" required>
                                <option value="" selected>- Select -</option>
                                <option value="Resident">Resident</option>
                                <option value="Non-Resident">Non-Resident</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="residence" class="col-sm-3 control-label">Residence</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="residence" name="residence">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admission_year" class="col-sm-3 control-label">joined Year</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="admission_year" name="admission_year">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>