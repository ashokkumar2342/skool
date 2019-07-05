@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
  <button type="button" class="btn btn-info pull-right " select2="true"  onclick="callPopupLarge(this,'{{ route('admin.teacher.absent')}}')"  >Add Absent Teacher</button> 
    <h1>Teacher Adjustment<small>List</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
        <form action="{{ route('admin.teacher.adjustment.show') }}" method="post" class="add_form" no-reset="true" success-content-id="teacher_history_table">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-4">
              <label>Absent Date</label>
              <input type="date" name="absent_date" class="form-control">
            </div>
            <div class="col-lg-3"> 
              <input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px">
            </div>
          </div>
           </form> 
           <form action="{{ route('admin.teacher.adjustment.result') }}" method="post" class="add_form">
             {{ csrf_field() }} 
           <div id="teacher_history_table">
             
           </div>
        

        </div>
      </div>
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#data_table').DataTable();
    });

 </script>
  @endpush
