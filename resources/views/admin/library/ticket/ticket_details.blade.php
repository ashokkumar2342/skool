@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">

    <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.library.ticket.details.add.form')}}')" style="margin:10px">Add Form</button>
    <h1>Tickets Details <small>Show</small> </h1>
     <button id="btn_ticket_details_table_show" hidden data-table="tickets_data_table" onclick="callAjax(this,'{{ route('admin.library.ticket.details.table.show') }}','ticket_details_show_div')">show </button>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-body">
            <div id="ticket_details_show_div">
                         
            </div>           
          
          </div>
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
        $('#tickets_data_table').DataTable();
    });
  </script>
  <script>
      
        $('#btn_ticket_details_table_show').click();
    
  </script>
   
  @endpush
