  
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
        <h4 class="modal-title">Award Add</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.award.store') }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-6">
                      <label>Registration No</label>
                      <select name="registration_no" class="form-control select2">
                        <option selected disabled>Select Registration No</option> 
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->registration_no }}</option>  
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-6">
                      <label>Award Name</label>
                      <input type="text" name="award_name" class="form-control" placeholder="" maxlength="100"> 
                    </div> 
                    <div class="col-lg-12">
                      <label>Description</label>
                      <textarea class="textarea" name="description" placeholder="description"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                       
                    </div> 
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

 
