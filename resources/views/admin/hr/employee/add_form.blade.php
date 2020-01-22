<div class="modal-dialog" style="width:90%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Add Empolyee Details</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.employee.store') }}" method="post" class="add_form" button-click="btn_close,btn_event_type_table_show">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-3 form-group">
                <label>User Name</label>
                <select name="user_name" class="form-control select2">
                    <option selected disabled>Select User</option> 
                    @foreach ($admins as $admin)
                     <option value="{{ $admin->id }}">{{ $admin->first_name }}--{{ $admin->email }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Qualification</label>
                <input type="text" name="qualification" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Experience</label>
                <select name="experience" class="form-control select2">
                    <option selected disabled>Select Experience</option> 
                    @foreach ($experiences as $experience)
                     <option value="{{ $experience->id }}">{{ $experience->name }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Joining</label>
                <input type="date" name="date_of_joining" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Resignation</label>
                <input type="date" name="date_of_resignation" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Date of Confirmation</label>
                <input type="date" name="date_of_confirmation" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Department</label>
                <select name="department" class="form-control select2">
                    <option selected disabled>Select Department</option> 
                    @foreach ($Departments as $Department)
                     <option value="{{ $Department->id }}">{{ $Department->name }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Group</label>
                <select name="group" class="form-control select2">
                    <option selected disabled>Select Group</option> 
                    @foreach ($groups as $group)
                     <option value="{{ $group->id }}">{{ $group->name }}</option>  
                    @endforeach
                 </select> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Formalities</label>
                <input type="text" name="formalities" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Offer Acceptance</label>
                <input type="text" name="offer_acceptance" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Probation Period</label>
                <input type="text" name="probation_period" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Mobile No.</label>
                <input type="text" name="mobile_no" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Mobile No.</label>
                <input type="text" name="mobile_no" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Emergency No.</label>
                <input type="text" name="emergency_no" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Pan No.</label>
                <input type="text" name="pan_no" class="form-control"> 
            </div>
            <div class="col-lg-3 form-group">
                <label>Data of Birth</label>
                <input type="date" name="dob" class="form-control"> 
            </div>
            <div class="col-lg-12 text-center form-group">
                
                <input type="submit"  class="btn btn-success" style="margin-top: 20px"> 
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





