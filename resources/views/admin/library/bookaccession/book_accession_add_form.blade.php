
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
        <h4 class="modal-title">Add Book Accession </h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.book.accession.details.store') }}" method="post" class="add_form" button-click="btn_book_accession_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="form-group col-lg-6">
                      <label>Accession No</label>
                      <input type="text" name="accession_no" class="form-control" placeholder="Enter Accession No" required="" maxlength="15"> 
                    </div>
                    <div class="form-group col-lg-6">
                      <label>ISBN No</label>
                      <input type="text" name="isbn_no" required="" class="form-control" placeholder="Enter ISBN No"  maxlength="15"> 
                    </div>
                    <div class="form-group col-lg-4">
                    <label>Book Name</label>
                     <select name="book_name" class="form-control select2">
                      <option selected disabled >Select Book Name</option> 
                      @foreach ($booktypes as $booktype) 
                       <option value="{{ $booktype->id }}">{{ $booktype->name }}</option>
                      @endforeach 
                     </select>
                   </div>
                    
                     <div class="form-group col-lg-4">
                    <label>Bill No</label>
                     <select name="bill_no" id="select_bill_no_too" class="form-control select2">
                      <option selected disabled>Select Bill No</option> 
                      @foreach ($bookpurchasebills as $bookpurchasebill) 
                       <option value="{{ $bookpurchasebill->id }}">{{ $bookpurchasebill->bill_no }}</option>
                      @endforeach 
                     </select>
                   </div>
                    
                    <div class="form-group col-lg-4">
                      <label>Status</label>
                      <select name="status" class="form-control"> 
                        <option selected disabled>Select Status</option> 
                        @foreach ($libraryStatuss as $libraryStatus) 
                        <option value="{{ $libraryStatus->id }}">{{ $libraryStatus->name }}</option>
                        @endforeach 
                      </select> 
                       
                    </div>
                  </div>
                   <div class="row">
                    <div class="form-group col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>   
              
      <!-- /.row -->
          </div>
          
        </div>
      </div>
   </div>
 

 

