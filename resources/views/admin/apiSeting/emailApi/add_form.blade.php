  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Email API</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.api.emailApiStore',@$emailApi->id) }}" method="post" class="add_form" button-click="btn_homework_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-4">
                      <label>Host</label>
                      <input type="text" name="host" class="form-control" placeholder="Enter Host" maxlength="50" required="" value="{{ @$emailApi->host }}"> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Port</label>
                      <input type="text" name="port" class="form-control" maxlength="50" placeholder="Enter Port" required="" value="{{ @$emailApi->port }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" required="" placeholder="Username" value="{{ @$emailApi->username }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" required="" placeholder="Enter Password" value="{{ @$emailApi->password }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Encryption</label>
                      <input type="text" name="encryption" class="form-control" required="" placeholder="Enter Encryption" value="{{ @$emailApi->encryption }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>From</label>
                      <input type="text" name="from" class="form-control" required="" placeholder="Enter From" value="{{ @$emailApi->mail_from }}"> 
                    </div> 
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
                   </div> 
              </form> 
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
