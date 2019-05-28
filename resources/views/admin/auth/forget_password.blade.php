   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;
  } 
</style> 
  <div class="modal-dialog" style="width:40%"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
           <form action="{{ route('admin.forget.password.send.link') }}" method="post"class="add_form">
                 {{ csrf_field() }}
                 <div class="row">
                   <div class="col-lg-12">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" placeholder="Email" maxlength="100"> 
                   </div> 
                 </div>
                 <div class="row">
                  <div class="col-lg-12 text-center" style="padding-top: 10px">
                    <input type="submit" value="Send Password Reset Link" class="btn btn-success">
                  </div> 
                 </div> 
            </form> 
            </div> 
          </div> 
        </div>
      </div>
    </div>

     
     
 
