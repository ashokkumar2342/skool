<div id="library_member_ship_student_table">
   <div class="col-lg-4"> 
	<label>Name</label>
	<input type="text" class="form-control" name="name" value="{{ $students->name }}">
   </div> 

  <input type="text" class="form-control hidden" hidden="" name="registration_no" value="{{ $students->registration_no }}">
   
    <div class="col-lg-4"> 
	<label>Father's Name</label>
	<input type="text" class="form-control" name="father_name" value="{{ $students->father_name }}">
   </div>  
   <div class="col-lg-4"> 
	<label>Father;s Mobile</label>
	<input type="text" class="form-control" name="father_mobile" value="{{ $students->father_mobile }}">
   </div> 
    <div class="col-lg-4"> 
	<label>Email</label>
	<input type="text" class="form-control" name="email" value="{{ $students->email }}">
   </div> 
   <div class="col-lg-8">
   	<label>Address</label>
   <textarea  class="form-control" name="address">{{ $students->c_address }}</textarea> 
	 
   </div> 
</div>