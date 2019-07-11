{{--  <table class="table"> 
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
 </table> --}}
</br>
 <div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
    <table class="table "> 
      <thead>
        <tr>

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

       <td>{{ $teacherAdjustment->teacherFaculty->name or '' }}</td>
       <td>{{ $teacherAdjustment->classTypes->name or '' }}</td>
       <td>{{ $teacherAdjustment->subjectType->name or '' }}</td>
       <td>{{ $teacherAdjustment->dayType->name or '' }}</td>
       <td>{{ $teacherAdjustment->periodTiming->from_time or '' }}</td>


   </tr>

   @endforeach 

</tbody>
</table>
</div>

</div>

