 
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
         
      </div>
      <div class="modal-body">
        <table class="table"> 
        	<thead>
        		<tr>
        			 
        			<th>Registration No</th>
        			<th>Name</th>
        			<th>Father Name</th>
        			<th>Class</th>
        			<th>Section</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach ($studentAttendances as $studentAttendance)
        		<tr>
        			<td>{{ $studentAttendance->student->registration_no or '' }}</td>
        			<td>{{ $studentAttendance->student->name or '' }}</td>
        			<td>{{ $studentAttendance->student->father_name or '' }}</td>
        			<td>{{ $studentAttendance->student->classes->name or '' }}</td>
        			<td>{{ $studentAttendance->student->sectionTypes->name or '' }}</td>
        			 
        		</tr>
        		@endforeach
        	</tbody>
        </table>
         
        </div>
      </div>
     
    <!-- /.content -->

 
