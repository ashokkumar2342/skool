
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
        <h4 class="modal-title">Author Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
              <form action="{{ route('admin.library.book.details.update',$booktypes->id) }}" method="post" button-click="btn_close" class="add_form" enctype="multipart/form-data" content-refresh="books_table">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Book Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" required="" maxlength="4" value="{{ $booktypes->code }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Book Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="50" value="{{ $booktypes->name }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Subject Subject</label>
                      <select name="subject_id" class="form-control">
                        <option selected="" disabled="">Select Subject</option> 
                        @foreach ($subjects as $subject)
                        
                        <option value="{{ $subject->id  }}"{{ $booktypes->subject_id==$subject->id? 'selected="selected"' : ''  }}>{{ $subject->name }}</option>
                        @endforeach 
                      </select> 
                    </div> <div class="col-lg-4">
                      <label>Publisher</label>
                      <select name="publisher_id" class="form-control">
                        <option>Select Publisher</option> 
                        @foreach ($publishers as $publisher)
                         <option value="{{ $publisher->id  }}"{{ $booktypes->publisher->id==$publisher->id? 'selected="selected"' : ''  }}>{{ $publisher->name }}</option> 
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Author</label>
                      <select name="author_id" class="form-control">
                        <option>Select Author</option> 
                        @foreach ($authors as $author)
                         <option value="{{ $author->id  }}"{{ $booktypes->author->id==$author->id? 'selected="selected"' : ''  }}>{{ $author->name }}</option> 
                        
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book feature</label>
                      <input type="text" name="feature" class="form-control" placeholder="" maxlength="200" value="{{ $booktypes->feature}}"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book Image</label>
                      <input type="file" name="image[]" multiple="true"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                       <button class="btn btn-success" type="submit">Update</button>
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

 

