<div class="modal-dialog" style="width:40%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$IncomeTax->id?'Edit':'Add' }} Income Tax</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.it.slab.store',@$IncomeTax->id) }}" method="post" class="add_form" content-refresh="departments_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 form-group">
                <label>Income Tax</label>
                <input type="text" name="income_tax" class="form-control" placeholder="Enter Income Tax" maxlength="30" value="{{ @$IncomeTax->name }}">
            </div>
            <div class="col-lg-12 form-group">
                <label>Description</label>
                <textarea  name="description" class="form-control"  maxlength="200">{{ @$IncomeTax->description }}</textarea>
            </div> 
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





