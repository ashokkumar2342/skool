  
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
        <h4 class="modal-title">Class Wise Room Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.class.wise.room.details.update',$classWiseRooms->id) }}" method="post" class="add_form" content-refresh="class_wise_room_table" button-click="btn_close">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                  <label>Class</label>
                  <select name="class_id" class="form-control">
                    <option value=""></option>
                     @foreach ($classTypes as $classType)
                     <option value="{{ $classType->id }}"{{ $classWiseRooms->class_id==$classType->id? 'selected' : '' }}>{{ $classType->name }}</option> 
                     @endforeach
                  </select>
                  
                </div>
                <div class="col-lg-6">
                  <label>Room No</label>
                  <select name="room_name" class="form-control">
                    <option value=""></option>
                     @foreach ($roomTypes as $roomType)
                     <option value="{{ $roomType->id }}"{{ $classWiseRooms->room_id==$roomType->id? 'selected' : '' }}>{{ $roomType->name }}</option> 
                     @endforeach
                  </select>
                  
                </div> 
              </div>
              <div class="col-lg-12 text-center"> 
               <input type="submit" class="btn btn-success" value="Update" style="margin: 24px"> 
            </div>
                
             </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
