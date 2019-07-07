@foreach ($students as $student)
	  
	<tr onclick="studentDetail({{ $student->id }})">
		<td>{{ $student->id }}</td>
		<td>{{ $student->name }}</td>
		<td>{{ $student->registration_no }}</td>
		<td>{{ $student->father_name }}</td>
		<td>{{ $student->mother_name }}</td>
		<td> <button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button> </td>
	</tr>
@endforeach