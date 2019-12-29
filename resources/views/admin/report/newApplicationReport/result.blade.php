<table class="table" id="student_new_admission_table_id"> 
	<thead>
		<tr>
			<th>Application No.</th>
			<th>Student Name</th> 
			<th>Status</th>
			 
		</tr>
	</thead>
	<tbody>
		@foreach ($students as $student)
		          @php
		          	if($student->status==1){$status='New Application'; 
		          	}elseif($student->status==2){$status='Final Submit';  
		          	}elseif($student->status==3){$status='Form Received( Pending )';  
		          	}elseif($student->status==4){$status='Accepted';   
		          	}elseif($student->status==5){$status='Rejected';    
		          	}elseif($student->status==6){$status='Pass';    
		          	}elseif($student->status==7){$status='Retest';   
		          	}elseif($student->status==8){$status='Fail';   
		          	}elseif($student->status==9){$status='Admitted';   
		          	} 
		          @endphp
				<tr>
					<td>{{ $student->id }}</td>
					<td>{{ $student->students->name or ''}}</td> 
					<td>{{ $status }}</td>

					
				</tr> 
		@endforeach
	</tbody>
</table>