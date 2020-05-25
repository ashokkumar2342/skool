<div class="modal-dialog"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">{{ @$Employee->id?'Edit':'Add' }} Bank Details</h4>
</div>
<div class="modal-body">
<form action="{{ route('admin.finance.bank.detail.store') }}" method="post" class="add_form" content-refresh="school_bank_detail_data_table" button-click="btn_close,btn_bank_details_show">
{{ csrf_field() }}
<div class="row">
<div class="col-lg-6 form-group">
<label>Bank Name</label>
<span class="fa fa-asterisk"></span>
<select name="bank_id" class="form-control">
<option selected disabled>Select Bank</option>
@foreach ($banks as $bank)
<option value="{{ $bank->id }}">{{ $bank->name }}</option>      
@endforeach 
</select> 
</div>
<div class="col-lg-6 form-group">
<label>IFSC Code</label>
<span class="fa fa-asterisk"></span>
<input type="text" name="ifsc_code" class="form-control" maxlength="12"> 
</div>
<div class="col-lg-6 form-group">
<label>Account No.</label>
<span class="fa fa-asterisk"></span>
<input type="text" name="account_no" class="form-control" maxlength="20" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
</div>
<div class="col-lg-6 form-group">
<label>Account Name</label>
<span class="fa fa-asterisk"></span>
<input type="text" name="account_name" class="form-control" maxlength="100"> 
</div>
<div class="col-lg-6 form-group">
<label>Contact No.</label>
<span class="fa fa-asterisk"></span>
<input type="text" name="contact_no" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
</div>
<div class="col-lg-6 form-group">
<label>Email</label>
<span class="fa fa-asterisk"></span>
<input type="email" name="email" class="form-control" maxlength="100"> 
</div>
<div class="col-lg-6 form-group">
<label>Contact Person Name</label>
<input type="text" name="contact_person_name" class="form-control" maxlength="100"> 
</div>
<div class="col-lg-6 form-group">
<label>Branch</label>
<input type="text" name="branch" class="form-control" maxlength="50"> 
</div>
<div class="col-lg-12 form-group">
<label>Address</label>
<textarea name="bank_address" class="form-control"></textarea>
</div>
<div class="col-lg-12 form-group text-center">
    <input type="submit" class="btn btn-success">
</div>
</div>
</form> 
</div>
</div>
</div>





