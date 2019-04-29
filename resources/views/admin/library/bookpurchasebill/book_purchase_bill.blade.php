@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Book Purchase Bill<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.book.book.purchase.bill.store') }}" method="post" class="add_form" button-click="btn_book_purchase_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Purchase Date</label>
                      <input type="date" name="p_date" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Vender Name</label>
                      <input type="text" name="vendor_name" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="" required=""maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-6">
                      <label>Address</label>
                      <textarea class="form-control" name="address"></textarea>
                      
                    </div>
                    <div class="col-lg-3">
                      <label>Bill No</label>
                      <input type="text" name="bill_no" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-3">
                      <label>total Amount</label>
                      <input type="text" name="total_amount" class="form-control" placeholder="" required="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
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
           <button id="btn_book_purchase_table_show" hidden data-table="books_purchase_data_table" onclick="callAjax(this,'{{ route('admin.library.book.purchase.table.show') }}','book_purchase_table')">show </button>
          <div class="box"> 
            <div class="box-body" id="book_purchase_table">
           
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
        $('#books_purchase_data_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_purchase_table_show').click();
  

  </script>
  @endpush
     
 
 