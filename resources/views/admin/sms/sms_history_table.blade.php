<table class="table table-bordered  table-striped" id="sms_history_datatable">
	<thead>
		<tr>
			<th class="text-nowrap">SMS Purpose</th> 
			@if ($conditionId==1)
			<th class="text-nowrap">Student Name</th> 
			@endif
			@if ($conditionId==3) 
			 <th class="text-nowrap">User Name</th> 
			@endif
			<th class="text-nowrap">Send Form</th>
			<th class="text-nowrap">Mobile No.</th>
			<th class="text-nowrap">SMS Count</th>
			<th class="text-nowrap">Submit Date</th>
			<th class="text-nowrap">Schedule Date Time</th>
			<th class="text-nowrap">Status</th>
			<th class="text-nowrap">SMS Text</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($sentSmsDetails as $sentSmsDetail)

				<tr>
					<td class="text-nowrap">{{ $sentSmsDetail->sd_purpose or ''}}</td>
					@if ($conditionId==0)
					@else
					 <td class="text-nowrap">{{ $sentSmsDetail->sd_to or ''}} </td>
					 	 
					 @endif 
					<td class="text-nowrap">{{ $sentSmsDetail->sd_from or ''}}</td>
					<td class="text-nowrap">{{ $sentSmsDetail->mobileno or ''}}</td>
					<td class="text-nowrap">{{ $sentSmsDetail->sms_count or ''}}</td>
					<td class="text-nowrap">{{ date('d-m-Y H:i:s',strtotime(  $sentSmsDetail->submit_date)) }}</td>
					<td class="text-nowrap">{{ date('d-m-Y H:i:s',strtotime(  $sentSmsDetail->schedule_date_time)) }}</td>
					<td class="text-nowrap">{{ $sentSmsDetail->sent_status }}</td>
					<td>{{ $sentSmsDetail->smstext }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>