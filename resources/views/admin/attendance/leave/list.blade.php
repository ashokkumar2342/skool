<table class="table table-striped table-responsive table-bordered" id="leave_record_table">
	<thead>
		<tr>
			<th>Academic year</th>
			<th>Leave Type</th>
			<th>student Name</th>
			<th>Apply Date</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($leaveRecords as $leaveRecord)
			 
		<tr style="@if ($leaveRecord->status==1) background-color: #61e66b @endif @if ($leaveRecord->status==2) background-color: #f64d56 @endif @if ($leaveRecord->status==0) background-color:#f8af3b @endif">
			<td>{{ $leaveRecord->academicYear->name or '' }}</td>
			<td>{{ $leaveRecord->leaveTypes->name or '' }}</td>
			<td>{{ $leaveRecord->students->name or '' }}</td>
			<td>{{ date('d-m-Y',strtotime( $leaveRecord->apply_date))}}</td>
			<td>{{ date('d-m-Y',strtotime( $leaveRecord->from_date))}}</td>
			<td>{{ date('d-m-Y',strtotime( $leaveRecord->to_date))}}</td>
			 @if ($leaveRecord->status==0)
			 	<td >Pending</td> 
			 @endif
			 @if ($leaveRecord->status==1)
			 	<td >Approval</td> 
			 @endif
			 @if ($leaveRecord->status==2)
			 	<td >Reject </td> 
			 @endif
			<td>
				<button type="button" class="btn btn-info btn-xs" select2="true" onclick="callPopupLarge(this,'{{ route('admin.attendance.leave.apply',$leaveRecord->id) }}')"><i class="fa fa-edit"></i></button>
				<a href="#" success-popup="true" button-click="btn_click_list_show" onclick="callAjax(this,'{{ route('admin.attendance.leave.delete',$leaveRecord->id) }}')" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
			</td>
			 
			 
			 
		</tr>
		@endforeach
	</tbody>
</table>