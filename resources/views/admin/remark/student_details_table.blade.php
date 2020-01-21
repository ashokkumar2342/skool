<table class="table" > 
	<thead>
		<tr>
			<th>name</th>
			<th>Registration No.</th>
			<th>Admission No.</th> 
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No.</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($students as $student)
		<tr>
			<td>{{ $student->name }}</td>
			<td>{{ $student->registration_no }}</td> 
			<td>{{ $student->admission_no }}</td> 
			<td>{{ $student->parents[0]->parentInfo->name or '' }}</td>
			<td>{{ $student->parents[1]->parentInfo->name or '' }}</td>
			<td>{{ $student->addressDetails->address->primary_mobile or ''}}</td>
			<td>{{ $student->addressDetails->address->primary_email or '' }}</td>
			<td><button class="btn btn-info btn-xs" datatable-view="true" onclick="callPopupLarge(this,'{{ route('admin.student.remark.detail.add.btn',$student->id) }}')">Remark</button></td>
		</tr> 
		@endforeach
	</tbody>
</table>