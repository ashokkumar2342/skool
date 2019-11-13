  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Room {{ @$roomTypes->id? 'Edit' : 'Add' }}</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.room.details.update',@$roomTypes->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="room_table" >
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-12">
                  <label>Room Name/No</label>
                  <input type="text" name="room_name" class="form-control" value="{{ @$roomTypes->name }}" maxlength="50" placeholder="Enter Room Name/No"> 
                </div>
                <div class="col-lg-12">
                  <label>Room Location</label>
                  <input type="text" name="location" class="form-control" placeholder="Enter Room Location " maxlength="100" value="{{ @$roomTypes->location }}"  > 
                </div>
                <div class="col-lg-12 text-center">
                  
                <input type="submit" class="btn btn-success text-center" style="margin: 24px">
                </div>
              </div>
                
            </div>
                
             </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
