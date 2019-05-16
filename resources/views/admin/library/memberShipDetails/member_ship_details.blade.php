@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Member Ship Registration <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.member.ship.details.store') }}" method="post" class="add_form"  button-click="btn_library_member_ship_registration">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select id="library_member_ship" select2="true" name="member_ship_type" class="form-control"onchange="callAjax(this,'{{ route('admin.library.member.ship.details.student.search') }}','library_member_ship_details_table')" >
                        <option selected disabled>Select Member Ship Type </option> 
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id }}">{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach 
                      </select>
                    </div> 
                    <div id="library_member_ship_details_table"> 
                     </div>
                     <div id="library_member_ship_details_table"> 
                     </div>
                      <div id="library_member_ship_student_table"> 
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
           <button id="btn_library_member_ship_registration" hidden data-table="library_member_ship_registration_data_table" onclick="callAjax(this,'{{ route('admin.library.member.ship.details.table.show') }}','library_member_ship_registration_table_show')">show </button>
          <div class="box"> 
            <div class="box-body" id="library_member_ship_registration_table_show">
           
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
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#library_member_ship_registration_data_table').DataTable();
    });
     $('#btn_library_member_ship_registration').click();
  </script>
   
  @endpush
     
 
 