 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>SI.No.</th> 
                   <th>User Name</th>
                   <th>Certificate Type</th> 
                   <th>Destination</th>
                   <th>Issue User Type</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($signatureStamps as $signatureStamp) 
                 <tr>
                   <td>{{ $signatureStamp->id }}</td>  
                   <td>{{ $signatureStamp->admins->first_name or ''}}</td>  
                   <td>{{ $signatureStamp->CertificateType->name or '' }}</td>  
                   <td>{{ $signatureStamp->destination }}</td>  
                   <td>{{ $signatureStamp->IssueAthortiType->name or '' }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.signature.stamp.add.form',Crypt::encrypt($signatureStamp->id))}}')"><i class="fa fa-edit"></i></button> 
                      
                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 