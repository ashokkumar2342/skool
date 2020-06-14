<table class="table table-hover table-condensed table-striped" id="slc_datatable">
     <thead>
          <tr>
               <th>Reg.No.</th>
               <th>Name</th>
               <th>Old Adm.No.</th>
               <th>DOA</th>
               <th>DOB</th>  
               <th>App.Date</th> 
               <th>C.Admitted</th>
               <th>L.Class</th>
               <th>L.Result</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach ($SLCIssueDetails as $SLCIssueDetail) 
          <tr>
               <td>
                    <a onclick="callPopupLarge(this,'{{ route('admin.student.LeavingCertificateApprovalTake',$SLCIssueDetail->id) }}')">{{ $SLCIssueDetail->students->registration_no or '' }}
                    </a>
               </td>
               <td>{{ $SLCIssueDetail->students->name or '' }}</td>
               <td>{{ $SLCIssueDetail->OldAdmissionNo}}</td> 
               <td>{{ date('d-m-Y',strtotime($SLCIssueDetail->DateofAdmission))}}</td>
               <td>{{ date('d-m-Y',strtotime($SLCIssueDetail->DOB))}}</td>
               <td>{{$SLCIssueDetail->ApplicationDate? date('d-m-Y', strtotime($SLCIssueDetail->ApplicationDate)) : null}}</td>
               <td>{{ $SLCIssueDetail->ClassAdmitted}}</td>
               <td>{{ $SLCIssueDetail->LastClass}}</td>
               <td>{{ $SLCIssueDetail->LastResult}}</td> 
               <td>
                <a onclick="callPopupLarge(this,'{{ route('admin.student.LeavingCertificateApprovalTake',$SLCIssueDetail->id) }}')" class="btn-xs btn btn-primary">Take Action</a>
               </td>
          </tr>
          @endforeach
     </tbody>
 </table> 