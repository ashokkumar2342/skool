<table class="table" > 
	<thead>
		<tr>
			<th>name</th>
			<th>Father's Name</th>
			<th>Registration No</th>
			<th>Admission No</th>
			<th>Roll No</th>
			<th>Mobile No</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($students as $student) 
				<tr>
					<td>{{ $student->name or '' }}</td>
					<td>{{ $fatherDetail->name or '' }}</td>
					<td>{{ $student->registration_no or '' }}</td>
					<td>{{ $student->admission_no or '' }}</td>
					<td>{{ $student->roll_no or '' }}</td>
					<td>{{ $fatherDetail->mobile or '' }}</td>
					<td>{{ $student->email or '' }}</td>
					<td><button class="btn btn-info btn-xs" datatable-view="true" onclick="callPopupLarge(this,'{{ route('admin.student.remark.detail.add.btn',$student->id) }}')">Remark</button></td>
				</tr>
		@endforeach
	</tbody>
</table>