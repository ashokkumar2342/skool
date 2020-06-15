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
                  @foreach ($CharCertIssueDetails as $CharCertIssueDetail)
                  <tr>
                    <td>{{ date('d-m-Y',strtotime($CharCertIssueDetail->ApplicationDate)) }}</td>
                    @if ($CharCertIssueDetail->Status==4)
                      <td>Approval</td>
                    @endif
                    @if ($CharCertIssueDetail->Status==3)
                      <td>Reject</td>
                    @endif
                    @if ($CharCertIssueDetail->Status==2)
                      <td>Issue</td>
                    @endif 
                    @if ($CharCertIssueDetail->Status==1)
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
          <div class="col-lg-6 form-group">
              <label>Date of Birth</label>
              <input type="date" disabled="disabled" class="form-control disabled" value="{{ @$studentdetail->dob }}"> 
            </div>
            <div class="col-lg-6 form-group">
              <label>Pass Class</label>
              <select name="class_id" class="form-control">
                @foreach ($classTypes as $classType)
                <option value="{{ $classType->id }}">{{ $classType->name }}</option>  
                @endforeach
            </select>
            </div> 
            <div class="col-lg-6 form-group">
              <label>Exam Roll No.</label>
              <input type="text" name="Exam_Roll_No" class="form-control">
            </div>
            <div class="col-lg-6 form-group">
              <label>Exam Held On</label>
              <input type="text" name="Exam_Held_On" class="form-control">
            </div>
            <div class="col-lg-6 form-group">
              <label>Extra Activity</label>
              <input type="text" name="Extra_Activity" class="form-control" value="{{ @$sportsActivityName->sports_activity_name }}">
            </div>
            <div class="col-lg-6 form-group">
              <label>Character Type</label>
              <input type="text" name="Character_Type" class="form-control">
            </div>
            @php
                $date=date('Y-m-d');
            @endphp
            <div class="col-lg-6 form-group">
              <label>Application Date</label>
              <input type="date" name="Application_Date" class="form-control" value="{{ $date }}">
            </div>
            {{-- <div class="col-lg-6 form-group">
              <label>Issue Date</label>
              <input type="text" name="Issue_Date" class="form-control">
            </div> --}}
            <div class="col-lg-6 form-group">
              <label>Application Attach</label>
              <input type="file" name="application_attach" class="form-control">
            </div>
             <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" name="">
            <input type="button" class="btn btn-success" name="" value="Back" onclick="refreshPage()">
          </div>
         
         