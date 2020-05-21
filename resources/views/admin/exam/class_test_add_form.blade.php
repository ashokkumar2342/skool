  
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
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.classtest.store') }}" method="post">              
                  {{ csrf_field() }}                  
                   <div class="col-lg-3">                         
                      <div class="form-group">
                        <label>Academic Year</label>
                           <select name="academic_year_id" class="form-control">
                             <option selected disabled>Select Academic Year</option>
                             @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                             @endforeach
                             
                           </select>
                      </div>
                  </div>
                  <div class="col-lg-3">                         
                      <div class="form-group"> 
                        <label>Class</label>
                        <select name="class" class="form-control" onchange="callAjax(this,'{{ route('admin.student.final.report.class.wise.section') }}','section_divs')">
                           <option disabled selected>Select Class</option>
                           @foreach ($classTypes as $classType)
                            <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                           @endforeach
                         </select> 
                      </div>
                      </div> 
                      <div class="col-lg-3">
                        <div class="form-group">
                        <label>Section</label>
                         <select name="section" class="form-control" id="section_divs"> 
                         </select> 
                      </div>
                  </div> 
                  <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('subject','Subject',['class'=>' control-label']) }}
                          {!! Form::select('subject',$subjects, null, ['class'=>'form-control','placeholder'=>'Select Section']) !!}
                           
                      </div>
                  </div>                  
                     <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('test_date','Test Date',['class'=>' control-label']) }}
                           {{ Form::date('test_date','',['class'=>'form-control', 'placeholder'=>'  Test Date']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('max_marks','Max Marks',['class'=>' control-label']) }}
                           {{ Form::text('max_marks','',['class'=>'form-control', 'placeholder'=>'  Max Marks','maxlength'=>'4','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) }} 
                         </div>                                         
                      </div> 
                      <div class="col-lg-6">                                             
                         <div class="form-group">
                          {{ Form::label('discription','Discription',['class'=>' control-label']) }}
                           {{ Form::textarea('discription','',['class'=>'form-control', 'placeholder'=>' Discription','rows'=>1]) }} 
                         </div>                                         
                      </div> 
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('sylabus','Sylabus',['class'=>' control-label']) }}
                           {{ Form::file('sylabus',['class'=>'form-control']) }} 
                         </div>                                         
                      </div>
                   
                       
                       <div class="col-lg-12 text-center">
                        <a href="#" title="" onclick="callPopupLevel2(this,'{{ route('admin.medical.template.view',3) }}')" >Template View</a>&nbsp;&nbsp;
                       Send Sms
                       <input type="checkbox" name="send_sms" value="1">&nbsp;&nbsp;
                       Send Email
                       <input type="checkbox" name="send_email" value=2>&nbsp;&nbsp;           
                       <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
                      </div>                     
                  </form> 
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
