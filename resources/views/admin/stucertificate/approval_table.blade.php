<table id="dataTable" class="table table-striped table-hover table-responsive">
                  <thead>
                  <tr>               
                     
                    <th class="text-nowrap">Reg.No.</th> 
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Class Passed</th> 
                    <th class="text-nowrap">Exam Roll No</th>  
                    <th class="text-nowrap">ApplicationDate</th>  
                    <th class="text-nowrap">attachment</th>  
                    <th class="text-nowrap">Action</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($CharCertIssueDetails as $CharCertIssueDetails)
                  <tr>
                     
                    <td>
                      <a onclick="callPopupLarge(this,'{{ route('admin.student.CharacterCertificateApprovalTake',$CharCertIssueDetails->id) }}')">{{ $CharCertIssueDetails->students->registration_no or ''}}</a>
                      </td> 
                    <td>{{ $CharCertIssueDetails->students->name or ''}}</td> 
                    <td>{{ $CharCertIssueDetails->clsses->name or ''}}</td> 
                    <td>{{ $CharCertIssueDetails->ExamRollNo or ''}}</td> 
                    <td>{{ $CharCertIssueDetails->ApplicationDate or ''}}</td> 
                    <td>{{ $CharCertIssueDetails->application_attach?'Yes':'No'}}</td> 
                    <td class="text-nowrap"> 
                       <a class="btn btn-primary btn-xs" onclick="callPopupLarge(this,'{{ route('admin.student.CharacterCertificateApprovalTake',$CharCertIssueDetails->id) }}')">Take Action</a>
                   </td> 
                  </tr>
                  @endforeach
                  </tbody>
                   
                </table>