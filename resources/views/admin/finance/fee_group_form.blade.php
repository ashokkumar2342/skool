  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$feeGroups->id?'Edit' : 'Add' }} Fee Group</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.feeGroup.post',@$feeGroups->id) }}" method="post" class="add_form" button-click="btn_close" content-refresh="fee_group_table">
                   {{ csrf_field() }}
                   <div class="form-group">
                    <label>Fee Group Name</label>
                    <span class="fa fa-asterisk"></span>
                                     {{ Form::text('name',@$feeGroups->name,['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee Group name','maxlength'=>'30']) }}
                                      
                                     <p class="errorName text-center alert alert-danger hidden"></p>
                                   </div> 
                                   <label>Description</label>     
                                    <div class="form-group">
                                      {{ Form::textarea('description',@$feeGroups->description,['class'=>'form-control','id'=>'edit_description','rows'=>1, 'placeholder'=>'Enter Description','maxlength'=>'100']) }}
                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
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

 
