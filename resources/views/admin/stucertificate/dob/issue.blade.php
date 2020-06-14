@extends('admin.layout.base')
@section('body') 
    <section class="content"> 
      <div class="box">
      	<div class="box-header">
              <h3 class="box-title">DOB Certificate Issue</h3>
        </div>
        <div class="box-body">
        <button type="hidden" class="hidden" id="btn_slc_table_show" onclick="callAjax(this,'{{ route('admin.student.BirthCertificateIssueClick') }}','slc_table')"></button>
        <div id="slc_table">
         	
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
     
   $('#btn_slc_table_show').click();
     
 </script>
  @endpush
