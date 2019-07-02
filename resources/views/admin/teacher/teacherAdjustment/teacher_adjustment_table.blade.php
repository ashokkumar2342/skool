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
				<tr>
					<td>{{ $teacherAbsent->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherAbsent->from_period or '' }}</td>
					<td>{{ $teacherAbsent->to_period or '' }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>