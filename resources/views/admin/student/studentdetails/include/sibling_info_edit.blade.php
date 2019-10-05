  
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
        <h4 class="modal-title">Sibling Info Edit</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.sibling.update',$student->id) }}" method="post" class="add_form" button-click="btn_close,sibling_info_tab"> 
          {{ csrf_field() }}
       <div class="row"> 
        <div class="col-md-6">
        <label>Registration No</label>
        <input type="text" name="registration_no" class="form-control" value="{{ $student->registration_no }}"> 
        </div> <div class="col-md-5">
        <label>Name </label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}"> 
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px">
        <input type="submit" class="btn btn-success" value="Update"> 
        </div>  
         
      </div>
       </form>
      </div>
    </div>   
  </div>

               
      <!-- /.row -->
       