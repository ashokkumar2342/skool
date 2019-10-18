  
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
        <h4 class="modal-title">School Add</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.school.dominos.store') }}" method="post" class="add_form" button-click="btn_quotes_table,btn_close">
                   {{ csrf_field() }}
                    <div class="row">
                    <div class="form-group col-lg-3">
                      <label>School Code</label>
                      <input type="text" name="school_code" class="form-control" placeholder="Enter Code"> 
                    </div>
                    <div class="form-group col-lg-3">
                      <label>School Name</label>
                      <input type="text" name="school_name" class="form-control" placeholder="Enter Name"> 
                    </div> 
                    <div class="form-group col-lg-3">
                      <label>School Domain Url</label>
                      <input type="text" name="school_url" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>From Date</label>
                      <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>To Date</label>
                      <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>User ID</label>
                      <input type="text" name="user_id" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>Person Name</label>
                      <input type="text" name="person_name" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>Mobile</label>
                      <input type="number" name="mobile" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                      <label>Address</label>
                     <textarea class="form-control" name="address"></textarea>
                    </div> 
                   <div class="col-lg-12 text-center" style="padding-top: 20px">
                    <input type="submit" class="btn btn-success">
                     
                   </div>
                   </div>
                   
                            
               
                   
                 
                
              </form>
                
          
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.cont