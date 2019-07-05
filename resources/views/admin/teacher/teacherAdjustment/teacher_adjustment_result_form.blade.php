  
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
        <h4 class="modal-title">Adjustment teacher</h4>
      </div>
      <div class="modal-body">
      <form action=" " method="get" class="add_form">
        {{ csrf_field() }} 
        <div class="row"> 
          <div class="col-lg-4">
          <input type="text" name="" class="form-control" value="{{ $manualTimeTabls->teacherFaculty->name or '' }}"> 
         
          </div> 
        </div>
       </form> 
      </div>
    </div>
  </div>

     
    <!-- /.content -->

 
