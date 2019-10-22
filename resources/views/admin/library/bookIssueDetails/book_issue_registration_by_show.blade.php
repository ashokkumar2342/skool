 	

 
<div class="col-lg-4">
	<label>Name</label>
	<input type="text" class="form-control" name="name" disabled="" value="{{ $memberShipRegistrationDetails->name or ''}}"> 
 </div>
 <div class="col-lg-4">
 	<label>Mobile No</label>
	<input type="text" class="form-control" name="mobile" disabled="" value="{{ $memberShipRegistrationDetails->mobile or '' }}"> 
 </div>
 <div class="col-lg-4">
 	<label>Email</label>
	<input type="text" class="form-control" name="email" disabled="" value="{{ $memberShipRegistrationDetails->email or ''}}"> 
 </div>
 <div class="col-lg-8">
 	<label>Address</label>
 	<textarea class="form-control" disabled="" name="name">{{ $memberShipRegistrationDetails->address or '' }}</textarea>
	  
 </div> 
 <button type="button" hidden id="btn_book_issue_history" style="float: right"  class="btn btn-info hidden" onclick="callAjax(this,'{{ route('admin.library.book.issue.history',$memberShipRegistrationDetails->id) }}','history_book_issue')">History</button>
  