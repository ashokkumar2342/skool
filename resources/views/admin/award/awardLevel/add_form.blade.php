  
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
        <h4 class="modal-title">{{ @$awardLevel?'Edit' : 'Add' }} Award Level </h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.award.level.store',@$awardLevel->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-6">
                      <label>Award Level Name</label>
                      <input type="text" name="award_level" class="form-control" placeholder="" maxlength="50" required="" value="{{ @$awardLevel->name }}"> 
                    </div>
                    <div class="form-group   col-lg-6">
                      <label>Award Level Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" maxlength="5" required="" value="{{ @$awardLevel->code }}"> 
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

 
