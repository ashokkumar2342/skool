@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Fee Due Reports<small></small> </h1>
      @includeIf('admin.include.hot_menu', ['menu_type_id' => 26]) 
    </section>  
    <section class="content">  
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.finance.report.fee.due.show') }}" method="post" class="add_form" success-content-id="student_fee_history_show" no-reset="true" data-table-without-pagination="student_fee_history_show_table_id">
            {{ csrf_field() }} 
              <div class="row">
                <div class="col-lg-3">
                  <label>Academic Year</label>
                  <select name="year" class="form-control">
                    <option selected disabled>Select Option</option>
                    @foreach ($academicYears as $academicYear)
                        <option value="2019">{{ $academicYear->name }}</option> 
                     @endforeach 
                  </select> 
                </div> 
                <div class="col-lg-3">
                  <label>Month</label>
                  <select name="month" class="form-control">
                    <option selected disabled>Select Option</option> 
                    <option value="1">January</option> 
                    <option value="2">February</option> 
                    <option value="3">March</option> 
                    <option value="4">April</option> 
                    <option value="5">May</option> 
                    <option value="6">June</option> 
                    <option value="7">July</option> 
                    <option value="8">August</option> 
                    <option value="9">September</option> 
                    <option value="10">Octobre</option> 
                    <option value="11">November</option> 
                    <option value="12">December</option> 
                    
                  </select> 
                </div>
                
               </div> 
           <div class="row" style="padding-top: 24px">
            <div class="col-lg-12 text-center">
              <input type="submit" class="btn btn-success">
              
            </div>
          </div>
             <div class="col-lg-12" id="student_fee_history_show">
               
             </div>
           
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->

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
    $('#student_fee_history_show_table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endpush
     
 
 