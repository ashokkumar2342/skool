
    <section class="content">
      <div class="modal-dialog" style="width:70%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book Details  Edit</h4>
      </div>           
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.book.details.update',$booktypes->id) }}" method="post" class="add_form" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Book Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" required="" maxlength="4"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Book Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Subject Subject</label>
                      <select name="subject_id" class="form-control">
                        <option selected="" disabled="">Select Subject</option> 
                        @foreach ($subjects as $subject) 
                        <option value="{{ $subject->id  }}">{{ $subject->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> <div class="col-lg-4">
                      <label>Publisher</label>
                      <select name="publisher_id" class="form-control">
                        <option>Select Publisher</option> 
                        @foreach ($publishers as $publisher) 
                        <option value="{{ $publisher->id  }}">{{ $publisher->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Author</label>
                      <select name="author_id" class="form-control">
                        <option>Select Author</option> 
                        @foreach ($authors as $author) 
                        <option value="{{ $author->id  }}">{{ $author->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book feature</label>
                      <input type="text" name="feature" class="form-control" placeholder="" maxlength="200"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book Image</label>
                      <input type="file" name="image[]" multiple="true"> 
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
    </section>
    <!-- /.content -->

 

