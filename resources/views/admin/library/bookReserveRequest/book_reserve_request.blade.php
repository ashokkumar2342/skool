@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.library.book.reserve.request.addform')}}')" style="margin:10px">Add Form</button>
    <h1>Book Reserve Request <small>Details</small> </h1>
       
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
     
 
 