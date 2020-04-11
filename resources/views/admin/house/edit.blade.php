  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit House</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.house.update',$houses->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6 form-group">
                      <label>House Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter House Name" maxlength="50" value="{{ $houses->name }}"> 
                    </div> 
                    <div class="col-lg-6 form-group">
                      <label>House Code</label>
                      <input type="text" name="code" class="form-control" placeholder="Enter House Code" maxlength="5" value="{{ $houses->code }}"> 
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
     
    <!-- /.content -->

 
