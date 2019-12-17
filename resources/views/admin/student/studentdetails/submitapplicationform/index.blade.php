@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Submit Application Form<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body"> 
             <form action="{{ route('admin.submit.application.search') }}" method="post" class="add_form" success-content-id="fee_details" no-reset="true">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label>Application No.</label>
                  <input type="text" name="application_no" class="form-control" placeholder="Enter Application No."> 
                </div>
                <div class="col-lg-4 form-group"> 
                  <input type="submit" class="btn btn-success" style="margin-top: 24px" value="Search" id="btn_show"> 
                </div> 
              </div>
             </form>
             <form action="{{ route('admin.submit.application.submitted') }}" method="post" class="add_form" no-reset="true" button-click="btn_show">
              {{ csrf_field() }}
                <div class="col-lg-12" id="fee_details"> 
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
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
