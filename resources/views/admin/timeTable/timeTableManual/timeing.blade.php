<label>Period</label>
<select name="period" class="form-control">
			<option selected disabled>Select Period</option> 
			@foreach ($TeacherWorkingDays as $TeacherWorkingDay)
			@if (in_array($TeacherWorkingDay->period_timeing_id,$manualTimeTabl))

			 @else
				 <option value="{{ $TeacherWorkingDay->period_timeing_id }}">{{ $TeacherWorkingDay->periodTiming->from_time or '' }}</option> 
			@endif
			@endforeach
		</select>  