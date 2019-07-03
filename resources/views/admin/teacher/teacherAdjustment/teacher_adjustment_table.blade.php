<table class="table"> 
	<thead>
		<tr>
			<th>Teacher Name</th>
			<th>From Period</th>
			<th>To period</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($teacherAbsents as $teacherAbsent)
				<tr>
					<td>{{ $teacherAbsent->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherAbsent->from_period or '' }}</td>
					<td>{{ $teacherAbsent->to_period or '' }}</td>
					<td><button type="button"class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.teacher.adjustment.result',$teacherAbsent->teacher_id) }}')" >Make Adjustment</button>

						 

				</tr> 
		@endforeach
	</tbody>
</table>