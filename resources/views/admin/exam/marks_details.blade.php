@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Marks Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <div class="col-lg-3">                         
                      <div class="form-group">
                        <label>Academic Year</label>
                           <select name="academic_year_id" id="academic_year_id" class="form-control" onchange="callAjax(this,'{{ route('admin.mark.detail.studentSearch') }}'+'?academic_year_id='+$('#academic_year_id').val(),'exam_term_id')">
                             <option selected disabled>Select Academic Year</option>
                             @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                             @endforeach
                             
                           </select>
                      </div>
                  </div>
                  <div class="col-lg-3">                         
                      <div class="form-group">
                        <label>Exam Term</label>
                        <select name="exam_term_id" id="exam_term_id" class="form-control"  onchange="callAjax(this,'{{ route('admin.mark.detail.studentSearch') }}'+'?exam_term_id='+$('#exam_term_id').val(),'exam_schedule_value_page')">
                        </select>
                      </div>
                  </div>    
                   <div class="col-lg-4">                         
                      <div class="form-group">
                          {{ Form::label('exam_schedule','Exam Schedule',['class'=>' control-label']) }}
                           <select name="exam_schedule" class="form-control" id="exam_schedule_value_page" onchange="callAjax(this,'{{ route('admin.mark.detail.studentSearch') }}'+'?exam_term='+$('#exam_term_id').val(),'student_details_Result')">
                             
                           </select>
                      </div>
                  </div>
                   
                  
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                
                    <form class="add_form"   no-reset="true" method="post">              
                  {{ csrf_field() }}  
                  
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>  
                                <th>student Name</th> 
                                <th>student Registration No</th>                             
                                <th>Marks</th>                                               
                                <th>any remarks</th>                                        
                            </tr>
                        </thead>
                        <tbody id="student_details_Result">
                        
                           
                        </tbody>
                             

                    </table>
                    <div class="text-center">
                      <input type="submit" class="btn btn-success " value="submit">
                    </div>
                    </form>
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    
 </script>
    
@endpush