
     <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book Purchase Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.book.purchase.details.update',$bookpurchases->id) }}" method="post" class="add_form" button-click="btn_book_purchase_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Purchase Date</label>
                      <input type="date" name="p_date" class="form-control" placeholder="" required="" value="{{ $bookpurchases->book_purchase_date }}"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" class="form-control" placeholder="" required="" maxlength="50" value="{{ $bookpurchases->vendor_name }}"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="" required="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $bookpurchases->mobile }}"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" required="" maxlength="50" value="{{ $bookpurchases->email }}"> 
                    </div>
                    <div class="col-lg-6">
                      <label>Address</label>
                      <textarea class="form-control" name="address">{{ $bookpurchases->address }}</textarea>
                      
                    </div>
                    <div class="col-lg-3">
                      <label>Bill No</label>
                      <input type="text" name="bill_no" class="form-control" placeholder="" required="" maxlength="50" value="{{ $bookpurchases->bill_no }}"> 
                    </div>
                    <div class="col-lg-3">
                      <label>total Amount</label>
                      <input type="text" name="total_amount" class="form-control" placeholder="" required="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $bookpurchases->total_amount }}"> 
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Update" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>   
              
      <!-- /.row -->
          </div>
          
        </div>
      </div>
   </div>

    <!-- /.content -->

 

