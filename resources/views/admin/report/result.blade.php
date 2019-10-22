 <h4> Search Student :  <b>{{ $results->count() }}</b> </h4>
              <table id="report_dataTable" class="table table-bordered table-striped table-hover table-responsive">
                  
                <thead>
                <tr>  
                              
                  <th>Registration No</th> 
                  <th>Name</th> 
                  <th>Father's Name</th>
                  <th>Mother's Name</th>
                  @if ($student_phone==1) 
                  <th>Mobile</th> 
                  @endif  
                  @if ($student_email==2)
                       <th>E-mail</th>                                  
                  @endif
                   @if ($student_dob==3)
                       <th>Date of Birth</th>                                  
                  @endif
                   @if ($student_gen==4)
                       <th>Gender</th>                                  
                  @endif
                   @if ($student_rel==5)
                       <th>Religion</th>                                  
                  @endif 
                  @if ($student_add==6)
                       <th>Address</th>                                  
                  @endif 
                                                     
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                @if ($result->relation_id==1 or $result->relation_id==null)
                <tr>
                  <td>{{ $result->registration_no }}</td> 
                  <td>{{ $result->name }}</td> 
                  <td>{{ $result->parents[0]->parentInfo->name or '' }}</td>
                  <td>{{ $result->parents[1]->parentInfo->name or '' }}</td>
                   @if ($student_phone==1) 
                  <td>{{ $result->addressDetails->address->primary_mobile or ''}}</td>
                   @endif  
                  @if ($student_email==2)
                      <td>{{ $result->addressDetails->address->primary_email or '' }}</td>                                 
                  @endif 
                   @if ($student_dob==3)
                      <td>{{ $result->dob }}</td>                                 
                  @endif
                   @if ($student_gen==4)
                      <td>{{ $result->genders->genders or ''}}</td>                                 
                  @endif
                  @if ($student_rel==5)
                      <td>{{ $result->addressDetails->address->religions->name or ''}}</td>                                 
                  @endif 
                  @if ($student_add==6)
                      <td>{{ $result->addressDetails->address->p_address or ''}}</td>                                 
                  @endif 
                </tr>
                @endif
                @endforeach
                </tbody>
                 
              </table>
             