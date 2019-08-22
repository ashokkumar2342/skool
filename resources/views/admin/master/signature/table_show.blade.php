 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>SI.No.</th> 
                   <th>Certificate Type</th> 
                   <th>User Name</th>
                   <th>Signature</th>
                   <th>Stamp</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($signatureStamps as $signatureStamp) 
                 <tr>
                   <td>{{ $signatureStamp->id }}</td> 
                   @if ($signatureStamp->certificate_type_id==2)
                       <td>School Leaving Certificate</td>
                    @endif  
                    @if ($signatureStamp->certificate_type_id==3)
                       <td>Character Certificate</td>
                    @endif
                    @if ($signatureStamp->certificate_type_id==4)
                       <td>Date of Birth Certificate</td>
                    @endif
                   <td>{{ $signatureStamp->admins->first_name or ''}}</td>  
                   <td>{{ $signatureStamp->signature }}</td> 
                   <td>{{ $signatureStamp->stamp }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.event.type.edit',Crypt::encrypt($signatureStamp->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.event.type.delete',Crypt::encrypt($signatureStamp->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 