<table class="table" id="absent_fine_details_datatable">
	<thead>
		<tr>
			<th>Registration No.</th>
			<th>Roll No.</th>
			<th>Student Name</th>
			<th>Total Days</th>
			<th>Total Present</th>
			<th>Total Absent</th>
			<th>Total Leave</th>
			<th>Fine Amount</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($absentFineDetails as $absentFineDetail)
		     @php
		     	$readonly='';
		     	$studentPaidId=App\Model\StudentFineDetail::where('paid',1)->get();
		     	if(!empty($studentPaidId)){
			     	if($studentPaidId->first()->student_id==$absentFineDetail->id){
	                   $readonly='readonly';   
			     	} 
		     	}  
		     @endphp
					<tr>
						<td>{{ $absentFineDetail->registration_no }}</td>
						<td>{{ $absentFineDetail->roll_no }}</td>
						<td>{{ $absentFineDetail->name }}</td>
						<td>{{ $absentFineDetail->total_days }}</td>
						<td>{{ $absentFineDetail->total_present }}</td>
						<td>{{ $absentFineDetail->total_absent }}</td>
						<td>{{ $absentFineDetail->total_leave }}</td>
						<td>
							<input type="text" {{ $readonly }} class="form-control" name="amount[{{ $absentFineDetail->id }}]" value="{{ $absentFineDetail->fine_amt }}" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
							<input type="hidden" name="for_month" value="{{ $for_month }}" >
							<input type="hidden" name="for_year" value="{{ $for_year }}" >
						</td>
					</tr>
		@endforeach
	</tbody>
</table>
<button type="submit" class="btn btn-success pull-right" style="margin-right: 110px">Submit</button>