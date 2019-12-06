  
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
        <h4 class="modal-title">{{ @$feeAccounts->id?'Edit' : 'Add' }} Fee Account</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.feeAcount.post',@$feeAccounts->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="fee_account_table">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4 form-group">
                      <label>Fee Account Code</label>
                      <span class="fa fa-asterisk"></span>
                       <input type="text" name="code" class="form-control" placeholder="Enter Fee Account Code" maxlength="3" value="{{ @$feeAccounts->code }}">
                    </div><div class="col-lg-4 form-group">
                      <label>Fee Account Name</label>
                      <span class="fa fa-asterisk"></span>
                       <input type="text" name="name" class="form-control" placeholder="Enter Fee Account Name" maxlength="50" value="{{ @$feeAccounts->name }}">
                    </div><div class="col-lg-4 form-group">
                      <label>Sorting Order No.</label>
                       <input type="text" name="sorting_order_no" class="form-control" placeholder="Enter Sorting Order No." maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ @$feeAccounts->sorting_order_no }}" >
                    </div><div class="col-lg-12 form-group">
                      <label>Description</label>
                       <textarea name="description" class="form-control" maxlength="200">{{@$feeAccounts->description }}</textarea>
                    </div> 
                   </div>
                   
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div> 
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
