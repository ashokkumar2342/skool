  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:60%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add SMS API</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.api.smsApiStore',@$smsApi->id) }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-4">
                      <label>Username</label>
                      <input type="text" name="user_name" class="form-control" placeholder="Enter Username" maxlength="50" required="" value="{{ @$smsApi->user_id }}"> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Password</label>
                      <input type="pasword" name="password" class="form-control" maxlength="15" placeholder="Enter Password" required="" value="{{ @$smsApi->password }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Sender Name</label>
                      <input type="text" name="sender_name" class="form-control" placeholder="Enter Sender Name" required="" value="{{ @$smsApi->sender_id }}"> 
                    </div>  
                    <div class="form-group col-lg-12">
                      <label>URL</label>
                      <textarea  name="url" class="form-control" placeholder="Enter URL" required="">{{ @$smsApi->url }}</textarea> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No"> 
                    </div>
                    <div class="form-group   col-lg-4">
                       <a href="#" class="btn btn-warning" style="margin-top: 25px" onclick="callAjax(this,'{{ route('admin.api.test.message',1) }}'+'?mobile='+$('#mobile').val(),'')">Test Message</a>
                    </div> 
                   <div class="row">
                    <div class="col-lg-6" style="margin-left: 20px">
                      <label>Enable Auto Send</label>
                        <input type="checkbox" name="">
                    </div>
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
                   </div> 
              </form> 
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
