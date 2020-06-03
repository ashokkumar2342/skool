@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
  <a onclick="callPopupLarge(this,'{{ route('admin.staff.teacher.mapping.report') }}')" class="btn btn-sm btn-primary pull-right">PDF Report</a> 
    <h1>Class => Class Teacher<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <button type="hidden" class="hidden" id="btn_mapping_show" select2="true" data-table="mapping_table" onclick="callAjax(this,'{{ route('admin.staff.mapping') }}','mapping_form')"></button>
          <div id="mapping_form">
            
          </div>
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
     
        $('#btn_mapping_show').click();
   
 </script>
  @endpush
