@extends('admin.layout.base')
@section('body')
<section class="content-header" style="margin-top: -20px">
  <h3>SLC Certificate Application</h3>
</section>  
    <section class="content" style="margin-top: -15px"> 
      <div class="box">
        <div class="box-body">
        <form action="{{ route('admin.student.LeavingCertificateApplicationStore') }}" method="post" class="add_form" button-click="slc_btn_show" no-reset="true">
        {{ csrf_field() }}
        <div class="row"> 
          <div class="col-lg-2 form-group">
            <label for="exampleInputEmail1">Registration No.</label>
            <input type="text" name="Registration_no" id="Registration_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Registration No." maxlength="{{$regmaxlength->reg_length}}">
          </div>
           
          <div class="col-lg-1 form-group">
            <button type="button" id="slc_btn_show" success-popup="true" multiselect-form="true" class="btn btn-primary" style="margin-top: 24px" onclick="callAjax(this,'{{ route('admin.student.LeavingCertificateApplicationForm') }}'+'?Registration_no='+$('#Registration_no').val(),'slc_form_div')">Show</button>
          </div> 
            
          <div id="slc_form_div">
             
           </div> 
        </form>
        <div>  
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
  function refreshPage(){
    window.location.reload();
} 
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
