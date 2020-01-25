<div class="modal-dialog" style="width:40%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$salarySettings->id?'Edit':'Add' }} Employee Salary</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.salary.settings.store',@$salarySettings->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="salary_settings_table">
        {{ csrf_field() }} 
          <div class="row">
            <div class="col-lg-12 form-group">
             <label>Designation</label>
             <select name="designation" class="form-control">
                 <option selected disabled>Select Department</option> 
                 @foreach ($Designations as $Designations)
                  <option value="{{ $Designations->id }}"{{ @$salarySettings->designation_id==$Designations->id?'selected':'' }}>{{ $Designations->name }}</option>  
                 @endforeach
              </select> 
             </div>
             <div class="col-lg-12 form-group">
             <label>Employee Name</label>
             <select name="employee" class="form-control">
                 <option selected disabled>Select Department</option> 
                 @foreach ($employees as $employee)
                  <option value="{{ $employee->id }}"{{ @$salarySettings->employee_id==$employee->id?'selected':'' }}>{{ $employee->name }}</option>  
                 @endforeach
              </select> 
             </div>
            
             <div class="col-lg-12 form-group text-center">
             <input type="submit" class="btn btn-success" style="margin-top: 20px">
             </div> 
          </div>
        </form>
     </div>
   </div>
</div>





