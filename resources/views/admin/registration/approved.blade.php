<table class="table"> 
	<thead>
		<tr>
			<th>Registration No</th>
			<th>Name</th>
			<th>Class</th> 
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Mobile No</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($parentsApproveds as $parentsApproved)
		<tr>
			<td>{{ $parentsApproved->registration_no }}</td>
			<td>{{ $parentsApproved->name }}</td>
			<td>{{ $parentsApproved->classes->name or ''}}</td> 
			<td>{{ $parentsApproved->father_name }}</td>
			<td>{{ $parentsApproved->mother_name }}</td>
			<td>   {{ $parentsApproved->mobile }}</td>
			<td>   <button onclick="callPopupMd(this,'{{ route('admin.registration.allowadmission',$parentsApproved->id) }}')" class="btn_edit btn btn-success btn-xs">Allow Admission</button>

			</td>
		</tr> 
		@endforeach
		

	</tbody>-
</table>
