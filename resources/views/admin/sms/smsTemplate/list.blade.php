@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-primary pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add')}}')" style="margin:10px">Add Template</button>
    <h1>SMS Template List<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          
          <button id="btn_outhor_table_show" hidden data-table="author_table" onclick="callAjax(this,'{{ route('admin.sms.template.table') }}','othor_details_table_show')">show </button>
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
     
 
 