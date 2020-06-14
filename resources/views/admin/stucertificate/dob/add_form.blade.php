         <div class="col-lg-9 form-group" style="margin-top: 24px">
            <table style="height: 5px;color: #459284" width="611" class="table-striped table">
            <tbody>
            <tr>
            <td style="width: 10px;">Name</td>
            <td style="width: 80px;"><b>{{ $studentdetail->name }}</b></td>
            <td style="width: 10px;">Father</td>
            <td style="width: 81px;"><b>{{ $studentdetail->parents[0]->parentInfo->name or ''}}</b></td>
            <td style="width: 10px;">Mother</td>
            <td style="width: 81px;"><b>{{ $studentdetail->parents[1]->parentInfo->name or ''}}</b></td> 
            </tr>
            </tbody>
            </table> 
          </div>
        </div> 
        <div class="col-lg-12"> 
           <div class="panel panel-primary"> 
             <div class="panel-body">
             <table class="bg-info table">
                <thead>
                  <tr>
                    <th>Application Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($DOBCertIssueDetails as $DOBCertIssueDetail)
                  <tr>
                    <td>{{ date('d-m-Y',strtotime($DOBCertIssueDetail->ApplicationDate)) }}</td>
                    @if ($DOBCertIssueDetail->Status==4)
                      <td>Approval</td>
                    @endif
                    @if ($DOBCertIssueDetail->Status==3)
                      <td>Reject</td>
                    @endif
                    @if ($DOBCertIssueDetail->Status==2)
                      <td>Issue</td>
                    @endif 
                    @if ($DOBCertIssueDetail->Status==1)
                      <td>Pending</td>
                    @endif   
                       
                    
                    
                  </tr> 
                  @endforeach
                </tbody>
              </table> 
            </div> 
           </div>
         </div>
          <input type="hidden" name="student_id" value="{{ $studentdetail->id }}">
          <input type="hidden" name="dob" value="{{ $studentdetail->dob }}">
          @php
            $date=date('Y-m-d');
          @endphp
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Application Date</label>
            <input type="date" name="Application_Date" class="form-control" id="exampleInputPassword1"  value="{{ $date }}">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Admission No.</label>
            <input type="text" name="Old_Admission_No" class="form-control" id="exampleInputPassword1" value="{{ $studentdetail->admission_no }}">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Date of Admission</label>
            <input type="date" name="DateofAdmission" class="form-control" id="exampleInputPassword1"   value="{{ $studentdetail->date_of_admission }}">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Date of Birht</label>
            <input type="date" name="DateofAdmission" class="form-control disabled" disabled="disabled" id="exampleInputPassword1"  value="{{ $studentdetail->dob }}">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Character Type</label>
            <input type="text" name="Character_Type" class="form-control disabled"  id="exampleInputPassword1"  >
          </div> 
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" name="">
            <input type="button" class="btn btn-success" name="" value="Back" onclick="refreshPage()">
          </div>
         
         