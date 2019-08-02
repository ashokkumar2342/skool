@extends('admin.layout.base')
@section('body')
  
  <section class="content-header"> 
    <h1>Report<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body"> 
          <form action="{{ route('admin.student.final.report.show') }}" method="post"  button-click="btn_final_report_pending" no-reset="true" target="blank">
            {{ csrf_field() }} 
            <div class="row">
              <div class="col-lg-3">
                <label>Report For</label>
                <select name="report_for" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.final.report.for.change') }}','report_for')">
                  <option selected disabled>Select Option</option>
                  <option id="all" value="1">All</option>
                  <option value="2">Student </option>
                  <option value="3">Class </option>
                  <option value="4">Class With Section</option> 
                </select> 
              </div> 
              <div id="report_for"> 
              </div> 
            <div class="col-lg-3">
              <label>Report Wise</label>
              <select name="report_wise" class="form-control"multiselect-form="true" onchange="callAjax(this,'{{ route('admin.student.final.report.student.details.check') }}'+'?registration_no='+$('#registration_no').val(),'student_details_select')">
                <option selected disabled>Select Option</option>
                <option value="1">Section</option>
                <option id="filed" value="2">Field</option> 
              </select> 
              </div>
            <div id="student_details_select">
            </div> 
            </div> 
             <button type="button" id="btn_final_report_pending" class="btn btn-default hidden" onclick="callAjax(this,'{{ route('admin.student.final.report.pending.show') }}','final_report_pending')"></button>
              <div id="final_report_pending">
                
              </div>
              
           
          </form>
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
  $('#btn_final_report_pending').click();
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
    $(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $("#business").show();
      }
      else
      {
        $("#business").hide();
      }
    });
});
 </script>
  @endpush
