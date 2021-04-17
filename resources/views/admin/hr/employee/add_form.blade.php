<div class="modal-dialog" style="width:90%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$Employee->id?'Edit':'Add' }} Employee Details</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.employee.store',@$Employee->id) }}" method="post" class="add_form" button-click="btn_close,btn_event_type_table_show">
        {{ csrf_field() }} 
        <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                 <div class="panel-heading" style="font-size: 20px">Employee Details</div>
                   <div class="panel-body">
                     <div class="col-lg-3 form-group">
                         <label>Employee Code</label><span class="fa fa-asterisk"></span>
                         <input type="text" name="code" class="form-control" maxlength="6" value="{{ @$Employee->code }}"> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Date of Joining</label><span class="fa fa-asterisk"></span>
                         <input type="date" name="date_of_joining" class="form-control" value="{{ @$Employee->date_of_joining }}"> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Department</label><span class="fa fa-asterisk"></span>
                         <select name="department" class="form-control">
                             <option selected disabled>Select Department</option> 
                             @foreach ($Departments as $Department)
                              <option value="{{ $Department->id }}"{{ @$Employee->department_id==$Department->id?'selected':'' }}>{{ $Department->name }}</option>  
                             @endforeach
                          </select> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Designation</label><span class="fa fa-asterisk"></span>
                         <select name="designation" class="form-control">
                             <option selected disabled>Select Designation</option> 
                             @foreach ($Designations as $Designations)
                              <option value="{{ $Designations->id }}"{{ @$Employee->designation_id==$Designations->id?'selected':'' }}>{{ $Designations->name }}</option>  
                             @endforeach
                          </select> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Group</label><span class="fa fa-asterisk"></span>
                         <select name="group" class="form-control">
                             <option selected disabled>Select Group</option> 
                             @foreach ($groups as $group)
                              <option value="{{ $group->id }}"{{ @$Employee->group_id==$group->id?'selected':'' }}>{{ $group->name }}</option>  
                             @endforeach
                          </select> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Qualification</label><span class="fa fa-asterisk"></span>
                         <input type="text" name="qualification" class="form-control" maxlength="50" placeholder="Enter Qualification" value="{{ @$Employee->qualification }}"> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Experience</label><span class="fa fa-asterisk"></span>
                         <select name="experience" class="form-control">
                             <option selected disabled>Select Experience</option> 
                             @foreach ($experiences as $experience)
                              <option value="{{ $experience->id }}"{{ @$Employee->experience_id==$experience->id?'selected': '' }}>{{ $experience->name }}</option>  
                             @endforeach
                          </select> 
                     </div>
                     <div class="col-lg-3 form-group">
                         <label>Role</label><span class="fa fa-asterisk"></span></br>
                         <select name="role" class="form-control select2">
                             <option selected disabled>Select User</option> 
                             @foreach ($admins as $admin)
                              <option value="{{ $admin->id }}"{{ @$Employee->role_id==$admin->id?'selected' : '' }}>{{ $admin->name }}</option>  
                             @endforeach
                          </select> 
                     </div> 
                   </div>
                 </div> 
               </div>
               <div class="col-lg-6">
                   <div class="panel panel-default">
                      <div class="panel-heading" style="font-size: 20px">Personal Details</div>
                         <div class="panel-body">
                            <div class="col-lg-12 form-group">
                                <label>Name</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="name" class="form-control" maxlength="50" placeholder="Enter Name" value="{{ @$Employee->name }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Last Name</label><span class="fa fa-asterisk"></span>
                                <input type="text"  name="Last_name" class="form-control" maxlength="50" placeholder="Enter Last Name" value="{{ @$Employee->Last_name }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Date of Birth</label><span class="fa fa-asterisk"></span>
                                <input type="date"  name="dob" class="form-control" maxlength="50" placeholder="Enter Last Name" value="{{ @$Employee->date_of_birth }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Gender</label><span class="fa fa-asterisk"></span>
                                <select name="gender" class="form-control">
                                    <option selected disabled>Select Gender</option>
                                    @foreach ($genders as $gender)
                                      <option value="{{ $gender->id }}"{{ @$Employee->gender_id==$admin->id?'selected' : '' }}>{{ $gender->genders }}</option> 
                                     @endforeach   
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Aadhaar No.</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="aadhaar_no" class="form-control" maxlength="12" placeholder="Enter Aadhaar No." value="{{ @$Employee->aadhaar_no }}"> 
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Pan No.</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="pan_number" class="form-control"  maxlength="10" placeholder="Enter Pan No." value="{{ @$Employee->pan_number }}"> 
                            </div> 
                            <div class="col-lg-12 form-group">
                                <label>PF Account No.</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="pf_account_number" class="form-control" maxlength="20" placeholder="Enter PF Account No." value="{{ @$Employee->pf_account_number }}"> 
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>ESI</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="esi" class="form-control" maxlength="20" placeholder="Enter ESI" value="{{ @$Employee->esi }}"> 
                            </div>
                         </div>
                      </div>
                    </div> 
                <div class="col-lg-6">
                    <div class="panel panel-default">
                       <div class="panel-heading" style="font-size: 20px">Contact Details</div>
                          <div class="panel-body">
                            <div class="col-lg-6 form-group">
                                <label>Mobile No.</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$Employee->mobile_no }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Contact No.</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$Employee->contact_no }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Email</label><span class="fa fa-asterisk"></span>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" maxlength="100" value="{{ @$Employee->email }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Country</label><span class="fa fa-asterisk"></span>
                                <select name="country" class="form-control" placeholder="Enter country">
                                    <option value="1"{{ @$Employee->country==1?'selected': '' }}>India</option>
                                    <option value="0"{{ @$Employee->country==0?'selected': '' }}>Other Country</option> 
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>State</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="state" class="form-control" placeholder="Enter State" maxlength="100" value="{{ @$Employee->state }}"> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>City</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="city" class="form-control" placeholder="Enter City" maxlength="100" value="{{ @$Employee->city }}"> 
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Current Address</label><span class="fa fa-asterisk"></span>
                                <textarea name="current_address" class="form-control" style="height: 36px" maxlength="200" placeholder="Enter Current Address">{{ @$Employee->current_address }}</textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Permanent Address</label><span class="fa fa-asterisk"></span>
                                <textarea name="permanent_address" class="form-control" style="height: 36px" maxlength="200" placeholder="Enter Permanent Address">{{ @$Employee->permanent_address }}</textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Pincode</label><span class="fa fa-asterisk"></span>
                                <input type="text" name="pincode" class="form-control" placeholder="Enter City" maxlength="6" value="{{ @$Employee->pincode }}"> 
                            </div> 
                          </div>
                       </div>
                       </div> 
                        <div class="col-lg-12 text-center form-group"> 
                          <input type="submit"  class="btn btn-success" style="margin-top: 20px"> 
                        </div> 
        </form>
     </div>
   </div>
</div>





