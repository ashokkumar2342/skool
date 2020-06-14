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
                  @foreach ($SLCIssueDetails as $SLCIssueDetail)
                  <tr>
                    <td>{{ date('d-m-Y',strtotime($SLCIssueDetail->ApplicationDate)) }}</td>
                    @if ($SLCIssueDetail->Status==4)
                      <td>Approval</td>
                    @endif
                    @if ($SLCIssueDetail->Status==3)
                      <td>Reject</td>
                    @endif
                    @if ($SLCIssueDetail->Status==2)
                      <td>Issue</td>
                    @endif 
                    @if ($SLCIssueDetail->Status==1)
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
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Application Date</label>
            <input type="date" name="Application_Date" class="form-control" id="exampleInputPassword1"  value="{{ $date }}">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Old Admission No.</label>
            <input type="text" name="Old_Admission_No" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Date of Admission</label>
            <input type="date" name="DateofAdmission" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ $studentdetail->date_of_admission }}">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Date of Birht</label>
            <input type="date" name="DateofAdmission" class="form-control disabled" disabled="disabled" id="exampleInputPassword1" placeholder="Password" value="{{ $studentdetail->dob }}">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Class Admitted</label>
            <select name="Class_Admitted" class="form-control">
              @foreach ($classTypes as $classType)
              <option value="{{ $classType->id }}"{{ $classType->id==$studentdetail->class_id }}>{{ $classType->name }}</option>  
              @endforeach
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Last Class</label>
            <select name="Last_Class" class="form-control">
            <option selected disabled>--Select Class--</option>
              @foreach ($classTypes as $classType)
              <option value="{{ $classType->id }}"{{ $classType->id==$studentdetail->class_id }}>{{ $classType->name }}</option>  
              @endforeach
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">LastResult</label>
            <input type="text" name="LastResult" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Failed</label>
            <input type="text" name="Failed" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Subjects</label>
            <select name="Subjects" class="form-control">
              <option selected disabled>--Select Subject--</option>
              @foreach ($subjects as $subject)
              <option value="{{ $subject->id }}">{{ $subject->name }}</option>  
              @endforeach
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Qualified</label>
            <input type="text" name="Qualified" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Class Qualified</label>
            <select name="Class_Qualified" class="form-control">
              <option selected disabled>--Select Class--</option>
              @foreach ($classTypes as $classType)
              <option value="{{ $classType->id }}"{{ $classType->id==$studentdetail->class_id }}>{{ $classType->name }}</option>  
              @endforeach
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Class Qualified Words</label>
            <input type="text" name="Class_Qualified_Words" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div> 
         <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Fee Paid Upto:</label> 
             <select name="fee_paid_upto" id="fee_paid_upto" class="form-control">      
               <option disabled selected>-Select-</option>
               @foreach ($uptoMonthYears as $uptoMonthYear)
                <option value="{{date('d-m-Y',strtotime($uptoMonthYear)) }}"{{date('d-m-Y',strtotime($uptoMonthYear))==@$upto_month_year?'selected' : '' }}> {{date('M-Y',strtotime($uptoMonthYear)) }} </option>
               @endforeach
             </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Any Fee Concession</label>
            <input type="text" name="AnyFeeConcession" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Date of Join Last Class</label>
            <input type="date" name="DateOfJoinLastClass" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="Category" class="form-control">
              <option selected disabled=""> --select Category--</option>
              @foreach ($Categorys as $Category)
              <option value="{{ $Category->id }}">{{ $Category->name }}</option> 
              @endforeach 
            </select>
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">Attendance</label>
            <input type="text" name="Attendance" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-4 form-group">
            <label for="exampleInputPassword1">NCC Detail</label>
            <input type="text" name="NCCDetail" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Extra Activity</label>
            <input type="text" name="ExtraActivity" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Character Type</label>
            <input type="text" name="CharacterType" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Reason Leaving</label>
            <input type="text" name="ReasonLeaving" class="form-control" id="exampleInputPassword1" placeholder="">
          </div> 
          <div class="col-lg-3 form-group">
            <label for="exampleInputPassword1">Nationality</label>
            <input type="text" name="Nationality" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>
          <div class="col-lg-12 form-group">
            <label for="exampleInputPassword1">Any Remarks</label>
            <textarea   name="Remarks" class="form-control" id="exampleInputPassword1" placeholder=""></textarea>
          </div>
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" name="">
            <input type="button" class="btn btn-success" name="" value="Back" onclick="refreshPage()">
          </div>
         
         