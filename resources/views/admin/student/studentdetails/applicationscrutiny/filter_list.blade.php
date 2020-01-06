@foreach ($admissionApplications as $admissionApplication)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ $admissionApplication->id }}</td>
                      <td>{{ $admissionApplication->students->name or '' }}</td>
                      <td>{{ $admissionApplication->last_school_name or '' }}</td>
                      <td class="text-nowrap">
                        <a href="{{ route('admin.student.registration.profile.view',$admissionApplication->student_id) }}" title="View" class="btn btn-xs btn-default" target="blank"><i class="fa fa-eye"></i></a>
                        
                       @if ($conditionId==3)
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,4]) }}')" title="Accepted" class="btn btn-xs btn-success">Accepted</a> 
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,5]) }}')" title="Rejected" class="btn btn-xs btn-danger">Rejected</a>
                        @endif
                        @if ($conditionId==4) 
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,3]) }}')" title="Pending" class="btn btn-xs btn-warning">Pending</a>
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,5]) }}')" title="Rejected" class="btn btn-xs btn-danger">Rejected</a> 
                        @endif
                        @if ($conditionId==5) 
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,4]) }}')" title="Accepted" class="btn btn-xs btn-success">Accepted</a>
                        <a onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',[$admissionApplication->id,3]) }}')" title="Rejected" class="btn btn-xs btn-warning">Pending</a> 
                        @endif
                         
                      </td>
                    </tr> 
                @endforeach