<table class="table"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Mobile No</th>
			<th>Contact No</th>
			<th>Logo</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($SchoolDetails as $SchoolDetail)
			 
		<tr>
			<td>{{ $SchoolDetail->name }}</td>
			<td>{{ $SchoolDetail->mobile }}</td>
			<td>{{ $SchoolDetail->contact }}</td>
			<td>{{ $SchoolDetail->logo }}</td>
		</tr>
		@endforeach
	</tbody>
</table>