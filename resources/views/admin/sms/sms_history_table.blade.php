<table class="table table-bordered  table-striped" id="sms_history_datatable">
	<thead>
		<tr>
			<th >Purpose</th> 
			@if ($conditionId==1)
			<th >Student Name</th> 
			@endif
			@if ($conditionId==3) 
			 <th>User Name</th> 
			@endif
			<th>Sender</th>
			<th>Mobile</th>
			<th>Count</th>
			<th>Submit Date</th>
			<th>Schedule Date</th>
			<th>SMS Text</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($sentSmsDetails as $sentSmsDetail)

				<tr style="{{ $sentSmsDetail->sent_status==0?'background-color:#f1f412':'background-color:#2cdd16' }}">
					<td>{{ $sentSmsDetail->sd_purpose or ''}}</td>
					@if ($conditionId==0)
					@else
					 <td>{{ $sentSmsDetail->sd_to or ''}} </td>
					 	 
					 @endif 
					<td>{{ $sentSmsDetail->sd_from or ''}}</td>
					<td>{{ $sentSmsDetail->mobileno or ''}}</td>
					<td>{{ $sentSmsDetail->sms_count or ''}}</td>
					<td>{{ date('d-m-Y H:i:s',strtotime(  $sentSmsDetail->submit_date)) }}</td>
					<td>{{ date('d-m-Y H:i:s',strtotime(  $sentSmsDetail->schedule_date_time)) }}</td>
					<td>{{ $sentSmsDetail->smstext }}</td>
					<td>{{ $sentSmsDetail->sent_status==0?'Pending' : 'Sent' }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>