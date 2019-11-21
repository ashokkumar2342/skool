 
	 
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
  	<table class="table"> 
	<thead>
		<tr>  
			<th>Name</th>
			<th>Registration No</th>
			<th>Class</th>
			<th>Section</th>
			 
		</tr>
	</thead>
	<tbody> 
			<tr>
				 
				<td>{{ $StudentAttendancesBarcode->name or ''}}</td>
				<td>{{ $StudentAttendancesBarcode->registration_no or ''}}</td>
				<input type="hidden" name="student_id" value="{{ $StudentAttendancesBarcode->id }}"> 
				<td>{{ $StudentAttendancesBarcode->classes->name or ''}}</td> 
				<td>{{ $StudentAttendancesBarcode->sectionTypes->name or ''}}</td> 
				
			</tr>
		 
	</tbody>
</table>
  </div>
</div>
<div class="col-lg-12 text-center">
	
<input type="submit" class="btn btn-success" value="Save" style="margin-top:5px">
</div>