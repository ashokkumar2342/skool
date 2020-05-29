<div class="modal-dialog" style="width: 90%"> 
  <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add New Staff</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
    </div>
    <div class="modal-body">  
      <div class="panel panel-primary">
         
        <div class="panel-body"> 
      <form action="{{ route('admin.staff.details.store') }}" method="post" class="add_form" button-click="btn_close,teacher_table_show" >
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-3 form-group">
            <label>Code</label> <span class="fa fa-asterisk"></span>
            <input type="text" name="code" class="form-control" placeholder="Enter Code" maxlength="20"> 
          </div>
          <div class="col-lg-3 form-group">
            <label>Name</label> <span class="fa fa-asterisk"></span>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50"> 
          </div>
          <div class="col-lg-3 form-group">
            <label>Father/husband</label> <span class="fa fa-asterisk"></span>
            <input type="text" name="father_husband" class="form-control" placeholder="Enter Father/husband" maxlength="50"> 
          </div>
          <div class="col-lg-3 form-group">
            <label>Relation</label> <span class="fa fa-asterisk"></span>
            <select class="form-control" name="relation">
                <option selected disabled>Select Relation</option> 
                @foreach ($RelationStaffs as $RelationStaff)
                <option value="{{ $RelationStaff->id }}">{{ $RelationStaff->name }}</option> 
                @endforeach 
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label>Mobile No.</label> <span class="fa fa-asterisk"></span> 
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="mobile_no" placeholder="Enter Mobile No" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div> 
          </div>
          <div class="col-lg-4 form-group">
            <label>Email ID</label> <span class="fa fa-asterisk"></span> 
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email ID" maxlength="100">
                </div> 
          </div>
          <div class="col-lg-4 form-group">
            <label>Date of Birth</label> <span class="fa fa-asterisk"></span> 
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="date_of_birth">
            </div> 
          </div>
           <div class="col-lg-4 form-group">
            <label>Role</label> <span class="fa fa-asterisk"></span>
            <select class="form-control" name="role_id">
                <option selected disabled>Select Role</option> 
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option> 
                @endforeach 
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label>Designation</label> <span class="fa fa-asterisk"></span>
            <select class="form-control" name="designation">
                <option selected disabled>Select Designation</option> 
                @foreach ($DesignationStaffs as $DesignationStaff)
                <option value="{{ $DesignationStaff->id }}">{{ $DesignationStaff->name }}</option> 
                @endforeach 
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label>Status</label> <span class="fa fa-asterisk"></span>
            <select class="form-control" name="status">
                <option selected disabled>Select Role</option> 
                @foreach ($StatusStaffs as $StatusStaff)
                <option value="{{ $StatusStaff->id }}">{{ $StatusStaff->name }}</option> 
                @endforeach 
            </select>
          </div> 
          <div class="col-lg-12 form-group">
            <label>Address</label> <span class="fa fa-asterisk"></span>
            <textarea name="address" class="form-control" maxlength="200" style="height: 40px"></textarea> 
          </div> 
        <div class="col-lg-12 form-group text-center"> 
          <input type="submit" class="btn btn-success" value="Submit">
        </div>
      </div> 
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>







<!-- /.content -->



