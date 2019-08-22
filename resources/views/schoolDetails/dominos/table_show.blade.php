<table class="table" id="quotes_dataTable"> 
	<thead>
		<tr>
			<th>School Code</th>
			<th>School Name</th>
			<th>School URL</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($schoolDominos as $schoolDomino)
			 
		<tr>
			<td>{{ $schoolDomino->school_code }}</td>
			<td>{{ $schoolDomino->school_name }}</td>
			<td>{{ $schoolDomino->school_url }}</td>
			 
			<td>
				<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.school.dominos.edit',$schoolDomino->id) }}')"><i class="fa fa-edit"></i></a> 

				<a href="{{ route('admin.school.dominos.delete',$schoolDomino->id) }}" title="Edit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>