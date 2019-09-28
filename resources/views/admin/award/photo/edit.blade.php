  
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
        <h4 class="modal-title">Award Photo Edit</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.award.photo.update',$awardPhotos->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-lg-12">
                      <label>Award Name</label>
                      <select name="award_name" class="form-control select2">
                        <option selected disabled>Select Award Name</option>
                        @foreach ($awardTypes as $awardType)
                        <option value="{{ $awardType->id }}"{{ $awardPhotos->award_id==$awardType->id? 'selected' : '' }}>{{ $awardType->award_name }}</option> 
                        @endforeach 
                      </select>
                    </div> 
                     
                    <div class="col-lg-12" style="margin-top: 20px">
                      <label>Photo</label>
                      <input type="file" name="image" class="form-control"> 
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

 
