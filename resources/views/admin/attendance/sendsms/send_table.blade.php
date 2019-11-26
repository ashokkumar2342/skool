	 
	<button type="button" class="btn btn-sm btn-primary pull-right" style="margin:5px">Reminder</button>
	<button type="submit" class="btn btn-sm btn-info pull-right" style="margin:5px">Send Sms</button>
<table class="table table-striped table-bordered table-condensed table-responsive table-hover" id="send_sms_table">
	<thead>
		<tr>
			<th>Class</th>
			<th>Section</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($attendanceClass as $attendanceClas) 
				<tr style="{{ $attendanceClas->sms_sent==1?'background-color: #61e66b' : 'background-color: #f8af3b' }}">
					<td>{{ $attendanceClas->classes->name or '' }}</td>
					<input type="hidden" name="class_id[]" value=" {{ $attendanceClas->class_id }} ">
					<input type="hidden" name="section_id[]" value="{{ $attendanceClas->section_id }}">
					<td>{{ $attendanceClas->sectionTypes->name or '' }}</td>
				</tr> 
		@endforeach
	</tbody>
</table> 
 