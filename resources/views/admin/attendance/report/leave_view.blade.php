@extends('admin.layout.base')
@section('body')
  
<section class="content-header">
   
<h1>Leave Report</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
               <form action="{{ route('admin.attendance.leave.report.show') }}" method="post" class="add_form" success-content-id="attendance_report_result">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Report Type</label>
                      <select name="report_type" class="form-control" onchange="callAjax(this,'{{ route('admin.attendance.leave.report.filter') }}','flter_div')">
                        <option selected disabled>Select Option</option> 
                        <option value="1">Apply Date</option> 
                        <option value="2">Student</option> 
                        <option value="3">Status</option> 
                      </select> 
                    </div> 
                  </div>
                  <div id="flter_div">
                    
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
       $('#attendance_result_table').DataTable();
    });
  </script>
@endpush