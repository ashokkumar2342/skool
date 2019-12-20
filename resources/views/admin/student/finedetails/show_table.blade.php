<div class="col-lg-12">
	<button type="button" style="margin: 10px" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.fine.details.addform',1) }}')">Add New</button>
	
</div>
<table class="table" id="student_fine_details_datatable">
	<thead>
		<tr>
			<th>Fine Name</th>
			<th>Fine Amount</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($studentFineDetails as $studentFineDetail)
					<tr>
						<td>{{ $studentFineDetail->fine_name }}</td>
						<td>{{ $studentFineDetail->fine_amount }}</td>
						 
					</tr> 
		@endforeach
	</tbody>
</table>