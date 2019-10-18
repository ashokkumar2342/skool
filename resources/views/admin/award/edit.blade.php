  
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
        <h4 class="modal-title">Award Edit</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.award.update',$AwardType->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-3">
                      <label>Award Name</label>
                      <input type="text" name="award_name" class="form-control" placeholder="" maxlength="150" required="" value="{{ $AwardType->award_name }}"> 
                    </div> 
                    <div class="form-group   col-lg-3">
                      <label>Rank Position</label>
                      <input type="mubber" name="rank_position" class="form-control" maxlength="4" required="" value="{{ $AwardType->rank_position }}"> 
                    </div>
                    <div class="form-group   col-lg-3">
                      <label>Award Date</label>
                      <input type="date" name="award_date" class="form-control" required="" value="{{ $AwardType->award_date }}"> 
                    </div>
                    <div class="form-group   col-lg-3">
                      <label>Last Date</label>
                      <input type="date" name="last_date" class="form-control" required="" value="{{ $AwardType->last_date }}"> 
                    </div> 
                    <div class="form-group   col-lg-12">
                      <label>Description</label>
                      <textarea class="textarea" name="description" placeholder="description"
                            style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" maxlength="200">{{ $AwardType->description }}</textarea> 
                    </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Update" class="btn btn-success">
                    </div> 
                   </div> 
              </form> 
         
        </div>
      </div>
    </div>

     
    <!-- /.content -->

 
