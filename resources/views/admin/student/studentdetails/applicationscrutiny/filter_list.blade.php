@foreach ($admissionApplications as $admissionApplication)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ $admissionApplication->id }}</td>
                      <td>{{ $admissionApplication->students->name or '' }}</td>
                      <td>{{ $admissionApplication->last_school_name or '' }}</td>
                      <td class="text-nowrap">
                        <a href="{{ route('admin.submit.application.accepted',Crypt::encrypt($admissionApplication->id)) }}" title="View" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                        <a href="#" onclick="callPopupLarge(this,'{{ route('admin.submit.application.remark',Crypt::encrypt($admissionApplication->id)) }}')" title="Remark" class="btn btn-xs btn-primary">Remark</a>
                       @if ($conditionId==3)
                        <a href="{{ route('admin.submit.application.accepted',Crypt::encrypt($admissionApplication->id)) }}" title="Accepted" class="btn btn-xs btn-success">Accepted</a> 
                        <a href="{{ route('admin.submit.application.rejected',Crypt::encrypt($admissionApplication->id)) }}" title="Rejected" class="btn btn-xs btn-danger">Rejected</a>
                        @endif
                        @if ($conditionId==4) 
                        <a href="{{ route('admin.submit.application.rejected',Crypt::encrypt($admissionApplication->id)) }}" title="Rejected" class="btn btn-xs btn-danger">Rejected</a>
                        <a href="{{ route('admin.submit.application.pending',Crypt::encrypt($admissionApplication->id)) }}" title="Pending" class="btn btn-xs btn-warning">Pending</a> 
                        @endif
                        @if ($conditionId==5) 
                        <a href="{{ route('admin.submit.application.accepted',Crypt::encrypt($admissionApplication->id)) }}" title="Accepted" class="btn btn-xs btn-success">Accepted</a>
                        <a href="{{ route('admin.submit.application.pending',Crypt::encrypt($admissionApplication->id)) }}" title="Rejected" class="btn btn-xs btn-warning">Pending</a> 
                        @endif
                         
                      </td>
                    </tr> 
                @endforeach