
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
        <h4 class="modal-title">Add Book</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
              <form action="{{ route('admin.library.book.details.store') }}" method="post" class="add_form" button-click="btn_books_table_show,btn_close" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="form-group col-lg-4">
                      <label>Book Code</label>
                      <input type="text" name="code" class="form-control" placeholder="Enter Book Code" maxlength="12"> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Book Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Book Name" maxlength="50"> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Edition</label>
                      <input type="text" name="edition" class="form-control" placeholder="Enter Edition" maxlength="200"> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Price</label>
                      <input type="text" name="price" class="form-control" placeholder="Enter" maxlength="7"> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label>No Of Pages</label>
                      <input type="text" name="no_of_pages" class="form-control" placeholder="Enter No Of Pages Price" maxlength="7"> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Hall No</label>
                      <input type="text" name="hall_no" class="form-control" placeholder="Enter Hall No" maxlength="4"> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Shelf No</label>
                      <input type="text" name="shelf_no" class="form-control" placeholder="Enter Shelf No" maxlength="4"> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Box No</label>
                      <input type="text" name="box_no" class="form-control" placeholder="Enter Box No" maxlength="7"> 
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Subject</label>
                      <select name="subject" class="form-control " required="" >
                        <option selected disabled>Select Subject</option> 
                        @foreach ($subjects as $subject) 
                        <option required="" value="{{ $subject->id  }}">{{ $subject->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Publisher</label>
                      <select name="publisher" class="form-control select2" required="">
                        <option selected disabled>Select Publisher</option> 
                        @foreach ($publishers as $publisher) 
                        <option value="{{ $publisher->id  }}">{{ $publisher->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Author</label>
                      <select name="author" class="form-control select2">
                        <option selected disabled>Select Author</option> 
                        @foreach ($authors as $author) 
                        <option value="{{ $author->id  }}">{{ $author->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Book Feature</label>
                      <input type="text" name="feature" class="form-control" placeholder="Enter Book Feature" maxlength="200"> 
                    </div> 
                    <div class="form-group col-lg-4">
                      <label>Book Image</label>
                      <input type="file" name="image" multiple="true"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 5px">
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

    <!-- /.content -->

 

