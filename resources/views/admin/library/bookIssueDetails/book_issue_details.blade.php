@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.library.book.issue.details.addform')}}')" style="margin:10px">Add Form</button>
    <h1>Book Issue <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            
           <button id="btn_book_issue_details_table" hidden data-table="books_issue_data_table" onclick="callAjax(this,'{{ route('admin.library.book.issue.details.table.show') }}','book_issue_table_show')">show </button>
          <div class="box"> 
            <div class="box-body" id="book_issue_table_show">
           
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
        $('#books_issue_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_issue_details_table').click();
  

  </script>
  @endpush
     
 
 