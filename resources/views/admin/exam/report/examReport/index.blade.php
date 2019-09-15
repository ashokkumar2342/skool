@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Exam  Report </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.exam.exam.report.filter') }}" method="post"   success-content-id="student_marks_details_table" no-reset="true" data-table-without-pagination="class_test_show_table_id" class="add_form">
            {{ csrf_field() }} 
                <div class="row">
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
                           <select name="exam_schedule" class="form-control" id="exam_schedule_value_page">
                             
                           </select>
                      </div>
                  </div>
                  <div class="col-lg-12 text-center">
                  <input type="submit" value="Show" class="btn btn-success" style="margin: 10px">
                  
                </div>
          </form>       
            </div> 
          </div>
          <div class="box"> 
            <div class="box-body">
              <div id="student_marks_details_table"> 
              </div>
            </div>
          </div>  
    </section> 
@endsection 
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>  --}}
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="////cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
  
  <script> 
$(function() { 
  $('input[name="daterange"]').daterangepicker({
     autoUpdateInput: true,
       
  });
    
});
$(document).ready(function() {
    $('#class_test_show_table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endpush  
    
 