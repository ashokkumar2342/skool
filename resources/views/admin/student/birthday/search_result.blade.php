 
  @foreach($students as $student)
  
  <tr>
    <td><input type="checkbox"  class="checkbox"  name="student[]" value="{{ $student->id }}"></td>               
    <td>{{ $student->registration_no }}</td>               
    <td>{{ date('d-m-Y',strtotime($student->dob)) }}</td>               
    <td>{{ $student->name }}</td>
    <td>{{ $student->parents[0]->parentInfo->name or '' }}</td>
    <td>{{ $student->parents[0]->parentInfo->mobile or '' }}</td>
    <td>{{ $student->addressDetails->address->primary_mobile or '' }}</td> 
    <td>{{ $student->addressDetails->address->primary_email or '' }}</td> 
    <td>
    	<a href="{{ route('admin.birthday.card.pdf',$student->id) }}"  class="btn btn-info btn-xs"><i class="fa fa-print"></i> </a>
      <a  href="{{ route('admin.birthday.card.sms.send',[$student->id,1]) }}" target="blank"  class="btn btn-primary btn-xs"><i class="fa fa-send"></i>Send Sms</a>
      <a  href="{{ route('admin.birthday.card.sms.send',[$student->id,2]) }}" class="btn btn-danger btn-xs"><i class="fa fa-envelope"></i>Email</a>
    </td> 
  </tr>
  @endforeach
 