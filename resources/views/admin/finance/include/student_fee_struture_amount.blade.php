<div class="col-md-12 form-group">
<label>Amount</label>
<input type="text" name="amount" class="form-control" value="{{ $FeeStructureAmount->amount }}" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
</div>
<div class="col-lg-12 form-group">
<label>Concession</label>
<select name="concession" class="form-control" onchange="callAjax(this,'{{ route('admin.concession.search') }}'+'?fee_structure='+$('#fee_structure').val()+'&academic_year_id='+$('#academic_year_id').val(),'concession_amount')">
  <option value="0">No concession</option>
  @foreach ($concessions as $concession)
     <option value="{{ $concession->id }}">{{ $concession->name }}</option>
  @endforeach
</select> 
</div>
<div id="concession_amount">
 
</div>