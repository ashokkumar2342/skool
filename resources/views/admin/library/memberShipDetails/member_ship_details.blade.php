@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Member Ship Add <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.member.ship.details.store') }}" method="post" class="add_form" button-click="btn_library_member_ship_details_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control">
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id }}">{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach 
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <label>Member Ship Facility</label>
                       <select name="member_ship_facility" class="form-control">
                        @foreach ($membershipfacilitys as $membershipfacility) 
                         <option value="{{ $membershipfacility->id }}">{{ $membershipfacility->member_ship_type_id }}</option>
                        @endforeach 
                       </select>
                    </div> 
                    <div class="col-lg-4">
                      <label>Member Ship No</label>
                      <input type="text" required="" name="member_ship_no" class="form-control">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Name</label>
                      <input type="text" name="name" required="" class="form-control">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Father's Name</label>
                      <input type="text" required="" name="father_name" class="form-control">  
                    </div> 
                    <div class="col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control"maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>  
                    </div>  
                    <div class="col-lg-4">
                      <label>Email</label>
                      <input type="email" name="email" required="" class="form-control">  
                    </div> 
                     <div class="col-lg-4">
                      <label>Address</label>
                      <textarea class="form-control" name="address"></textarea>
                    </div> 
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
           <button id="btn_library_member_ship_details_table_show" hidden data-table="library_member_ship_details_data_table" onclick="callAjax(this,'{{ route('admin.library.member.ship.details.table.show') }}','library_member_ship_details_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="library_member_ship_details_table">
           
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
        $('#library_member_ship_details_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_library_member_ship_details_table_show').click();
  

  </script>
  @endpush
     
 
 