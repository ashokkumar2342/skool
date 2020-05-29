 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>SI.No.</th> 
                   <th>User Name</th>
                   <th>Certificate Type</th> 
                   <th>Signature</th>
                   <th>Stamp</th>
                   <th>Stamp Type</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($signatureStamps as $signatureStamp) 
                 <tr>
                   <td>{{ $signatureStamp->id }}</td>  
                   <td>{{ $signatureStamp->admins->first_name or ''}}</td>  
                   <td>{{ $signatureStamp->CertificateType->name or '' }}</td> 
                   <td>{{ $signatureStamp->signature }}</td> 
                   <td>{{ $signatureStamp->stamp }}</td> 
                   <td>{{ $signatureStamp->IssueAthortiType->name or '' }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" ><i class="fa fa-edit"></i></button> 
                     <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a> 
                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 