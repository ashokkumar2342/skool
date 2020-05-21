
  <div class="modal-dialog"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$leaveRecord->id? 'Edit' :'Add' }} Leave Apply</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('student.leave.apply.store') }}" method="post" class="add_form" button-click="btn_close" content-refresh="leave_record_table">
                   {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Academic Year</label>
                        <select name="year_id" class="form-control ">
                              <option selected disabled>Select Academic Year</option> 
                          @foreach ($academicYears as $academicYear)
                              <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>  
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
                              <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>  
                          @endforeach
                        </select> 
                      </div> 
                    </div>
                  @php
                   $userIdBySibling=new App\Helper\MyFuncs();    
                   $siblings= $userIdBySibling->getSiblingById(); 
                   $students=App\Student::whereIn('id',$siblings)->get();
                  @endphp
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
                        {!! Form::text('apply_date', date('d-m-Y')  , ['class'=>'form-control datepicker','id'=>'date','placeholder'=>'Date','max'=>date('Y-m-d')]) !!}
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control"  > 
                      </div> 
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control"  > 
                      </div> 
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" class="form-control"  > 
                      </div> 
                    </div><div class="col-lg-4">
                      <div class="form-group">
                        <label>Attachment</label>
                        <input type="file" name="attachment" class="form-control"  > 
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

 
