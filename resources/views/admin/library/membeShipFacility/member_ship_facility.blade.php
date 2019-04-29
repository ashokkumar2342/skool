@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Member Ship Facility <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.member.ship.facility.store') }}" method="post" class="add_form" button-click="btn_member_ship_facility_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control" >
                        <option disabled selected="">Select Member Ship Type</option>}
                        option
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id }}">{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach 
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <label>No of Books</label>
                      <input type="text" name="no_of_books" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>  
                    <div class="col-lg-4">
                      <label>No of Days</label>
                      <input type="text" name="no_of_days" class="form-control" placeholder="" required="" maxlength="50"> 
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
     
 
 