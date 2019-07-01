<table class="table" id="data_table"> 
	<thead>
		<tr>
			<th>Teacher Name</th>
			<th>Days</th>
			<th>Class</th>
			<th>Subject</th>
			<th>Period</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($manualTimeTabls as $manualTimeTabl)
				<tr>
					<td>{{ $manualTimeTabl->teacherFaculty->name or ''}}</td>
					<td>{{ $manualTimeTabl->dayType->name or ''}}</td>
					<td>{{ $manualTimeTabl->classTypes->name or ''}}</td>
					<td>{{ $manualTimeTabl->subjectType->name or '' }}</td>
					<td>{{ $manualTimeTabl->periodTiming->from_time or '' }}</td>
					 
				</tr> 
		@endforeach
	</tbody>
</table>