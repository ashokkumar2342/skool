

<table class="table"> 
	<thead>
		<tr>
			<th>Teacher Name</th>
			<th>From Period</th>
			<th>To period</th>
			 
		</tr>
	</thead>
	<tbody>
		 
		@foreach ($teacherAbsents as $teacherAbsent)
		 <input type="hidden" name="teacher_id[]" value="{{ $teacherAbsent->teacher_id }}">
				<tr>
					<td>{{ $teacherAbsent->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherAbsent->periodTiming->from_time or '' }}</td>
					<td>{{ $teacherAbsent->periodTimings->from_time or '' }}</td>
					 
				</tr> 

		@endforeach 
	</tbody>
</table>
<div class="col-lg-10 text-center">
	
<button type="submit"class="btn  btn-primary" style="margin-right: 25px">Make Adjustment</button>
</div>
</form>