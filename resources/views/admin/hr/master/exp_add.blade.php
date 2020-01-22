<div class="modal-dialog" style="width:50%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$experience->id?'Edit':'Add' }} Experience</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.experience.store',@$experience->id) }}" method="post" class="add_form" content-refresh="experience_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6 form-group">
                <label>Experience Name</label>
                <input type="text" name="experience_name" class="form-control" placeholder="Enter Experience Name" maxlength="50" value="{{ @$experience->name }}">
            </div>
            <div class="col-lg-6 form-group">
                <label>Experience Code</label>
                <input type="text" name="experience_code" class="form-control" placeholder="Enter Experience Code" maxlength="3"
                value="{{ @$experience->code }}"> 
            </div>
            <div class="col-lg-12 form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description (Max 200)" maxlength="200">{{@$experience->description }}</textarea>
            </div>
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





