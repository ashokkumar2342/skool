   <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 2px;;
  }
  
</style>
   <div class="modal-dialog" style="width:70%"> 
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
          <h4 align="center"><b>Teacher Adjust List</b></h4>
          </div>
         <div class="modal-body">
             <div class="panel panel-default">
 <div class="panel-heading text-right">

  <a href=""  class="btn btn-primary btn-sm" title="Print">Print</a></div>
  
  <div class="panel-body">
    <table class="table "> 
      <thead>
        <tr>

          <th>Teacher</th>
          <th>Class</th>
         {{--  <th>Section</th> --}}
          <th>Subject</th>
          <th>Day</th>
          <th>Period Time</th> 
          <th>Period No</th> 
          <th>Action</th> 
         
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
       <a href="#"  onclick="callPopupLevel2(this,'{{ route('admin.teacher.adjustment.edit',$teacherAdjustment->id) }}')" class="btn btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
     </td>
       


   </tr>

   @endforeach 

</tbody>
</table>
</div>

</div>
        </div>
      </div> 

 
</div>
