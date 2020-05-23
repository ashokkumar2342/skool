@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Homework<small>List</small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('student.homewok.list.show') }}" method="post" class="add_form" success-content-id="homewok_list" no-reset="true">
            <div class="row">
              <div class="col-lg-4">
                <label>Date</label>
                        {!! Form::text('date', date('d-m-Y')  , ['class'=>'form-control datepicker','id'=>'date','placeholder'=>'Date','max'=>date('Y-m-d')]) !!}
              </div>
              <input type="hidden" name="print" value="0" id="btn_print">
              <div class="col-lg-4">
                <input type="submit" value="Homework Show" onclick="$('#btn_print').val(0)" class="form-control btn btn-success" style="margin-top: 24px">
              </div>
              <div class="col-lg-4">
                <input type="submit" value="Print" onclick="$('#btn_print').val(1)"  class="form-control btn btn-default" style="margin-top: 24px">
              </div>
            </div>
          </form>
          <div class="table-responsive" id="homewok_list" style="margin-top: 30px">
            
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
