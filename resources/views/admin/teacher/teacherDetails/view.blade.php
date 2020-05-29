@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.staff.details.add.form')}}')" style="margin:10px">Add Form</button>
    <h1>Staff Details <small>List</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
           
          <button id="teacher_table_show" hidden data-table="teacher_data_table_show" onclick="callAjax(this,'{{ route('admin.staff.details.table.show') }}','teacher_details_table_show')">show </button> 

          <div class="box"> 
            <div class="box-body table-responsive" id="teacher_details_table_show">
            
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
        $('#teacher_data_table_show').DataTable();
    });

     $('#teacher_table_show').click();
  </script>
  @endpush
