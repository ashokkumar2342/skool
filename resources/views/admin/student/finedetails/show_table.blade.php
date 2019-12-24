<div class="col-lg-12">
	<button type="button" style="margin: 10px" class="btn btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.student.fine.details.addform',$student_id) }}')">Add New</button>
	
</div>
<table class="table" id="student_fine_details_datatable">
	<thead>
		<tr>
			<th>Fine Name</th>
			<th>Fine Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($studentFineDetails as $studentFineDetail)
					<tr>
						<td>{{ $studentFineDetail->fine_name }}</td>
						<td>{{ $studentFineDetail->fine_amount }}</td>
						<td>
							<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.student.fine.details.edit',$studentFineDetail->id) }}')"><i class="fa fa-edit"></i></a>
							<a href="#" title="Delete" class="btn btn-danger btn-xs" success-popup="true" button-click="btn_student_fine_details_show" onclick="callAjax(this,'{{ route('admin.student.fine.details.delete',$studentFineDetail->id) }}')"><i class="fa fa-trash"></i></a>
						</td>
						 
					</tr> 
		@endforeach
	</tbody>
</table>