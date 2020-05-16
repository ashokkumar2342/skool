@extends('admin.layout.base')
@section('body')
  
<section class="content-header">
   
<h1>Leave Report</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
               <form action="{{ route('admin.attendance.leave.report.show') }}" method="post" class="add_form" success-content-id="attendance_report_result" data-table-without-pagination-disable-sorting="leave_report_table" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" name="from_date" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" name="to_date" class="form-control" required="">
                    </div>
                  </div>

                      {{-- <label>Report Type</label>
                      <select name="report_type" class="form-control" onchange="callAjax(this,'{{ route('admin.attendance.leave.report.filter') }}','flter_div')">
                        <option selected disabled>Select Option</option> 
                        <option value="1">Apply Date</option> 
                        <option value="2">Student</option> 
                        <option value="3">Status</option> 
                      </select> 
                    </div>  --}}
                 
                  <div id="flter_div">
                    
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                       <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
                    </div> 
                  </div> 
                </div> 
               </form>
               <div class="table-responsive" id="attendance_report_result">
                  
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
 
$(document).ready(function() {
    $('#leave_report_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endpush  