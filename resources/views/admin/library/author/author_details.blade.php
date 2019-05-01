@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Author Add<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.author.details.store') }}" method="post" class="add_form" button-click="btn_outhor_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Author Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder=""  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder=""> 
                    </div> 
                    <div class="col-lg-3">
                      <label>Address</label>
                      <textarea class="form-control" name="address" placeholder="" maxlength="250"></textarea>
                        
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
          <button id="btn_outhor_table_show" hidden data-table="author_table" onclick="callAjax(this,'{{ route('admin.library.author.details.table.show') }}','othor_details_table_show')">show </button>
          <div class="box"> 
            <div class="box-body" id="othor_details_table_show">
           
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
        $('#author_table').DataTable();
    });

     $('#btn_outhor_table_show').click();
  </script>
  @endpush
     
 
 