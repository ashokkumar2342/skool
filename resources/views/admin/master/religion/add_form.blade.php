
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$religion->id? 'Edit' : 'Add' }} Religion</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.religion.store',@$religion->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close" content-refresh="religion_dataTable">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="col-lg-6 form-group">
                        <label>Religion Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Religion Name" value="{{ @$religion->name }}" maxlength="50"> 
                      </div>
                      <div class="col-lg-6 form-group">
                        <label>Religion Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter Religion Code" value="{{ @$religion->code }}" maxlength="2"> 
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

 
