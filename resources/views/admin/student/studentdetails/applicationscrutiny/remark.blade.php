  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
@php 
if($status==3){
   $color='warning';
   $btnName='Pending';
}
elseif($status==4){
   $color='success';
   $btnName='Accepted';
}elseif($status==5){
   $color='danger';
   $btnName='Rejected';
} 
@endphp
 
  <div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remark </h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.submit.application.remark.store',$id) }}" method="post" class="add_form" button-click="btn_close,btn_{{ $status }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-12">
                  <label>Remark</label>
                  <textarea class="form-control" name="remark" maxlength="200"></textarea> 
                  <input class="form-control" name="status" maxlength="200" type="hidden" value="{{ $status }}"> 
                </div> 
                <div class="col-lg-12 text-center"> 
                <input type="submit" class="btn btn-{{ $color }} text-center" value="{{ $btnName }}" style="margin: 24px">
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

 
