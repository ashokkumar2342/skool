
<table class="table border table-striped table-bordered">
	 
	<thead>
		<tr>
			<th>name</th>
			<th>Registration No</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No</th>
			<th>E-mail ID</th>
			<th>Address</th>
			 
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $student->name }}</td>
			<td>{{ $student->registration_no }}</td>
			<td>{{ $student->parents[0]->parentInfo->name or '' }}</td>
			<td>{{ $student->parents[1]->parentInfo->name or '' }}</td>
			<td>{{ $student->addressDetails->address->primary_mobile or '' }}</td>
			<td>{{ $student->addressDetails->address->primary_email or '' }}</td>
			<td>{{ $student->addressDetails->address->p_address or ''}}</td>
		</tr>
	</tbody>
</table>
@include('admin.finance.feecollection.fee_detail_show')
 
 