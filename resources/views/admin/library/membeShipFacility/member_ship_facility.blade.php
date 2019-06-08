@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.library.member.ship.facility.addform')}}')" style="margin:10px">Add Form</button>
    <h1>Member Ship Facility <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            
           <button id="btn_member_ship_facility_table_show" hidden data-table="member_ship_facility_data_table" onclick="callAjax(this,'{{ route('admin.library.member.ship.facility.table.show') }}','member_ship_facility_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="member_ship_facility_table">
           
            </div>
          </div>
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
     $(document).ready(function(){
        $('#member_ship_facility_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_member_ship_facility_table_show').click();
  

  </script>
  @endpush
     
 
 