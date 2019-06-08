   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;
  } 
</style> 
  <div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
           <form action="{{ route('admin.reset.password') }}" method="post"class="add_form">
                 {{ csrf_field() }}
                 <div class="row">
                   <div class="col-lg-12">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" placeholder="Email/Phone No" maxlength="100"> 
                   </div> 
                   <label>New Password</label>
                     <input type="text" name="new_password" class="form-control" placeholder="Email/Phone No" maxlength="50"> 
                   </div> 
                   <label>Confirm Password</label>
                     <input type="text" name="confirm_password" class="form-control" placeholder="Email/Phone No" maxlength="50"> 
                   </div> 
                 </div>
                 <div class="row">
                  <div class="col-lg-12 text-center" style="padding-top: 10px">
                    <input type="submit" value="Reset Password" class="btn btn-success">
                  </div> 
                 </div> 
            </form> 
            </div> 
          </div> 
        </div>
      </div>
    </div>

     
     
 
