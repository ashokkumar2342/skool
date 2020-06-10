@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Character Certificate Application</h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.student.showStudent') }}" method="post" class="add_form" success-content-id="studentshow" no-reset="true">
            {{csrf_field()}}
            <div class="row">
              <div class="col-lg-3">
                <label>Registration No.</label>
                <input type="text" name="regsno" class="form-control" maxlength="{{$regmaxlength->reg_length}}" >
              </div>
               <div class="col-lg-3">
                <input type="submit" id="btn_studentshow" class="btn btn-success" style="margin-top: 24px" value="Show" >
              </div>
            </div>
          </form>
          <div id="studentshow" style="margin-top: 20px"> 
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
