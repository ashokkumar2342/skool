@extends('admin.layout.base')
@section('body') 
<section class="content-header">
  <button type="button" class="btn btn-info btn-sm pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.apply') }}')">Leave Apply</button>
<h1> Leave Apply List</h1>
     
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
              <button type="button" class="hidden" id="btn_click_list_show" data-table="leave_record_table" onclick="callAjax(this,'{{ route('admin.attendance.lest') }}','barcode_blade')"></button>
              <div  id="barcode_blade">
                
              
                     
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
   $('#btn_click_list_show').click();  
   $('#btn_click_form_blade').click();  
 </script>

 
 
  
@endpush