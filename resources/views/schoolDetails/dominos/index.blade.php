@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.school.dominos.add.form')}}')" style="margin:10px">Add School</button>
    <h1>School<small>List</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          
          <button id="btn_quotes_table" hidden data-table="quotes_dataTable" onclick="callAjax(this,'{{ route('admin.school.dominos.table.show') }}','quotes_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="quotes_table"> 
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

     $('#btn_quotes_table').click();
  </script>
  @endpush
     
 
 