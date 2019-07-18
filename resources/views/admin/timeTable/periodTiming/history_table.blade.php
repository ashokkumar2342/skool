<table class="table" id=" time_table_type_history"> 
                <thead>
                  <tr>
                   {{--  <th>Time Table Type</th> --}}
                    <th>Period Time</th>
                    <th>Period No</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($periodTimings as $periodTiming) 
                      <tr>
                        {{-- <td>{{ $periodTiming->timeTableType->name or '' }}</td> --}}
                        <td>{{ $periodTiming->from_time }}</td>
                        <td>{{ $periodTiming->time_no }}</td>
                        <td>
                          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.preod.timing.edit',Crypt::encrypt($periodTiming->id)) }}')"><i class="fa fa-edit"></i></button>

                             <a href="{{ route('admin.preod.timing.delete',Crypt::encrypt($periodTiming->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                         
                      </tr>
                  @endforeach
                </tbody>
              </table>