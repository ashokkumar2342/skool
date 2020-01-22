<div class="modal-dialog" style="width:90%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$Employee->id?'Edit':'Add' }} Empolyee Details</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.employee.store',@$Employee->id) }}" method="post" class="add_form" button-click="btn_close,btn_event_type_table_show">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-3 form-group">
                <label>User Name</label>
                <select name="user_name" class="form-control select2">
                    <option selected disabled>Select User</option> 
                    @foreach ($admins as $admin)
                     <option value="{{ $admin->id }}"{{ @$Employee->user_id==$admin->id?'selected' : '' }}>{{ $admin->first_name }}--{{ $admin->email }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Qualification</label>
                <input type="text" name="qualification" class="form-control" value="{{ @$Employee->qualification }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Experience</label>
                <select name="experience" class="form-control">
                    <option selected disabled>Select Experience</option> 
                    @foreach ($experiences as $experience)
                     <option value="{{ $experience->id }}"{{ @$Employee->experience==$experience->id?'selected': '' }}>{{ $experience->name }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Joining</label>
                <input type="date" name="date_of_joining" class="form-control" value="{{ @$Employee->date_of_joining }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Resignation</label>
                <input type="date" name="date_of_resignation" class="form-control" value="{{ @$Employee->date_of_resignation }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Confirmation</label>
                <input type="date" name="date_of_confirmation" class="form-control" value="{{ @$Employee->date_of_confirmation }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Department</label>
                <select name="department" class="form-control">
                    <option selected disabled>Select Department</option> 
                    @foreach ($Departments as $Department)
                     <option value="{{ $Department->id }}"{{ @$Employee->department_id==$Department->id?'selected':'' }}>{{ $Department->name }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Group</label>
                <select name="group" class="form-control">
                    <option selected disabled>Select Group</option> 
                    @foreach ($groups as $group)
                     <option value="{{ $group->id }}"{{ @$Employee->group_id==$group->id?'selected':'' }}>{{ $group->name }}</option>  
                    @endforeach
                 </select> 
            </div> 
            <div class="col-lg-3 form-group">
                <label>Probation Period</label>
                <input type="text" name="probation_period" class="form-control" value="{{ @$Employee->probation_period }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Notice Period</label>
                <input type="text" name="notice_period" class="form-control" value="{{ @$Employee->notice_period }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control" value="{{ @$Employee->salary }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Emergency No.</label>
                <input type="text" name="emergency_no" class="form-control" value="{{ @$Employee->emergency_number }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Pan No.</label>
                <input type="text" name="pan_no" class="form-control" value="{{ @$Employee->pan_number }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Account No.</label>
                <input type="text" name="account_number" class="form-control" value="{{ @$Employee->account_number }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" value="{{ @$Employee->bank_name }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Ifsc Code</label>
                <input type="text" name="ifsc_code" class="form-control" value="{{ @$Employee->ifsc_code }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>PF Account No.</label>
                <input type="text" name="pf_account_number" class="form-control" value="{{ @$Employee->pf_account_number }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Universal Account No.</label>
                <input type="text" name="un_number" class="form-control" value="{{ @$Employee->un_number }}"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Father Name</label>
                <input type="text" name="father_name" class="form-control" value="{{ @$Employee->father_name }}"> 
            </div>
            <div class="col-lg-3 form-group">
               
            </div>
            <div class="col-lg-6 form-group">
                <label>Current Address</label>
                <textarea name="current_address" class="form-control">{{ @$Employee->current_address }}</textarea>
            </div>
            <div class="col-lg-6 form-group">
                <label>Permanent Address</label>
                <textarea name="permanent_address" class="form-control">{{ @$Employee->permanent_address }}</textarea>
            </div> 
            <div class="col-lg-12 text-center form-group">
                
                <input type="submit"  class="btn btn-success" style="margin-top: 20px"> 
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





