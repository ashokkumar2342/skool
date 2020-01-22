<div class="modal-dialog" style="width:50%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$departments->id?'Edit':'Add' }} Department</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.department.store',@$departments->id) }}" method="post" class="add_form" content-refresh="departments_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6 form-group">
                <label>Department Name</label>
                <input type="text" name="department_name" class="form-control" placeholder="Enter Department Name" maxlength="50" value="{{ @$departments->name }}">
            </div>
            <div class="col-lg-6 form-group">
                <label>Department Code</label>
                <input type="text" name="department_code" class="form-control" placeholder="Enter Department Code" maxlength="3"
                value="{{ @$departments->code }}"> 
            </div>
            <div class="col-lg-12 form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description (Max 200)" maxlength="200">{{@$departments->description }}</textarea>
            </div>
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





