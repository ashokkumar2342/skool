  
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:80%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$leaveRecord->id? 'Edit' :'Add' }} Leave Apply</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.attendance.leave.store',@$leaveRecord->id) }}" method="post" class="add_form" button-click="btn_click_list_show,btn_close" select-triger="student_div">
                   {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Academic Year</label>
                        <select name="year_id" class="form-control ">
                              <option selected disabled>Select Academic Year</option> 
                          @foreach ($academicYears as $academicYear)
                              <option value="{{ $academicYear->id }}"{{ @$leaveRecord->year_id==$academicYear->id?'selected' : '' }}>{{ $academicYear->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Leave Type</label>
                        <select name="leave_id" class="form-control ">
                              <option selected disabled>Select Leave Type</option> 
                          @foreach ($leaveTypes as $leaveType)
                              <option value="{{ $leaveType->id }}"{{ @$leaveRecord->leave_id==$leaveType->id?'selected' : '' }}>{{ $leaveType->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Student Name</label>
                        <select name="student_id" class="form-control select2">
                              <option selected disabled>Select Student</option> 
                          @foreach ($students as $student)
                              <option value="{{ $student->id }}"{{ @$leaveRecord->student_id==$student->id?'selected' : '' }}>{{ $student->registration_no }}--{{ $student->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Apply Date</label>
                        <input type="date" name="apply_date" class="form-control" value="{{ @$leaveRecord->apply_date }}"> 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"  value="{{ @$leaveRecord->from_date }}"> 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control"  value="{{ @$leaveRecord->to_date }}"> 
                      </div> 
                    </div>
                    <div class="col-lg-12 text-center">
                       <input type="submit" class="btn btn-success">   
                     </div>  
                  </div>
                   </div>
             </form>
                  
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
