@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Class Test Send SMS<small>Details</small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <div class="btn-group btn-group-justified">
            <a href="#" class="btn btn-primary" onclick="callAjax(this,'{{ route('admin.mark.detail.send.sms.marks.test.filter',1) }}','send_sms_final_filter')">Test Info</a>
            <a href="#" class="btn btn-primary" onclick="callAjax(this,'{{ route('admin.mark.detail.send.sms.marks.test.filter',2) }}','send_sms_final_filter')">Marks Info</a>
             
          </div>
          <div id="send_sms_final_filter">
             
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
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
