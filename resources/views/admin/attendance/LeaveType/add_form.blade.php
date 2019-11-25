  
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$leaveType->id? 'Edit' : 'Add' }} Leave Type</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.attendance.leave.type.store',@$leaveType->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="leave_type_student">
                   {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Name</label>
                      <input type="text" class="form-control" name="name" maxlength="50" value="{{ @$leaveType->name }}" placeholder="Enter Name"> 
                      </div> 
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Code</label>
                      <input type="text" class="form-control" name="leave_code" maxlength="5" value="{{ @$leaveType->leave_code }}" placeholder="Enter Code"> 
                      </div> 
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Total Days</label>
                      <input type="text" class="form-control" name="total_days" maxlength="3" value="{{ @$leaveType->total_days }}" placeholder="Enter Days" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                      </div> 
                    </div>
                    <div class="col-lg-12 text-center">
                       <input type="submit" class="btn btn-success">   
                     </div>  
                  </div>
             </form>
                  
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
