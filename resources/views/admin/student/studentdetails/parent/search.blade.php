
	 
<div class="row">
	<div class="col-lg-4" style="margin-left: 15px">
		<label>Mobile No</label><span class="fa fa-asterisk"></span> 
		<input type="text" name="mobile_no" class="form-control" required="required" placeholder="Enter Mobile No."maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> 
		<input type="hidden" name="relation_type_id" class="form-control" value="{{ $relation_type_id }}"> 
	</div>
	<div class="col-lg-4"> 
		<input type="submit" value="Search" class="btn btn-success" style="margin-top: 24px"> 
	</div>
	
</div>
 