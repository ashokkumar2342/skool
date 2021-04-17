  
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><a href="{{ route('admin.attendance.leave.delete',$leaveRecord->id) }}" target="blank" style="margin:10px">Open Attachment</a> </h4>
      </div>
      <div class="modal-body"> 
        <form action="" method="get" accept-charset="utf-8">
          <label>Remarks</label>
      		<textarea class="form-control">{{ $leaveRecord->remark }}</textarea>
         
        </form>
       
       
        </div>
      </div>
    </div>


     
    <!-- /.content -->

 

