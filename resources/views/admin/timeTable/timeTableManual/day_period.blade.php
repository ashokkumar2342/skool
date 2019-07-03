<div class="col-lg-4">
		<label>Days</label>
		<select name="day" class="form-control" onchange="callAjax(this,'{{ route('admin.time.table.manual.day.wise.period') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val()+'&teacher_id='+$('#teacher_id').val(),'day_wise_period')">
			<option selected disabled>Select Days</option> 
			@foreach ($TeacherWorkingDays as $TeacherWorkingDay)
				 <option value="{{ $TeacherWorkingDay->days_id }}">{{ $TeacherWorkingDay->dayType->name or ''}}</option> 
			@endforeach
			 
		</select> 
	</div>
	<div class="col-lg-4"id="day_wise_period">
		<label>Period</label>
		 <select name="" class="form-control">
		 	 
		 </select>
	</div>