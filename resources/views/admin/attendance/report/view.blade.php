@extends('admin.layout.base')
@section('body')
  
<section class="content-header">
   
<h1>Attendance Report</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
               <form action="{{ route('admin.attendance.report.show') }}" no-reset="true" method="post" class="add_form" success-content-id="attendance_report_result" data-table-without-pagination-disable-sorting="attendance_result_table">
                {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6"> 
             <div class="panel panel-default">
             <div class="panel-heading text-center">Strength Wise Report</div>  
                <div class="panel-body">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" required="" name="date" class="form-control"> 
                    </div> 
                  </div>
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Class</label><br>
                      <select name="class_id[]" class="multiselect" multiple="multiple" required="">
                         
                        @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</option> 
                        @endforeach 
                      </select>
                    </div>
                    <input type="hidden" name="strength_report" value="1"> 
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                    </div> 
                  </div> 
                </div>
              </div>
            </div> 
        </form> 
             <form action="{{ route('admin.attendance.report.show') }}" no-reset="true" method="post" class="add_form" success-content-id="attendance_report_result" data-table-without-pagination-disable-sorting="attendance_result_table">
                {{ csrf_field() }} 
            <div class="col-lg-6"> 
               <div class="panel panel-default">
                <div class="panel-heading text-center">Attendance Report</div> 
                  <div class="panel-body">
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" required="" name="date" class="form-control"> 
                      </div> 
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label>Report For</label>
                        <select name="report_for" class="form-control" required="">
                          <option selected disabled>Select Option</option>
                          <option value="4">Attendance Mark</option>
                          <option value="1">Attendance Not Mark</option>
                          <option value="5">Attendance Verified</option>
                          <option value="2">Attendance Not Verified</option>
                          <option value="6">Attendance Sms Send</option>
                          <option value="3">Attendance Not Sms Send</option>
                          
                        </select>
                      </div> 
                    </div>
                    <input type="hidden" name="attendance_report" value="1">
                    <div class="col-lg-2">
                      <div class="form-group">
                         <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                      </div> 
                    </div> 
                  </div>
                </div>
              </div> 
            </form> 
            <form action="{{ route('admin.attendance.report.show') }}" no-reset="true" method="post" class="add_form" success-content-id="attendance_report_result" data-table-without-pagination-disable-sorting="attendance_result_table">
                {{ csrf_field() }} 
            <div class="col-lg-6"> 
             <div class="panel panel-default">
             <div class="panel-heading text-center">Month Wise Report</div>  
                <div class="panel-body"> 
                  <div class="col-lg-10">
                    <div class="form-group">
                      <label>Academic Year</label>
                      <select name="academic_year_id" class="form-control" required="">
                        <option selected disabled>Select Academic Year</option>
                        @foreach ($academicYears as $section)
                              <option value="{{ $section->id }}">{{ $section->name or '' }}</option> 
                        @endforeach 
                      </select>
                    </div>
                    <input type="hidden" name="month_report" value="1"> 
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                    </div> 
                  </div> 
                </div>
              </div>
            </div>
            
            </form>  
            <form action="{{ route('admin.attendance.report.show') }}" no-reset="true" method="post" class="add_form" success-content-id="attendance_report_result" data-table-without-pagination-disable-sorting="attendance_result_table">
                {{ csrf_field() }} 
            <div class="col-lg-6"> 
             <div class="panel panel-default">
             <div class="panel-heading text-center">Percent Wise Report</div>  
                <div class="panel-body"> 
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Class</label>
                      <select name="class_id" class="form-control" required="">
                        <option selected disabled>Select Class</option>
                        @foreach ($sections as $section)
                              <option value="{{ $section->id }}">{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</option> 
                        @endforeach 
                      </select>
                    </div>
                    <input type="hidden" name="precent_report" value="1"> 
                  </div>
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label>Percent</label>
                      <input type="number" name="percent" class="form-control">
                      
                    </div>
                    
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                    </div> 
                  </div> 
                </div>
              </div>
            </div>
            </div>
            </form> 
               
               <div id="attendance_report_result">
                  
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
    $('#attendance_result_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endpush  