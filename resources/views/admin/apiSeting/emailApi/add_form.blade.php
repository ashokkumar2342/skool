
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$emailApi->id? 'Edit' : 'Add' }} Add Email API</h4>
        
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.api.emailApiStore',@$emailApi->id) }}" method="post" class="add_form" button-click="btn_homework_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-4">
                      <label>Host</label>
                      <input type="text" name="host" class="form-control" placeholder="Enter Host" maxlength="200"  value="{{ @$emailApi->host }}"> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Port</label>
                      <input type="text" name="port" class="form-control" maxlength="4" placeholder="Enter Port"  value="{{ @$emailApi->port }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control"  placeholder="Username" value="{{ @$emailApi->username }}" maxlength="50"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control"  placeholder="Enter Password" value="{{ @$emailApi->password }}" maxlength="50"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Encryption</label>
                      <input type="text" name="encryption" class="form-control"  placeholder="Enter Encryption" value="{{ @$emailApi->encryption }}" maxlength="200"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>From</label>
                      <input type="text" name="from" class="form-control"  placeholder="Enter From" value="{{ @$emailApi->mail_from }}" maxlength="50"> 
                      
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Enable Auto Send</label>
                      <input type="checkbox" name="enable_auto_send" value="1" {{ @$emailApi->enableautosend==1? 'checked' : '' }}>
                       
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

 
