
@foreach ($students as $student)
	<tr>
	<td>{{ ++$loop->index }}</td>
	 
    
     <input type="hidden" name="class_test_id[]" value="{{ $classTest->id }} ">
     <input type="hidden" name="student_id[]" value="{{ $student->id }} ">
    <td>{{ $student->name }}</td>
    <td>{{ $student->registration_no   }}</td>
    <td><input type="text" name="marks_obt[]"></td>
    <td><input type="text" name="any_remarks[]"></td>
    
      
	</tr>  	 
@endforeach	
 