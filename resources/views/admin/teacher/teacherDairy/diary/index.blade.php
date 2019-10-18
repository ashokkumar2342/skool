@extends('admin.layout.base')
@section('body')
<!-- Main content -->
<section class="content-header">
   <button type="button" class="btn btn-info pull-right "  select2="true"  onclick="callPopupLarge(this,'{{ route('admin.teacher.diary.add.form')}}')"  >Teacher Diary</button> 
  <h1>Teacher Diary<small>List</small> </h1> 
</section>  
<section class="content"> 
  <div class="box"> 
    <div class="box-body">
      {{-- <button type="button" class="btn btn-info hidden" id="btn_appoinment" select2="true"  onclick="callAjax(this,'{{ route('admin.teacher.appointment.table.show')}}','table_appoinment')"  >Show</button> --}}
      <div id="table_appoinment">
        
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#table_appoinment_data_table').DataTable();
    });
    $('#btn_appoinment').click();

</script>
@endpush
