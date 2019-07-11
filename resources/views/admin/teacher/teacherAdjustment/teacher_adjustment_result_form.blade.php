 <table class="table"> 
   <thead>
     <tr>
       <th>header</th>
       <th>header</th>
       <th>header</th>
       <th>header</th>
       <th>header</th>
       <th>header</th>
     </tr>
   </thead>
   <tbody>
    @foreach ($teacherAdjustments as $teacherAdjustment)
                 <tr>
                   <td>{{ $teacherAdjustment->teacherFaculty->name or '' }}</td>
                   <td>{{ $teacherAdjustment->classTypes->name or '' }}</td>
                   <td>{{ $teacherAdjustment->subjectType->name or '' }}</td>
                   <td>{{ $teacherAdjustment->dayType->name or '' }}</td>
                   <td>{{ $teacherAdjustment->periodTiming->from_time or '' }}</td>
                    
                 </tr>
       
    @endforeach
   </tbody>
 </table>