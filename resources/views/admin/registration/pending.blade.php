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
		@foreach ($parentsPendings as $parentsPending)
		@if ($parentsPending->active_status==2) 
		
		<tr>
			<td>{{ $parentsPending->registration_no or '' }}</td>
			<td>{{ $parentsPending->name or '' }}</td>
			<td>{{ $parentsPending->father_name or '' }}</td>
			<td>{{ $parentsPending->mother_name or ''}}</td>
			<td>   {{ $parentsPending->mobile or '' }}</td>
			<td>  
			</td>
		</tr> 
		@endif
		@endforeach
		

	</tbody>-
</table>
