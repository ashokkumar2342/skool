  
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
        <h4 class="modal-title">School Details Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.school.details.store') }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Mobile</label>
                      <input type="text" name="mobile" class="form-control" placeholder="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Contact</label>
                      <input type="text" name="contact" class="form-control" placeholder="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Logo</label>
                      <input type="file" name="logo"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Image</label>
                      <input type="file" name="image"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Address</label>
                      <textarea  name="address" class="form-control"></textarea> 
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

 
