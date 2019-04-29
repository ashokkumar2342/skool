@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Library Member Type <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.library.member.type.store') }}" method="post" class="add_form" button-click="btn_library_member_ship_type_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Member Ship Type</label>
                      <input type="text" name="m_ship_type" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-6">
                      <label>Member Ship Code</label>
                      <input type="text" name="m_ship_code" class="form-control" placeholder="" required="" maxlength="50"> 
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
           <button id="btn_library_member_ship_type_table_show" hidden data-table="library_member_ship_type_data_table" onclick="callAjax(this,'{{ route('admin.library.member.type.table.show') }}','library_member_ship_type_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="library_member_ship_type_table">
           
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
        $('#library_member_ship_type_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_library_member_ship_type_table_show').click();
  

  </script>
  @endpush
     
 
 