<table class="table table-bordered  table-striped" id="sms_history_datatable">
	<thead>
		<tr>
			<th>SMS Purpose</th>
			<th>User Name</th>
			<th>Student Name</th>
			<th>Mobile No.</th>
			<th>Submit Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($sentSmsDetails as $sentSmsDetail)
				<tr>
					<td>{{ $sentSmsDetail->messagePurposes->name }}</td>
					<td>{{ $sentSmsDetail->admins->email or ''}} ({{ $sentSmsDetail->admins->first_name or ''}})</td>
					<td>{{ $sentSmsDetail->students->registration_no or ''}} ({{ $sentSmsDetail->students->name or ''}})</td>
					<td>{{ $sentSmsDetail->mobileno }}</td>
					<td>{{ date('d-m-Y H:i:s',strtotime(  $sentSmsDetail->submit_date)) }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>