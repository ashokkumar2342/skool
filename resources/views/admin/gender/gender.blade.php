@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Genders </h1>
       
    </section>  
    <section class="content">
      <div class="box"> 
        <div class="box-body"> 
          <div class="row"> 
              <div class="col-lg-4">
                <label>Id</label>  
                <input type="text" name="id" class="form-control">
              </div>
              <div class="col-lg-4">
                <label>Gender Name</label>  
                <input type="text" name="name" class="form-control">
              </div>
              <input type="submit" class="btn btn-success" style="margin-top: 24px">
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
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
