<table class="table"> 
	<thead>
		<tr>
			 <th>Name</th> 
			<th>Registration No.</th>
			<th>Date of Birth</th>
			<th>Admission No.</th>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
   <tr> 
    
     <td>{{ $student->name }}</td> 
     <td>{{ $student->registration_no }}</td>
     <td>{{date('d-m-Y',strtotime( $student->dob ))}}</td>
     <td> <input type="text" value="{{ $student->admission_no }}" name="admission_no[{{ $student->id }}]"></td>
        
   </tr>
   @endforeach
	</tbody>
</table>
<div class="text-center">
	<input type="submit"  class="btn btn-success" value="Update">
</div>
