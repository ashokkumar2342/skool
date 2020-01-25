<div class="modal-dialog" style="width:50%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$payhead->id?'Edit':'Add' }} Pay Head Type</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.payhead.store',@$payhead->id) }}" method="post" class="add_form" content-refresh="groups_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6 form-group">
                <label>Pay Head Type</label>
                <input type="text" name="Pay_head_type" class="form-control" placeholder="Enter Pay Head Type" maxlength="50" value="{{ @$payhead->name }}">
            </div>
            <div class="col-lg-6 form-group">
                <label>Code</label>
                <input type="text" name="code" class="form-control" placeholder="Enter Code" maxlength="3"
                value="{{ @$payhead->code }}"> 
            </div>
            <div class="col-lg-12 form-group">
              <label>Addition/Deduction</label>
                <select name="addition_deduction" class="form-control">
                  <option value="1">Addition</option>
                  <option value="0">Deduction</option>
                  
                </select>
            </div>
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





