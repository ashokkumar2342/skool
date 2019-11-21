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
 
			 
		<tr>
			<td>{{ $SchoolDetail->name }}</td>
			<td>{{ $SchoolDetail->mobile }}</td>
			<td>{{ $SchoolDetail->contact }}</td>
			<td>{{ $SchoolDetail->logo }}</td>
		</tr>
		 
	</tbody>
</table>
<hr>
<div class="col-lg-12">
	{!! $SchoolDetail->report_header !!}
</div>