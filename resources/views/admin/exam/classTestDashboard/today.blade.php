 <table class="table"> 
                    <thead>
                      <tr>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Maximum Marks</th>
                        <th>Test Date</th>
                        <th>Discriptoin</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($classTests as $classTest)
                      <tr>
                        <td>{{ $classTest->classes->name or ''}}</td>
                        <td>{{ $classTest->subjects->name or ''}}</td>
                        <td>{{ $classTest->max_marks }}</td>
                        <td>{{ $classTest->test_date }}</td>
                        <td>{{ $classTest->discription }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>