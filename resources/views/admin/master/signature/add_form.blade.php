  
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
        <h4 class="modal-title">Signature Stamp Add</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.signature.stamp.store') }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="col-lg-6">
                        <label>Certificate Type</label>
                        <select name="certificate_type_id" class="form-control">
                          <option  selected disabled>Select Certificate</option> 
                          <option value="2">School Leaving Certificate</option> 
                          <option value="3">Character Certificate</option> 
                          <option value="4">Date of Birth Certificate</option> 
                        </select> 
                      </div>
                      <div class="col-lg-6">
                        <label>User Name</label>
                        <select name="user_id" class="form-control">
                          <option selected disabled>Select User</option>
                          @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->first_name }}</option>
                           @endforeach 
                        </select> 
                      </div>
                      <div class="col-lg-6">
                        <label>Signature</label>
                        <input type="file" name="signature" class="form-control"> 
                      </div>
                      <div class="col-lg-6">
                        <label>Stamp</label>
                        <input type="file" name="stamp" class="form-control"> 
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

 
