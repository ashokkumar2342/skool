<table class="table" id="leave_report_table">
	<thead>
		<tr>
			<th>Sr.No.</th>
			<th>Name</th>
			<th>Registration No.</th>
			<th>Apply Date</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Action Date</th>
			<th>Action By</th>
			<th>Remark</th>
			<th>Attachment</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@php
			$reportId=1;
		@endphp
		@foreach ($leaveapplys as $leaveapply)
				<tr style="@if ($leaveapply->status==1) background-color: #61e66b @endif @if ($leaveapply->status==2) background-color: #f64d56 @endif @if ($leaveapply->status==0) background-color:#f8af3b @endif">
					<td>{{ $reportId++ }}</td>
					<td>{{ $leaveapply->students->name or '' }}</td>
					<td>{{ $leaveapply->students->registration_no or '' }}</td>
					<td>{{ date('d-M-Y',strtotime($leaveapply->apply_date)) }}</td>
					<td>{{ date('d-M-Y',strtotime($leaveapply->from_date)) }}</td>
					<td>{{ date('d-M-Y',strtotime($leaveapply->to_date)) }}</td>
					<td>{{ date('d-M-Y',strtotime($leaveapply->action_date)) }}</td>
					<td>{{ $leaveapply->admins->first_name or '' }}</td>
					<td>{{ $leaveapply->remark or '' }}</td>
					<td>
						<a href="{{ route('admin.attendance.leave.delete',$leaveapply->attachment) }}" target="blank" style="margin:10px">{{ $leaveapply->attachment?'Open the Attachment!' : '' }}</a>
					</td>
					
						@if ($leaveapply->status==0)
						 <td><span>Pending</span></td>
					    @endif
					    @if ($leaveapply->status==1)
						 <td><span>Approval</span></td>
					    @endif
					    @if ($leaveapply->status==2)
						 <td><span>Reject</span></td>
					    @endif
				    
				</tr> 
		@endforeach
	</tbody>
</table>