 
  <!-- Main content -->
   <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Teacher Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.teacher.details.update',$teacherFacultys->id) }}" method="post" class="add_form" button-click="btn_close,teacher_table_show" >
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4">
                  <label>Code</label>
                  <input type="text" name="code" class="form-control" placeholder="" value="{{ $teacherFacultys->registration_no }}" maxlength="20"> 
                </div>
                <div class="col-lg-4">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="" value="{{ $teacherFacultys->name }}" maxlength="50"> 
                </div>
                <div class="col-lg-4">
                  <label>Father/husband</label>
                  <input type="text" name="father" class="form-control" placeholder="" value="{{ $teacherFacultys->father_name }}" maxlength="50"> 
                </div>
                <div class="col-lg-4">
                  <label>Relation</label>
                  <input type="text" name="relation" class="form-control" placeholder="" value="{{ $teacherFacultys->relation_name }}" maxlength="50"> 
                </div>
                <div class="col-lg-4">
                  <label>Mobile</label>
                  <input type="text" name="mobile" class="form-control" placeholder="" value="{{ $teacherFacultys->father_mobile }}" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                </div>
                <div class="col-lg-4">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="" value="{{ $teacherFacultys->email }}" maxlength="50"> 
                </div>
                <div class="col-lg-4">
                  <label>Date of Birth</label>
                  <input type="date" name="dob" class="form-control" placeholder="" value="{{ $teacherFacultys->dob }}" maxlength=""> 
                </div>
                <div class="col-lg-4">
                  <label>Class</label>
                  <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section.addForm') }}','section_id_div')">
                    <option selected disabled>Select Class</option>
                    @foreach($classTypes as $classType)
                    <option value="{{ $classType->id }}"{{ $classType->id==$teacherFacultys->class_id? 'selected="selected"' : '' }}>{{ $classType->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-4" id="section_id_div">
                  <label>Section</label>
                  <select  class="form-control">
                    <option selected disabled>Select Section</option> 
                  </select>
                </div>
                <div class="col-lg-6">
                  <label>joining Date</label>
                  <input type="date" name="joining_date" class="form-control" placeholder="" value="{{ $teacherFacultys->joining_date }}" maxlength=""> 
                </div>
                <div class="col-lg-6">
                  <label>Address</label>
                  <textarea name="address" class="form-control" maxlength="">{{ $teacherFacultys->c_address }}</textarea>
                  
                </div> 
              </div>
              <div class="col-lg-12 text-center">
                
                <input type="submit" class="btn btn-success" value="Update" style="margin-top: 10px">
              </div>
                </div> 
              </div>
                
             </form>
                
                
            </div>   
               
      <!-- /.row -->
          </div>
        </div>
      </div>
    </div>
         
  

     

   
    <!-- /.content -->

 

