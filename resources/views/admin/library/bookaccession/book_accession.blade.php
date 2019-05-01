@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Book Accession <small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.book.accession.details.store') }}" method="post" class="add_form" button-click="btn_book_accession_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Accession No</label>
                      <input type="text" name="accession_no" class="form-control" placeholder="" maxlength="30"> 
                    </div>
                    <div class="col-lg-6">
                      <label>ISBN No</label>
                      <input type="text" name="isbn_no" class="form-control" placeholder=""  maxlength="30"> 
                    </div>
                    <div class="col-lg-4">
                    <label>Book Name</label>
                     <select name="book_name" class="form-control">
                      <option selected disabled >Select Book Name</option> 
                      @foreach ($booktypes as $booktype) 
                       <option value="{{ $booktype->id }}">{{ $booktype->name }}</option>
                      @endforeach 
                     </select>
                   </div>
                    
                     <div class="col-lg-4">
                    <label>Bill No</label>
                     <select name="bill_no" class="form-control">
                      <option selected disabled>Select Bill No</option> 
                      @foreach ($bookpurchasebills as $bookpurchasebill) 
                       <option value="{{ $bookpurchasebill->id }}">{{ $bookpurchasebill->bill_no }}</option>
                      @endforeach 
                     </select>
                   </div>
                    
                    <div class="col-lg-4">
                      <label>Status</label>
                      <textarea name="status" class="form-control" placeholder=""></textarea>
                       
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
           <button id="btn_book_accession_table_show" hidden data-table="books_accession_data_table" onclick="callAjax(this,'{{ route('admin.library.book.accession.table.show') }}','book_accession_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="book_accession_table">
           
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
        $('#books_accession_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_accession_table_show').click();
  

  </script>
  @endpush
     
 
 