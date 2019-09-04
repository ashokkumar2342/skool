 
	 
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
				 
				<td>{{ $StudentAttendancesBarcode->name}}</td>
				<td>{{ $StudentAttendancesBarcode->registration_no}}</td> 
				<td>{{ $StudentAttendancesBarcode->classes->name or ''}}</td> 
				<td>{{ $StudentAttendancesBarcode->sectionTypes->name}}</td> 
				
			</tr>
		 
	</tbody>
</table>
  </div>
</div>
<div class="col-lg-12 text-center">
	
<input type="submit" class="btn btn-success" value="Save" style="margin-top:5px">
</div>