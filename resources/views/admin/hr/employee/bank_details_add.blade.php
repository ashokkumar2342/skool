<div class="modal-dialog" style="width:90%"> 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body"> 
      <form action="{{ route('admin.hr.bank.details.store') }}" method="post" class="add_form" button-click="btn_close">
        {{ csrf_field() }} 
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 20px">Employee Bank Details</div>
                    <div class="panel-body">
                    <div class="row">
                  <div class="col-lg-4 form-group">
                    <label>Designation</label>
                    <select name="designation_id" class="form-control" onchange="callAjax(this,'{{ route('admin.hr.designation.wise.employee') }}','select_employee_name')">
                       <option selected disabled>Select Designation</option> 
                       @foreach ($Designations as $Designation)
                        <option value="{{ $Designation->id }}">{{ $Designation->name }}</option>  
                       @endforeach
                    </select> 
                  </div>
                  <div class="col-lg-4 form-group">
                    <label>Employee Name</label>
                    <select name="employee_id" class="form-control" id="select_employee_name">
                       <option selected disabled>Select Employee</option> 
                    </select> 
                  </div>
                  <div class="col-lg-4 form-group">
                    <label>Bank Name</label>
                    <select name="bank_id" class="form-control">
                       <option selected disabled>Select Bank</option>
                       @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>      
                        @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-4 form-group">
                    <label>IFSC Code</label>
                    <input type="text" name="ifsc_code" class="form-control" maxlength="50"> 
                   </div>
                   <div class="col-lg-4 form-group">
                    <label>Account No.</label>
                    <input type="text" name="account_no" class="form-control" maxlength="50"> 
                   </div>
                   <div class="col-lg-4 form-group">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control" maxlength="50"> 
                   </div>
                   <div class="col-lg-6 form-group">
                    <label>Bank Address</label>
                    <input type="text" name="bank_address" class="form-control" maxlength="200"> 
                   </div> 
                   <div class="col-lg-6 form-group">
                    <label>DD Payable Address</label>
                    <input type="text" name="dd_payable_address" class="form-control" maxlength="200"> 
                   </div> 
                </div>  
                    </div>
                </div> 
                <div class="col-lg-12 text-center form-group"> 
                    <input type="submit"  class="btn btn-success" style="margin-top: 20px"> 
                </div> 
        </form>
     </div>
   </div>
</div>





