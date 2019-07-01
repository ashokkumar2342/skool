<label>Period</label>
<select name="period" class="form-control">
			<option selected disabled>Select Period</option> 
			@foreach ($TeacherWorkingDays as $TeacherWorkingDay)
				 <option value="{{ $TeacherWorkingDay->period_timeing_id }}">{{ $TeacherWorkingDay->periodTiming->from_time or '' }}</option> 
			@endforeach
		</select>  