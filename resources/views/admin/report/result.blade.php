 <h4> Search Student :  <b>{{ $results->count() }}</b> </h4>
              <table id="report_dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Registration No</th>                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Mother Mobile</th>                                    
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                <tr>
                  <td>{{ $result->registration_no }}</td>               
                  <td>{{ $result->name }}</td>
                  <td>{{ $result->father_name }}</td>
                  <td>{{ $result->father_mobile }}</td>
                  <td>{{ $result->mother_mobile }}</td> 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
             