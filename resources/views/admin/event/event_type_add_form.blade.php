  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Event Type Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.event.type.store') }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-9">
                      <label>Event Type</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
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

 
