@foreach ($students as $student)
	  
	<tr onclick="studentDetail({{ $student->id }})">
		 
		<td>{{ $student->name }}</td>
		<td>{{ $student->registration_no }}</td>
		<td>{{ $student->f_name }}</td>
		<td>{{ $student->primary_mobile }}</td>
		<td> <button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button> </td>
	</tr>
@endforeach