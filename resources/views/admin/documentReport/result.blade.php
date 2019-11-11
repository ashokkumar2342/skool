<table class="table table-condensed table-responsive" id="result_datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Registration No</th>
			<th>Admission No</th>
			<th>Class</th>
			<th>Section</th>
			<th>Date of Birth</th>
			<th>Mobile No.</th>
			<th>E-mail ID</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($documents as $document)
				<tr>
					<td>{{ $document->Students->name or ''}}</td>
					<td>{{ $document->Students->registration_no or ''}}</td>
					<td>{{ $document->Students->admission_no or ''}}</td>
					<td>{{ $document->Students->classes->name or ''}}</td>
					<td>{{ $document->Students->sectionTypes->name or ''}}</td>
					<td>{{ $document->Students->dob !=null?date('d-m-Y',strtotime($document->Students->dob)):''}}</td>
					<td>{{ $document->Students->addressDetails->address->primary_mobile or ''}}</td> 
					<td>{{ $document->Students->addressDetails->address->primary_email or '' }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>