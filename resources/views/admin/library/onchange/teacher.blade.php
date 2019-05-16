<div id="library_member_ship_student_table">
   <div class="col-lg-4"> 
	<label>Name</label>
	<input type="text" class="form-control" name="name" value="{{ $teachers->name or '' }}">
	<input type="text" class="form-control hidden" hidden="" name="code" value="{{ $teachers->code }}">
   </div> 
    <div class="col-lg-4"> 
	<label>Mobile No</label>
	<input type="text" class="form-control" name="mobile" value="{{ $teachers->mobile or '' }}">
	</div>    
	<div class="col-lg-4"> 
	<label>Email</label>
	<input type="text" class="form-control" name="email" value="{{ $teachers->email or '' }}">
   </div>  
   <div class="col-lg-12"> 
	<label>Address</label>
	<textarea class="form-control" name="address">{{ $teachers->address or ''}}</textarea>
	 
   </div>  
      
  
</div>