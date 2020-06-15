@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Character Certificate Application</h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
        <form action="{{ route('admin.student.CharacterCertificateApplication.store') }}" method="post" class="add_form">
          {{csrf_field()}} 
            <div class="row"> 
              <div class="col-lg-2">
                <label>Registration No.</label>
                <input type="text" name="regsno" id="Registration_no" class="form-control" maxlength="{{$regmaxlength->reg_length}}" >
              </div>
              <div class="col-lg-1">
                <input type="button" id="btn_studentshow" class="btn btn-success" style="margin-top: 24px" value="Show" onclick="callAjax(this,'{{ route('admin.student.showStudent') }}'+'?Registration_no='+$('#Registration_no').val(),'studentshow')"> 
               </div> 
              <div id="studentshow">
              </div>
            </div>
        </form> 
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
