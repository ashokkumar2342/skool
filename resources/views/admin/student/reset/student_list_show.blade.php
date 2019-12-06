
	<div class="col-lg-12">
		<table class="table"> 
			<thead>
				<tr>
					<th>Name</th>
					<th>Registration No.</th> 
					<th>Admission No.</th>
					<th>Date of Birth</th>
					<th>Roll No.</th>
					<th>New Roll No.</th>
				</tr>
			</thead>
			<tbody>
			@foreach($students as $key=>$student)
		   <tr> 
		     <td>{{ $student->name }}</td>
		     <td>{{ $student->registration_no }}</td>
		     <td> {{ $student->admission_no }} </td>
		     <td>{{ date('d-m-Y',strtotime($student->dob ))}}</td>
		     <td>{{ $student->roll_no }}</td>
		     <td><input type="text" value="{{ $key+1 }} "   name="roll_no[{{ $student->id }}]"></td>
		   </tr>
		   @endforeach
			</tbody>
		</table>
		<div class="text-center">
		 
		<input type="submit"  class="btn btn-success" value="Update">
		</div>
  </div>
 	
	 

 

 

