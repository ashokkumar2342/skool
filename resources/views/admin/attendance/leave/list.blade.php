<div class="panel panel-success">
        <div class="panel-heading">Student Summary</div>
        <div class="panel-body">
        	 <table class="table" style="font-size: 12px">
        	 	<thead>
        	 		<tr>
        	 			<th>Leave Type</th>
        	 			<th>Total Days</th>
        	 			<th>Already Apply</th>
        	 			<th>Balance Days</th>
        	 		</tr>
        	 	</thead>
        	 	<tbody>
        	 		@foreach ($studentSumrys as $studentSumry) 
        	 		<tr>
        	 			<td>{{ $studentSumry->name }}</td>
        	 			<td>{{ $studentSumry->total_days }}</td>
        	 			<td>{{ $studentSumry->Already_Apply}}</td>
        	 			<td>{{ $studentSumry->balance_days }}</td>
        	 		</tr>
        	 		@endforeach
        	 	</tbody>
        	 </table>
        </div>
    </div>
<table class="table table-striped table-responsive table-bordered" id="leave_record_table">
	<thead>
		<tr>
			<th>Academic year</th>
			<th>Leave Type</th>
			<th>student Name</th>
			<th>Apply Date</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Total Days</th>
			<th>Remarks</th>
			<th>Attachment</th>
			<th>Status</th>
			{{-- <th>Action</th> --}}
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
			<td>{{$leaveRecord->total_days}}</td>
			<td>{{$leaveRecord->remark}}</td>
			<td><a href="{{ route('admin.attendance.leave.delete',$leaveRecord->attachment) }}" target="blank" style="margin:10px">{{ $leaveRecord->attachment?'Open the Attachment!' : '' }}</a></td>
			 
			 @if ($leaveRecord->status==0)
			 	<td >Pending</td> 
			 @endif
			 @if ($leaveRecord->status==1)
			 	<td >Approval</td> 
			 @endif
			 @if ($leaveRecord->status==2)
			 	<td >Reject </td> 
			 @endif 
		</tr>
		@endforeach 
	</tbody>
</table>