<table class="table table-responsive table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No.</th>
			<th>E-mail ID</th> 
		</tr>
	</thead>
	<tbody> 
		<tr>
			<td>{{ $student->name }}</td>
			<td>{{ $student->parents[0]->parentInfo->name or ''}}</td>
			<td>{{ $student->parents[1]->parentInfo->name or ''}}</td>
			<td>{{ $student->addressDetails->address->primary_mobile or '' }}</td>
			<td>{{ $student->addressDetails->address->primary_email or '' }}</td> 
		</tr> 
	</tbody>
</table>
<button class="btn btn-info" id="btn_medical_form" onclick="callPopupLarge(this,'{{ route('admin.medical.info.add.form',$student->id) }}')">Medical Form</button>