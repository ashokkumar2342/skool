<table class="table" id="teacher_data_table_show"> 
	<thead>
		<tr>
			<th>Code</th>
			<th>Name</th>
			<th>Father/husband</th>
			<th>Relation</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Date Of Birth</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($teacherFacultys as $teacherFaculty)
					<tr>
						<td>{{  $teacherFaculty->registration_no }}</td>
						<td>{{  $teacherFaculty->name }}</td>
						<td>{{  $teacherFaculty->father_name }}</td>
						<td>{{  $teacherFaculty->relation_name }}</td>
						<td>{{  $teacherFaculty->father_mobile }}</td>
						<td>{{  $teacherFaculty->email }}</td>
						<td>{{  $teacherFaculty->dob }}</td>
						<td>{{  $teacherFaculty->c_address }}</td>
						<td><button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.teacher.details.edit',Crypt::encrypt($teacherFaculty->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.teacher.details.delete',Crypt::encrypt($teacherFaculty->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr> 
		@endforeach
	</tbody>
</table>