   
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$smsApi->id? 'Edit' : 'Add' }} Add SMS API</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.api.smsApiStore',@$smsApi->id) }}" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-4">
                      <label>Username</label>
                      <input type="text" name="user_name" class="form-control" placeholder="Enter Username" maxlength="50"  value="{{ @$smsApi->user_id }}"> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Password</label>
                      <input type="pasword" name="password" class="form-control" maxlength="50" placeholder="Enter Password"  value="{{ @$smsApi->password }}"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Sender Name</label>
                      <input type="text" name="sender_name" class="form-control" placeholder="Enter Sender Name"  maxlength="6" value="{{ @$smsApi->sender_id }}"> 
                    </div>  
                    <div class="form-group col-lg-12">
                      <label>URL</label>
                      <textarea  name="url" class="form-control" placeholder="Enter URL" >{{ @$smsApi->url }}</textarea> 
                    </div>
                    <div class="col-lg-12">
                      <label>Enable Auto Send</label>
                        <input type="checkbox" name="enable_auto_send" value="1" {{ @$smsApi->enableautosend==1?'checked' : '' }}>
                    </div>
                    {{-- <div class="form-group   col-lg-4" style="margin-top: 20px">
                      <label>Mobile No</label>
                      <input type="text" name="mobile" id="mobile" class="form-control"  placeholder="Enter Mobile No"  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="form-group   col-lg-4">
                       <a href="#" class="btn btn-warning" style="margin-top: 45px" onclick="callAjax(this,'{{ route('admin.api.test.message',1) }}'+'?mobile='+$('#mobile').val(),'')">Test Message</a>
                    </div>  --}}
                   <div class="row"> 
                    <div class="col-lg-12 text-center" style="padding-top: 10px;">
                      <input type="submit" class="btn btn-success">
                    </div> 
                   </div> 
              </form> 
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
