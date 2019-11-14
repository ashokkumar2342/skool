  
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
        <h4 class="modal-title"> {{ @$genders->id? 'Edit' : 'Add' }} Gender</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.gender.store',@$genders->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="gender_table">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Gender Name</label>
                      <input type="text" name="gender_name" class="form-control" placeholder="Enter House Name" maxlength="20" value="{{ @$genders->genders }}"> 
                    </div> 
                    <div class="col-lg-6">
                      <label>Code</label>
                      <input type="text" name="code" class="form-control" placeholder="Enter House Code" maxlength="2" value="{{ @$genders->code }}"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
