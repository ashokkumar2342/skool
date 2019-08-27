
 <form action="{{ route('admin.attendance.student.absent.send.sms') }}" method="post" class="add_form"> 
  {{ csrf_field() }}
  <input type="submit" class="btn btn-primary btn-sm " style="margin: 5px;float: right;" value="Send Sms"> 
 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   
                   <th>Name</th> 
                   <th>Class/Section</th> 
                   <th>Registration No</th> 
                    
                 </tr>
               </thead>
               <tbody>
                @foreach ($StudentAttendances as $StudentAttendance) 
                 <tr>
                     
                   <td>{{ $StudentAttendance->student->name or ''}}</td> 
                   <input type="text" hidden="" name="student_id[]" value="{{ $StudentAttendance->student_id}}">
                   <td>{{ $StudentAttendance->student->classes->name or ''}}/{{ $StudentAttendance->student->sectionTypes->name or ''}}</td> 
                   <td>{{ $StudentAttendance->student->registration_no }}</td> 
                   
                 </tr>
                @endforeach
               </tbody>
             </table>

  </form>