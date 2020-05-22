 @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Exam Schedule<small>List</small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('student.exam.schedule.show') }}" method="post" class="add_form" success-content-id="class_test_show" no-reset="true">
            <div class="row">
              <div class="col-lg-4">                         
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
                   <div class="col-lg-4" >                         
                      <div class="form-group">
                          {{ Form::label('class','Exam Term',['class'=>' control-label']) }}
                           <select name="exam_term" class="form-control" id="exam_term_id">
                            {{-- <option value="" selected  disabled>Select Exam Term</option> 
                            @foreach ($examTerms as $examTerm)
                              <option value="{{ $examTerm->id }}">From Date:{{ date('d-m-Y', strtotime($examTerm->from_date)) }} &nbsp; To Date: {{ date('d-m-Y', strtotime($examTerm->to_date)) }}</option>
                            @endforeach --}} 
                           </select> 
                      </div>
                  </div>
              <div class="col-lg-4">
                <input type="submit" value="Show Class test" class="form-control btn btn-success" style="margin-top: 24px">
              </div>
            </div>
          </form>
          <div class="table-responsive" id="class_test_show">
            
          </div>
        </div>
      </div>
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
