<table class="table"> 
	<thead>
		<tr>
			<th>Registration No</th>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($parentsRejects as $parentsReject)
		<tr>
			<td>{{ $parentsReject->registration_no }}</td>
			<td>{{ $parentsReject->name }}</td>
			<td>{{ $parentsReject->father_name }}</td>
			<td>{{ $parentsReject->mother_name }}</td>
			<td>   {{ $parentsReject->mobile }}</td>
			 
			<td>  

			</td>
		</tr> 
		@endforeach
		

	</tbody>-
</table>
