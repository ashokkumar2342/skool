 
	<div class="col-lg-4"> 
	
	<label>Teacher</label>
	<select name="teacher" class="form-control" id="teacher_id" onchange="callAjax(this,'{{ route('admin.time.table.manual.teacher.wise.day.period') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val(),'teacher_wise_day_period')">
	           <option selected disabled>Select Teacher</option> 
				@foreach ($teacherSubjectClasss as $teacherSubjectClasss)
					 <option value="{{ $teacherSubjectClasss->teacher_id }}">{{ $teacherSubjectClasss->teacherFaculty->name }}</option> 
				@endforeach
	</select>
</div>
<div id="teacher_wise_day_period">
</div>	
 	