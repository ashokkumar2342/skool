 @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Menus Report<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.account.default.user.role.report.generate') }}" method="post" target="blank">
                {{ csrf_field() }}
                
              <div class="col-lg-4">
                <label>Report For</label>
                <select name="report_for" class="form-control">
                   <option value="1">All Menus</option>
                   <option value="2">Only Permission Menus</option>
                   <option value="3">User Wise Menus</option> 
                 </select> 
              </div>
              <div class="col-lg-4">
                <input type="submit" class="btn btn-success" style="margin-top: 24px" value="PDF Generate">
                 
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
    $('#btn_outhor_table_show').click();
    $('#btn_homework_table_show').click();
    $(document).ready(function(){
        $('#sms_list').DataTable();
    });
    
  </script>
  @endpush
     
 
 
