@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Users Report<small></small> </h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body" id="event_type_table_show_div">
              <form action="{{ route('admin.user.report.filter') }}" method="post" target="blank">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-12 text-center">
                  <label><h4><b>Report Type</b></h4></label> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Role Wise</label>
                    <input type="radio" name="report_type" id="report_type1" value="1" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type1').val(),'report_type_div')"> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Users Wise</label>
                    <input type="radio" name="report_type" id="report_type2" select2="true" value="2" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type2').val(),'report_type_div')"> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Menu Wise</label>
                    <input type="radio" name="report_type" id="report_type3" value="3" multiselect-form="true" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type3').val(),'report_type_div')"> 
                  </div> 
                  </div>
                  <div class="col-lg-4 text-center" id="report_type_div" style="margin-left: 400px"> 
                  </div> 
                  <div class="col-lg-12 text-center" style="margin-top: 30px">
                  <label><h4><b>User Status</b></h4></label> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>All</label>
                    <input type="radio" name="user_status" value="0"> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Active</label>
                    <input type="radio" name="user_status" value="1"> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Not Active</label>
                    <input type="radio" name="user_status" value="2"> 
                  </div>
                  <div class="col-lg-12 text-center" style="margin-top: 30px">
                  <label><h4><b>Report Details Type</b></h4></label> 
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>Only User List</label>
                    <input type="radio" name="report_details" value="1"> 
                  </div>
                  <div class="col-lg-4 text-center">
                     
                  </div>
                  <div class="col-lg-4 text-center">
                    <label>User With Menu Details</label>
                    <input type="radio" name="report_details" value="2"> 
                  </div>
                  <div class="col-lg-12 text-center" style="margin-top:25px">
                    <input type="submit" class="btn btn-success">
                     
                   </div> 
                </div>
                
                
              </form>
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

 </script>
  @endpush
     
 
 