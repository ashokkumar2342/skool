 <table id="event_details_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>SI.No.</th> 
                   <th>Event</th> 
                   <th>Start_date</th>
                   <th>end_date</th>
                   <th>Event For</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($eventDetails as $eventDetail) 
                 <tr>
                   <td>{{ $eventDetail->id  or ''}}</td> 
                   <td>{{ $eventDetail->event_name or '' }}</td> 
                   <td>{{ date('d-m-Y', strtotime($eventDetail->start_date )) }}</td> 
                   <td>{{  date('d-m-Y',strtotime($eventDetail->end_date)) }}</td> 
                   <td>{{ $eventDetail->eveneFor->name or '' }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.event.type.edit',Crypt::encrypt($eventDetail->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.event.type.delete',Crypt::encrypt($eventDetail->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 