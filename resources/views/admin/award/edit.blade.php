  
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
             <form action="{{ route('admin.award.update',$award->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Registration No</label>
                      <select name="registration_no" class="form-control select2">
                        <option selected disabled>Select Registration No</option> 
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}"{{ $student->id==$award->registration_no? 'selected' : '' }}>{{ $student->registration_no }}</option>  
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-6">
                      <label>Award Name</label>
                      <input type="text" name="award_name" class="form-control" placeholder="" maxlength="100" value="{{ $award->award_name }}"> 
                    </div> 
                    <div class="col-lg-8">
                      <label>Description</label>
                      <textarea class="textarea" name="description" placeholder="description"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $award->description }}</textarea>
                       
                    </div>
                    <div class="col-lg-4" style="margin-top: 30px">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"> 
                   </div> 
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

 
