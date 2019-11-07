<table class="table table-condensed table-responsive" id="result_datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Registration No</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No.</th>
			<th>E-mail ID</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($documents as $document)
				<tr>
					<td>{{ $document->Students->name or ''}}</td>
					<td>{{ $document->student_id or ''}}</td>
					<td>{{ $document->parents[0]->parentInfo->name or ''}}</td>
					<td>{{ $document->parents[1]->parentInfo->name  or ''}}</td>
					<td>{{ $document->addressDetails->address->primary_mobile or ''}}</td> 
					<td>{{ $document->addressDetails->address->primary_email or '' }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>