@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Certificate Issue Apply  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.certificateIssu.apply') }}" class="btn btn-info btn-sm" >Apply</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box"> 
            <div class="box-body">
              <button type="hidden" class="hidden" id="btn_certificateIssu_apply_table_show" onclick="callAjax(this,'{{ route('admin.student.certificateIssu.apply.table.show') }}','certificateIssu_apply_table_show')">Show</button>
               
              <div id="certificateIssu_apply_table_show">
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button --> 
@include('admin.certificate.remarks') 
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
        $('#dataTable').DataTable();
         responsive: true
    });
     $('#btn_certificateIssu_apply_table_show').click();
     
 </script>
@endpush