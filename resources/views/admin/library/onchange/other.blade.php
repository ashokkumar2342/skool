<div id="library_member_ship_student_table">
   <div class="col-lg-4"> 
	<label>Name</label>
	<input type="text" class="form-control" name="name" value="{{ $others->name }}">
   </div>
   <input type="text" class="form-control hidden" hidden="" name="code" value="{{ $others->code }}">
   <div class="col-lg-4"> 
	<label>mobile No</label>
	<input type="text" class="form-control" name="mobile_no" value="{{ $others->mobile }}">
   </div>
   <div class="col-lg-4"> 
	<label>Email</label>
	<input type="text" class="form-control" name="email" value="{{ $others->email }}">
   </div>
   <div class="col-lg-12"> 
	<label>Address</label>
	<textarea class="form-control" name="address">{{ $others->address }}</textarea>
	 
   </div>
  
    
</div>