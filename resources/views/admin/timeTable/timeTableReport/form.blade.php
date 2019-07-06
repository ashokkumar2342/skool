 @extends('admin.layout.base')
 @push('links')
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

 @endpush
 @section('body')

 <!-- Main content -->
 <section class="content-header">
    {{-- <button type="button" class="btn btn-info pull-right" multi-select="true" onclick="callPopupLarge(this,'{{ route('admin.class.period.schedule.addform')}}')" style="margin:10px">Create New</button> --}}
    <h1>Time Table Report<small>list</small> </h1>

</section>  
<section class="content"> 
          <div class="box"> 
            <div class="box-body">
                 
                  <div class="row">
                    <form action="{{ route('admin.time.table.report.show') }}"  method="post" class="add_form" no-reset="true"  data-table-without-pagination-disable-sorting="report_data_table" success-content-id="teacher_history_show">
                    {{ csrf_field() }} 
                    <div class="col-lg-4">
                      <label>Report For</label>
                      <select name="report_for" id="time_table_type" class="form-control" multiselect-form="true" {{-- onchange="callAjax(this,'{{ route('admin.time.table.report.for') }}','time_table_report')" --}}>
                        <option  selected disabled>Select Option</option> 
                        <option value="1">Teacher</option> 
                        <option value="2">Class</option> 
                    </select> 
                    </div>
                    <div id="time_table_report"> 
                    </div> 
                    <div class="col-lg-4"> 
                        <label>Time Table Type</label>
                        <select name="time_table_type" class="form-control">
                          <option selected disabled>Select Type</option>
                          @foreach ($timeTableTypes as $timeTableType)
                          <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option>
                          @endforeach 
                      </select>
                    </div>
                    <div class="col-lg-12 text-center"> 
                      <input type="submit"  class="btn btn-success" value="Show" style="margin-top: 24px"> 
                    </div>
                    </form>
                    <div class="col-lg-12" id="teacher_history_show" style="max-width: 99%;overflow-x: auto">
                        
                    </div>
                 </div>  
             
            
        
      </div>
    </div> 
</section>
<!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">




     // $('#btn_outhor_table_show').DataTable();
 </script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

 @endpush

 
 