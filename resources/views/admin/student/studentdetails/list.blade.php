 
<table  class="table table-bordered table-striped table-hover">
  <thead>
  <tr>               
    <th>Registration No</th> 
    <th>Name</th>
    <th>Father's Name</th> 
    <th>Mother's Name</th> 
    <th>Mobile</th> 
    <th>Email</th> 
    <th width="100px">Action</th>                  
  </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
 {{--  @if ($student->relation_id==1 or $student->relation_id==null) --}}  
  <tr>
    <td>{{ $student->registration_no }}</td>
 
    <td>{{ $student->name }}</td>
    <td>{{ $student->parents[0]->parentInfo->name or '' }}</td>
    <td>{{ $student->parents[1]->parentInfo->name or '' }}</td>
    <td>{{ $student->addressDetails->address->primary_mobile or ''}}</td>
    <td>{{ $student->addressDetails->address->primary_email or '' }}</td>
     
    <td align="center">
     {{--  @if ($menuPermision->r_status==1)
       <a class="btn btn-primary btn-xs" title="View Student" href="{{ route('admin.student.view',$student->id) }}" target="_blank"><i class="fa fa-eye"></i></a>
       @endif  --}}
       @if ($menuPermision->w_status==1) 
      <a class="btn btn-warning btn-xs"  title="Edit Student" href="{{ route('admin.student.view',$student->id) }}" target="_blank"><i class="fa fa-edit"></i> 
    {{--  @endif --}}
     
      {{-- <a onclick="return confirm('Are you sure to reset this student password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.student.passwordreset',$student->id) }}"><i class="fa fa-key"></i></a> --}}
      @if ($menuPermision->d_status==1)
         <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete Student.'),callAjax(this,'{{ route('admin.student.delete',$student->id) }}','','')" class="btn btn-danger btn-xs" button-click="student_details_show" title="delete student" success-popup="true" href="#"><i class="fa fa-trash"></i></a> 

        {{--  <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="{{ route('admin.student.delete',$student->id) }}"><i class="fa fa-trash"></i></a> --}}
      @endif
       
      
    </td>
   
  </tr>
  @endif
  @endforeach
  </tbody>
   
</table>
             