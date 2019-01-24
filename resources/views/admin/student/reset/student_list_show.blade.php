<table class="table"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Admissin</th>
			<th>Registration No</th>
			<th>Roll No</th>
		</tr>
	</thead>
	<tbody>
		 @foreach($students as $student)
   <tr> 
     <td>{{ $student->name }}</td>
     <td>{{ $student->father_name }}</td>
     <td> {{ $student->admission_no }} </td>
     <td>{{ $student->registration_no }}</td>
     <td><input type="text" value="{{ $student->roll_no }}" name="roll_no[{{ $student->id }}]"></td>
   </tr>
   @endforeach
	</tbody>
</table>
<div class="text-center">
	<input type="submit"  class="btn btn-success" value="Update">
	</div>