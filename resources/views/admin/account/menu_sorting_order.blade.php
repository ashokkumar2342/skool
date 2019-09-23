@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Menu Ordering<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          <div class="box"> 
            <div class="box-body" id="event_type_table_show_div">
              <div class="col-lg-3">
                <label>Menu Type</label>
                <select name="" class="form-control">
                   <option selected disabled>Select Menu</option>
                  @foreach ($menuTypes as $menuType)
                      <option value="{{ $menuType->id }}">{{ $menuType->name }}</option> 
                  @endforeach
                  
                </select> 
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
     
 
 