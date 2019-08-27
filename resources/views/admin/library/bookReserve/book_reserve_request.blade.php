@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
      <h1>Book Reserve Details <small>List</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 17])  
    <button type="button" class="btn btn-info pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.library.book.reserve.request.addform')}}')" style="margin:10px">Request</button>

     <a href="{{ route('admin.library.book.reserve.cancel.upto.date') }}" class="btn btn-danger pull-right" style="margin:10px">Cancel Upto Date</a>
   

   
     
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            
           <button id="btn_book_reserve_table_show" hidden data-table="books_reserve_request_data_table" onclick="callAjax(this,'{{ route('admin.library.book.reserve.table.show') }}','book_reserve_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="book_reserve_table">
           
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
        $('#books_reserve_request_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_reserve_table_show').click();
  

  </script>
  @endpush
     
 
 