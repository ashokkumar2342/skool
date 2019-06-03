
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
        <h4 class="modal-title">Book Accession Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.book.accession.update',$bookaccessions->id) }}" method="post" class="add_form" button-click="btn_book_accession_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Accession No</label>
                      <input type="text" name="accession_no" class="form-control" placeholder="" value="{{ $bookaccessions->accession_no }}"  maxlength="30"> 
                    </div>
                    <div class="col-lg-6">
                      <label>ISBN No</label>
                      <input type="text" name="isbn_no" class="form-control" placeholder="" value="{{ $bookaccessions->isbn_no }}" maxlength="30"> 
                    </div>
                    <div class="col-lg-4">
                    <label>Book Name</label>
                     <select name="book_name" class="form-control">
                      <option selected disabled>Select Book Name</option> 
                      @foreach ($booktypes as $booktype) 
                       <option value="{{ $booktype->id  }}"{{ $bookaccessions->book_id==$booktype->id? 'selected="selected"' : ''  }}>{{ $booktype->name or '' }}</option> 
                      @endforeach 
                     </select>
                   </div>
                    
                     <div class="col-lg-4">
                    <label>Bill No</label>
                     <select name="bill_no" class="form-control">
                      <option selected disabled>Select Bill No</option> 
                      @foreach ($bookpurchasebills as $bookpurchasebill) 
                       <option value="{{ $bookpurchasebill->id  }}"{{ $bookaccessions->bill_id==$bookpurchasebill->id? 'selected="selected"' : ''  }}>{{ $bookpurchasebill->bill_no or '' }}</option> 
                      @endforeach 
                     </select>
                   </div>
                    
                    <div class="col-lg-4">
                      <label>Status</label>
                      <select name="status" class="form-control">
                      <option selected disabled>Select status</option> 
                      @foreach ($libraryStatuss as $libraryStatus) 
                       <option value="{{ $libraryStatus->id  }}"{{ $bookaccessions->status==$libraryStatus->id? 'selected="selected"' : ''  }}>{{ $libraryStatus->name or '' }}</option> 
                      @endforeach 
                     </select>
                       
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

 

