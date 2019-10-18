   
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
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
        <form class="add_form" content-refresh="dataTable" button-click="btn_close,btn_certificateIssu_apply_table_show" action="{{ route('admin.student.attachment.approval.status',$certificate->id) }}" no-reset="true" method="post" enctype="multipart/form-data">              
                  {{ csrf_field() }}  
                                         
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                  
                                            <div class="col-lg-4">                         
                                               <label>Registration No</label>
                                               <select name="registration_no" class="form-control select2">
                                                 <option selected disabled>Select Registration</option>
                                                 @foreach ($students as $student)
                                                   <option value="{{ $student->id }}"{{ $certificate->student_id==$student->id? 'selected' : ''}}>{{ $student->registration_no }}</option>
                                                 @endforeach
                                               </select>
                                            </div>  
                                            <div class="col-lg-4">                         
                                              <div class="form-group">
                                                  {{ Form::label('date','Date',['class'=>' control-label ']) }}                         
                                                  {{ Form::text('date',$certificate->date,['class'=>'form-control datepicker',' required']) }}
                                                  <p class="text-danger">{{ $errors->first('date') }}</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('certificate_type','Certificate Type',['class'=>' control-label']) }}
                                                    {!! Form::select('certificate_type',[
                                                                
                                                                '2'=>'School Leaving Certificate',
                                                                '3'=>'Character Certificate',
                                                                '4'=>'Date of Birth Certificate',
                                                                
                                                        ], $certificate->certificate_type, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('certificate_type') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-12">                         
                                              <div class="form-group">
                                                  {{ Form::label('reason','Reason',['class'=>' control-label ']) }}                         
                                                  {{ Form::textarea('reason',$certificate->reason,['class'=>'form-control datepicker','rows'=>'2',' required']) }}
                                                  <p class="text-danger">{{ $errors->first('reason') }}</p>
                                              </div>
                                            </div>
                                              </div>
                                            <div class="col-lg-3">
                                              <label>SLC No</label>
                                              <input type="text" name="slc_no" class="form-control" 
                                              value="{{ $certificate->slc_no }}"> 
                                            </div><div class="col-lg-3">
                                              <label>Udise Code</label>
                                              <input type="text" name="udise_code" class="form-control" 
                                              value="{{ $certificate->udise_code }}"> 
                                            </div>
                                            <div class="col-lg-3">
                                              <label>Department School Code</label>
                                              <input type="text" name="department_school_code" class="form-control" 
                                              value="{{ $certificate->department_school_code }}"> 
                                            </div>
                                            <div class="col-lg-3">
                                              <label>File No</label>
                                              <input type="text" name="file_no" class="form-control" 
                                              value="{{ $certificate->file_no }}"> 
                                            </div>
                                         
                                             <div class="col-lg-6 text-right" style="padding-top: 20px;">                         
                                                <div class="form-group">
                                                  <button class="btn btn-success">Approval</button>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-left" style="padding-top: 20px;">                         
                                                <div class="form-group">
                                                  <a href="{{ route('admin.student.certificateIssu.delete',$certificate->id) }}" class="btn btn-danger" title="">Reject</a>

                                                  
                                                    
                                                </div>
                                            </div> 
                        {{ Form::close() }}
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
