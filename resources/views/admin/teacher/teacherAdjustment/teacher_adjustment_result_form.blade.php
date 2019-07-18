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
  <div class="panel-heading text-right"><a href=""  class="btn btn-primary btn-sm" title="Print">Print</a></div>
  <div class="panel-body">
    <table class="table "> 
      <thead>
        <tr>

          <th>Teacher</th>
          <th>Class</th>
        {{--   <th>Section</th> --}}
          <th>Subject</th>
          <th>Day</th>
          <th>Period Time</th> 
          <th>Period No</th> 
           
      </tr>
  </thead>
  <tbody>

     @foreach ($teacherAdjustments as $teacherAdjustment)
     <tr>

       <td>{{ $teacherAdjustment->teacherFaculty->name or '' }}</td>
       <td>{{ $teacherAdjustment->classTypes->name or '' }}</td>
      {{--  <td>{{ $teacherAdjustment->sectionTypes->name or '' }}</td> --}}
       <td>{{ $teacherAdjustment->subjectType->name or '' }}</td>
       <td>{{ $teacherAdjustment->dayType->name or '' }}</td>
       <td>{{ $teacherAdjustment->periodTiming->from_time or '' }}</td>
       <td>{{ $teacherAdjustment->periodTiming->time_no or '' }}</td>
       <td>
       

        {{-- <a href="#"  onclick="callPopupLarge(this,'{{ route('admin.teacher.adjustment.edit',$teacherAdjustment->id) }}','','')" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a> --}}

        </td>


   </tr>

   @endforeach 

</tbody>
</table>
</div>

</div>

