  
  <!-- Main content -->
   
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
              <form action="{{ route('admin.library.author.details.update',$authors->id) }}" button-click="btn_close" content-refresh="author_table" method="post" class="add_form">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Author Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" value="{{ $authors->name }}" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder=""  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $authors->mobile_no }}"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" required="" value="{{ $authors->email }}"> 
                    </div> 
                    <div class="col-lg-3">
                      <label>Address</label>
                      <textarea class="form-control" name="address" maxlength="200" value="">{{ $authors->address }}</textarea>
                        
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
    </section>
    <!-- /.content -->

 
