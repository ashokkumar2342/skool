<table class="table table-responsive" id="quotes_dataTable"> 
	<thead>
		<tr>
			<th>School Code</th>
			<th>School Name</th>
			<th>School URL</th>
			<th>Form Date</th>
			<th>To Date</th>
			<th>User Id</th>
			<th>Password</th>
			<th>Person Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($schoolDominos as $schoolDomino)
			 
		<tr>
			<td>{{ $schoolDomino->school_code }}</td>
			<td>{{ $schoolDomino->school_name }}</td>
			<td>{{ $schoolDomino->school_url }}</td>
			<td>{{ $schoolDomino->from_date }}</td>
			<td>{{ $schoolDomino->to_date }}</td>
			<td>{{ $schoolDomino->user_id }}</td>
			<td>{{ $schoolDomino->password }}</td>
			<td>{{ $schoolDomino->person_name }}</td>
			<td>{{ $schoolDomino->mobile }}</td>
			<td>{{ $schoolDomino->email }}</td>
			<td>{{ $schoolDomino->address }}</td>
			 
			<td>
				<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.school.dominos.edit',$schoolDomino->id) }}')"><i class="fa fa-edit"></i></a> 

				<a href="{{ route('admin.school.dominos.delete',$schoolDomino->id) }}" title="Edit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>