 <table class="table"> 
   <thead>
     <tr>
       <th></th>
       <th>Teacher</th>
       <th>Class</th>
       <th>Subject</th>
       <th>Day</th>
       <th>Period</th>
       
     </tr>
   </thead>
   <tbody>
    @foreach ($teacherAdjustments as $teacherAdjustment)
                 <tr>
                   <td></td>
                   <td>{{ $teacherAdjustment->teacherFaculty->name or '' }}</td>
                   <td>{{ $teacherAdjustment->classTypes->name or '' }}</td>
                   <td>{{ $teacherAdjustment->subjectType->name or '' }}</td>
                   <td>{{ $teacherAdjustment->dayType->name or '' }}</td>
                   <td>{{ $teacherAdjustment->periodTiming->from_time or '' }}</td>
                   
                    
                 </tr>
       
    @endforeach
   </tbody>
 </table>