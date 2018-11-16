@foreach ($students as $student)
	<tr>
	<td>{{ ++$loop->index }}</td>
	 
    
     <input type="hidden" name="exam_schedule_id[]" value="{{ $examSchedule->id }} ">
     <input type="hidden" name="student_id[]" value="{{ $student->id }} ">
    <td>{{ $student->name }}</td>
    <td>{{ $student->registration_no   }}</td>
    <td><input type="text" name="marksobt[]" value="{{ $marksDetails->where('student_id',$student->id)->first()->marksobt or '' }}"></td>
    <td><input type="text" name="any_remarks[]" value="{{ $marksDetails->where('student_id',$student->id)->first()->any_remarks or '' }}"></td>
    
      
	</tr>  	 
@endforeach	
 