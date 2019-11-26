@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
   {{--  <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.event.type.add.form')}}')" style="margin:10px">Reminder</button> --}}
    <h1>Send Sms<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.attendance.sms.send.show') }}" method="post" data-table="send_sms_table" class="add_form" success-content-id="div_send_sms_table" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" name="date" class="form-control" id="date_dav"> 
                    </div> 
                  </div> 
                  <div class="col-lg-4">
                    <div class="form-group">
                      <input type="submit" class="btn btn-success" id="btn_show" value="Show" style="margin-top: 24px"> 
                    </div> 
                  </div> 
                </div> 
              </form>
              <form action="{{ route('admin.attendance.sms.send.final') }}" method="post"  no-reset="true" select-triger="date_dav" button-click="btn_show" class="add_form">
                {{ csrf_field() }} 

              <div id="div_send_sms_table">
                
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
     $(document).ready(function(){
        $('#send_sms_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 