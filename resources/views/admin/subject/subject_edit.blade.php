  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subject Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.subjectType.update',$subjects->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="dataTable" >
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-12">
                  <label>Subject Name</label>
                  <input type="text" name="subjectName" class="form-control" value="{{ $subjects->name }}" maxlength="50"> 
                </div>
                <div class="col-lg-12">
                  <label>Subject Code</label>
                  <input type="text" name="code" class="form-control" placeholder="Enter Location " maxlength="50" value="{{ $subjects->code }}"  > 
                </div>
                <div class="col-lg-12">
                  <label>Sorting Order No </label>
                  <input type="text" name="sorting_order_id" class="form-control" placeholder="Enter Location " maxlength="50" value="{{ $subjects->sorting_order_id }}"  > 
                </div>
                <div class="col-lg-12 text-center">
                  
                <input type="submit" class="btn btn-success text-center" value="Update" style="margin: 24px">
                </div>
              </div>
                
            </div>
                
             </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
