  
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
        <h4 class="modal-title">{{ @$category->id? 'Edit' : 'Add' }} Category</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.category.store',@$category->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close" content-refresh="category_dataTable">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="col-lg-6">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{ @$category->name }}" maxlength="50"> 
                      </div>
                      <div class="col-lg-6">
                        <label>Category Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter Category Code" value="{{ @$category->code }}" maxlength="2"> 
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

 