<table class="table"> 
	<thead>
		<tr>
			 <th>Name</th>
			<th>Father's Name</th>
			<th>Mobile No</th>
			<th>Registration No</th>
			<th>Admission</th>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
   <tr> 
    
     <td>{{ $student->name }}</td>
     <td>{{ $student->father_name }}</td>
     <td>{{ $student->father_mobile }}</td>
     <td>{{ $student->registration_no }}</td>
     <td> <input type="text" value="{{ $student->admission_no }}" name="admission_no[{{ $student->id }}]"></td>
        
   </tr>
   @endforeach
	</tbody>
</table>
<div class="text-center">
	<input type="submit"  class="btn btn-success" value="Update">
</div>
