
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ @$completion->id? 'Edit' : 'Add' }} Blood Group</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.bloodgroup.store',@$completion->id) }}" method="post" class="add_form" button-click="btn_event_type_table_show,btn_close" content-refresh="category_dataTable">
                   {{ csrf_field() }}
                    <div class="row"> 
                      <div class="col-lg-12">
                        <label>Blood Group Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Blood Group Name" value="{{ @$completion->name }}" maxlength="10"> 
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

 
