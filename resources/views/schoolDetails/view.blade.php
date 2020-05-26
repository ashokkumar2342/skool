@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.school.details.addForm')}}')" text-editor="summernote" >Edit</button>
    <a href="{{ route('admin.school.details.report.check') }}" style="float: right;margin-right: 10px" class="btn btn-primary btn-sm" title="Download PDF" target="blank">PDF Check</a>
    <h1>School Details<small>List</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          
          <button id="btn_event_type_table_show" hidden data-table="event_type_data_table" onclick="callAjax(this,'{{ route('admin.school.details.table.show') }}','event_type_table_show_div')">show </button>
          <div class="box"> 
            <div class="box-body" id="event_type_table_show_div">
           
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
     $(document).ready(function(){
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 