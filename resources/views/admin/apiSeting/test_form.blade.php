  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:20%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Test API</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.api.test.message.send') }}" method="post" class="add_form" button-click="btn_homework_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-12">
                      @if ($id==1)
                      <label>Mobile No</label>
                      <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile No" maxlength="10">
                      @else
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email" maxlength="50"> 
                      @endif
                      <input type="hidden" name="test" value="{{ $id }}"> 
                    </div> 
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Send" class="btn btn-success">
                    </div> 
                   </div> 
              </form> 
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
