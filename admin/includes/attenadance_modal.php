<!------ Add attendace ---------------------->


<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Attendance</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="attendance_add.php">
                    <div class="form-group">
                        <label for="reference_number" class="col-sm-3 control-label">Reference Number</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="reference_number" name="reference_number" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-9">
                            <div class="date">
                                <input type="text" class="form-control" id="datepicker_add" name="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time_in" class="col-sm-3 control-label">Time In</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_in" name="time_in">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_out" name="time_out">
                            </div>
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