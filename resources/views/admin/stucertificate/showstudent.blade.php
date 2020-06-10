<button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.CharacterCertificateApplication.add.form',$studentdetail->id) }}')" style="margin: 7px">Application</button>
<div class="panel panel-default">
	<div class="panel-heading">Student Details</div>
	<div class="panel-body">
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Registration.No.</th>
				<th>Class/Section</th>
				<th>Father's Name</th>
				<th>Mother's Name</th>
			</tr>
		</thead>
		<tbody>
			 
			<tr>
				<td>{{ $studentdetail->name or ''}}</td>
				<td>{{ $studentdetail->registration_no or ''}}</td>
				<td>{{ $studentdetail->classes->name or '' }}/{{ $studentdetail->sectionTypes->name or '' }}</td>
				<td>{{ $studentdetail->parents[0]->parentInfo->name or ''}}</td>
				<td>{{ $studentdetail->parents[1]->parentInfo->name or ''}}</td>
			</tr>  
		</tbody>
	</table> 
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">Certificate Details</div>
	<div class="panel-body">
<table class="table">
	<thead>
		<tr>
			<th>Application Date</th>
			<th>Character Type</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($CharCertIssueDetails as $CharCertIssueDetail)
		<tr>
			<td>{{ $CharCertIssueDetail->ApplicationDate }}</td>
			<td>{{ $CharCertIssueDetail->CharacterType }}</td>
		</tr> 
		@endforeach
	</tbody>
</table>
</div>
</div>