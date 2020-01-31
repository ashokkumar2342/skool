<div class="modal-dialog" style="width:40%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$allowance->id?'Edit':'Add' }} Allowance</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.allowance.store',@$allowance->id) }}" method="post" class="add_form" content-refresh="departments_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 form-group">
                <label>Allowance</label>
                <input type="text" name="allowance" class="form-control" placeholder="Enter Allowance" maxlength="30" value="{{ @$allowance->allowance }}">
            </div>
            <div class="col-lg-12 form-group">
                <label>Description</label>
                <textarea  name="description" class="form-control"  maxlength="200">{{ @$allowance->description }}</textarea>
            </div> 
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





