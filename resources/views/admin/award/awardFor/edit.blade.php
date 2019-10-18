  
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
        <h4 class="modal-title">Award For Edit</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.award.for.update',$awardfors->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="form-group   col-lg-4">
                      <label>Award Name</label>
                      <select name="award_name" class="form-control select2">
                        <option selected disabled>Select Award Name</option>
                        @foreach ($awardTypes as $awardType)
                        <option value="{{ $awardType->id }}"{{ $awardfors->award_id==$awardType->id? 'selected' : '' }}>{{ $awardType->award_name }}</option> 
                        @endforeach 
                      </select>
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Student Name</label>
                      <select name="student_name" class="form-control select2">
                        <option selected disabled>Select Name</option>
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}"{{ $awardfors->student_id==$student->id? 'selected' : '' }}>{{ $student->name }}</option> 
                        @endforeach 
                      </select>
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Rank Position</label>
                      <input type="mubber" name="rank_position" class="form-control" maxlength="4" required="" value="{{ $awardfors->rank_position }}"> 
                    </div> 
                    <div class="form-group   col-lg-12">
                      <label>Description</label>
                      <textarea class="textarea" name="description" placeholder="description"
                            style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" maxlength="200">{{ $awardfors->description }}</textarea> 
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

 
