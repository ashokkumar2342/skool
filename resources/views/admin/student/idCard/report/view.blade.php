@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>ID Card Report<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body"> 
              <form action="" method="get" accept-charset="utf-8">
                <div class="row">
                  <div class="col-lg-4 form-group">
                    <label>Report For</label>
                    <select name="" class="form-control">
                      <option value=""></option> 
                    </select> 
                  </div>
                  <div class="col-lg-4 form-group">
                     <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px"> 
                  </div> 
                </div> 
              </form>
        </div>
      </div>
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
