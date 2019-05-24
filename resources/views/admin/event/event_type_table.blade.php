 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>SI.No.</th> 
                   <th>Name</th> 
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($eventTypes as $eventType) 
                 <tr>
                   <td>{{ $eventType->id }}</td> 
                   <td>{{ $eventType->name }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.event.type.edit',Crypt::encrypt($eventType->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.event.type.delete',Crypt::encrypt($eventType->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 