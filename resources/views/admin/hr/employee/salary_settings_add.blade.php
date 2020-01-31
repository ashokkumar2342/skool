<div class="modal-dialog" style="width:40%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$salarySettings->id?'Edit':'Add' }} Salary Settings</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.salary.settings.store',@$salarySettings->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="salary_settings_table">
        {{ csrf_field() }} 
          <div class="row">
            {{-- <div class="col-lg-12 form-group">
             <label>Designation</label>
             <select name="designation" class="form-control">
                 <option selected disabled>Select Department</option> 
                 @foreach ($Designations as $Designations)
                  <option value="{{ $Designations->id }}"{{ @$salarySettings->designation_id==$Designations->id?'selected':'' }}>{{ $Designations->name }}</option>  
                 @endforeach
              </select> 
             </div> --}}
             <div class="col-lg-12 form-group">
             <label>Employee Name</label>
             <select name="employee" class="form-control">
                 <option selected disabled>Select Department</option> 
                 @foreach ($employees as $employee)
                  <option value="{{ $employee->id }}"{{ @$salarySettings->employee_id==$employee->id?'selected':'' }}>{{ $employee->code }}--{{ $employee->name }}</option>  
                 @endforeach
              </select> 
             </div>
             <div class="col-lg-12 form-group">
             <label>Pay Head Type</label>
             <select name="pay_head_type" class="form-control">
                 <option selected disabled>Select Department</option> 
                 @foreach ($Payheads as $Payhead)
                  <option value="{{ $Payhead->id }}"{{ @$salarySettings->Pay_head_type_id==$Payhead->id?'selected':'' }}>{{ $Payhead->name }}</option>  
                 @endforeach
              </select> 
             </div>
             <div class="col-lg-12 form-group">
                <label>Unit</label>
                <input type="text" name="unit" class="form-control" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$salarySettings->unit }}"> 
              </div>
            <div class="col-lg-12 form-group">
             <label>Type</label>
             <select name="type" class="form-control">
                 <option value="1"{{ @$salarySettings->type==1?'selected':'' }}>Amount</option> 
                 <option value="0"{{ @$salarySettings->type==0?'selected':'' }}>Percentage</option>
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





