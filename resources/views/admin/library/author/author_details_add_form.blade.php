  
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
        <h4 class="modal-title">Author Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.library.author.details.store') }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Author Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder=""  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder=""> 
                    </div> 
                    <div class="col-lg-3">
                      <label>Address</label>
                      <textarea class="form-control" name="address" placeholder="" maxlength="250"></textarea>
                        
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
         
        </div>
      </div>
     
    <!-- /.content -->

 
