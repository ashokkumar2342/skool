 <h4> Search Student :  <b>{{ $results->count() }}</b> </h4>
              <table id="report_dataTable" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>  
                              
                  <th>Registration No</th> 
                  <th>Name</th> 
                  <th>Father Name</th>
                  @if ($student_phone==1) 
                  <th>Father Mobile</th> 
                  @endif  
                  @if ($student_email==2)
                       <th>Email</th>                                  
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
                <tr>
                  <td>{{ $result->registration_no }}</td> 
                  <td>{{ $result->name }}</td> 
                  <td>{{ $result->father_name }}</td>
                   @if ($student_phone==1) 
                  <td>{{ $result->father_mobile }}</td>
                   @endif  
                  @if ($student_email==2)
                      <td>{{ $result->email }}</td>                                 
                  @endif 
                   @if ($student_dob==3)
                      <td>{{ $result->dob }}</td>                                 
                  @endif
                   @if ($student_gen==4)
                      <td>{{ $result->genders->genders or ''}}</td>                                 
                  @endif
                  @if ($student_rel==5)
                      <td>{{ $result->religions->name or ''}}</td>                                 
                  @endif 
                  @if ($student_add==6)
                      <td>{{ $result->c_address }}</td>                                 
                  @endif 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
             