<table class="table table-striped">
	<thead>
		<tr>
			<th>Academic Year</th>
			<th>Ondate</th>
			<th>Teacher Name</th>
			<th>Student Name</th>
			<th>Subject</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($teacherRemarks as $teacherRemark)
				<tr>
					<td>{{ $teacherRemark->academicYears->name or '' }}</td>
					<td>{{ date('d-m-Y',strtotime($teacherRemark->ondate)) }}</td>
					<td>{{ $teacherRemark->admins->first_name or '' }}</td>
					<td>{{ $teacherRemark->students->name or '' }}</td>
					<td>{{ $teacherRemark->subjects->name or '' }}</td>
					<td>{{ $teacherRemark->remark }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>