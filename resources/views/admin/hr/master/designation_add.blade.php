<div class="modal-dialog" style="width:50%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$designation->id?'Edit':'Add' }} Designation</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.designation.store',@$designation->id) }}" method="post" class="add_form" content-refresh="designation_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6 form-group">
                <label>Designation Name</label>
                <input type="text" name="designation_name" class="form-control" placeholder="Enter Designation Name" maxlength="50" value="{{ @$designation->name }}">
            </div>
            <div class="col-lg-6 form-group">
                <label>Designation Code</label>
                <input type="text" name="designation_code" class="form-control" placeholder="Enter Designation Code" maxlength="3"
                value="{{ @$designation->code }}"> 
            </div> 
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





