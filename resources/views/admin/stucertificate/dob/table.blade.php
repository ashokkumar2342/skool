<table class="table table-hover table-condensed table-striped" id="slc_datatable">
     <thead>
          <tr>
               <th>Reg.No.</th>
               <th>Name</th>
               <th>Adm.No.</th> 
               <th>DOB</th>  
               <th>App.Date</th>  
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach ($DOBCertIssueDetails as $DOBCertIssueDetail) 
          <tr>
               <td>
                    <a onclick="callPopupLarge(this,'{{ route('admin.student.BirthCertificateIssueTake',$DOBCertIssueDetail->id) }}')">{{ $DOBCertIssueDetail->students->registration_no or '' }}
                    </a>
               </td>
               <td>{{ $DOBCertIssueDetail->students->name or '' }}</td>
               <td>{{ $DOBCertIssueDetail->AdmissionNo}}</td>  
               <td>{{ date('d-m-Y',strtotime($DOBCertIssueDetail->DOB))}}</td>
               <td>{{$DOBCertIssueDetail->ApplicationDate? date('d-m-Y', strtotime($DOBCertIssueDetail->ApplicationDate)) : null}}</td> 
               <td>
                <a onclick="callPopupLarge(this,'{{ route('admin.student.BirthCertificateIssueTake',$DOBCertIssueDetail->id) }}')" class="btn-xs btn btn-primary">Take Action</a>
               </td>
          </tr>
          @endforeach
     </tbody>
 </table> 