<div class="col-lg-4">
<label>Teacher</label>
<select name="teacher_id" class="form-control" onchange="callAjax(this,'{{ route('admin.time.table.teacher.for') }}','teacher_for')">
	<option selected disabled>Select Option</option>
	<option value="1">All Teacher</option>
	<option value="2">Teacher Wise</option> 
</select>
</div>
<div id="teacher_for">
	
</div>