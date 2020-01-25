<div class="modal-dialog" style="width:50%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">{{ @$Bank->id?'Edit':'Add' }} Bank</h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.master.bank.store',@$Bank->id) }}" method="post" class="add_form" content-refresh="departments_table" button-click="btn_close">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6 form-group">
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="50" value="{{ @$Bank->name }}">
            </div>
            <div class="col-lg-6 form-group">
                <label>Bank Code</label>
                <input type="text" name="bank_code" class="form-control" placeholder="Enter Bank Code" maxlength="3"
                value="{{ @$Bank->code }}"> 
            </div>
            {{-- <div class="col-lg-12 form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description (Max 200)" maxlength="200">{{@$Bank->description }}</textarea>
            </div> --}}
            <div class="col-lg-12 form-group text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 20px">
            </div> 
         </div> 
      </form> 
    </div>  
  </div> 
</div>





