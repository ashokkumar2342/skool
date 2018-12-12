 
  @foreach($students as $student)
  
  <tr>
    <td><input type="checkbox"  class="checkbox"  name="student[]" value="{{ $student->id }}"></td>               
    <td>{{ $student->registration_no }}</td>               
    <td>{{ date('d-m-Y',strtotime($student->dob)) }}</td>               
    <td>{{ $student->name }}</td>
    <td>{{ $student->father_name }}</td>
    <td>{{ $student->father_mobile }}</td>
    <td>{{ $student->mother_mobile }}</td> 
    <td>
    	<a href="{{ route('admin.birthday.card.pdf',$student->id) }}"  class="btn btn-info btn-xs"><i class="fa fa-print"></i> </a>
    </td> 
  </tr>
  @endforeach
 