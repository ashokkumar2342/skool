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
                <div class="col-lg-12"> 
                <div class="panel panel-default">
                  <div class="panel-heading">Report Type</div> 
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-4" style="margin-left: 12px"> 
                        <div class="form-check">
                          <input type="radio" class="form-check-input" id="report_type1" name="report_type" value="1" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type1').val(),'report_type_div')">
                          <label class="form-check-label" for="materialGroupExample1">Role Wise</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="report_type" id="report_type2" select2="true" value="2" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type2').val(),'report_type_div')">
                          <label class="form-check-label" for="materialGroupExample2">Users Wise</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="report_type" id="report_type3" value="3" multiselect-form="true" onclick="callAjax(this,'{{ route('admin.user.report.type.filter') }}'+'?report_type='+$('#report_type3').val(),'report_type_div')">
                          <label class="form-check-label" for="materialGroupExample3">Menu Wise</label>
                        </div>
                      </div>
                        
                        <div class="col-lg-4 text-center" id="report_type_div">
                        </div>   
                    </div>
                </div>
              </div>
            </div>
              <div class="col-lg-6"> 
                <div class="panel panel-default">
                  <div class="panel-heading">User Status</div> 
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-4" style="margin-left: 12px"> 
                        <div class="form-check">
                          <input type="radio" name="user_status" value="2">
                          <label class="form-check-label" for="materialGroupExample1">All</label>
                        </div>

                        <!-- Group of material radios - option 2 -->
                        <div class="form-check">
                          <input type="radio" name="user_status" value="1">
                          <label class="form-check-label" for="materialGroupExample2">Active</label>
                        </div>

                        <!-- Group of material radios - option 3 -->
                        <div class="form-check">
                          <input type="radio" name="user_status" value="0">
                          <label class="form-check-label" for="materialGroupExample3">Inactive</label>
                        </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6"> 
                  <div class="panel panel-default" style="height: 150px">
                   <div class="panel-heading">Report Details Type</div> 
                    <div class="panel-body">
                      <div class="col-lg-12" style="margin-left: 6px"> 
                       <div class="form-check">
                         <input type="radio" name="report_details" value="1">
                         <label class="form-check-label" for="materialGroupExample1">Only User List</label>
                       </div>

                       <!-- Group of material radios - option 2 -->
                       <div class="form-check">
                         <input type="radio" name="report_details" value="2">
                         <label class="form-check-label" for="materialGroupExample2">User With Menu Details</label>
                       </div> 
                    </div>
                  </div> 
                </div>
                </div> 
                <div class="col-lg-12 text-center">
                <input type="submit" value="Report Generate" class="btn btn-success">
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
     
 
 