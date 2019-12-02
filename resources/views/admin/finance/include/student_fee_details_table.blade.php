<table class="table" id="student_fee_datatable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Fee Structure Last Date</th>
			<th>Fee Amount</th>
			<th>Concession Amount</th> 
		</tr>
	</thead>
	<tbody>
		@foreach ($studentFeeDetails as $studentFeeDetail)
		 	<tr>
		 		<td>{{ $studentFeeDetail->students->name or '' }}</td>
		 		<td>{{ $studentFeeDetail->feeStructureLastDates->feeStructures->name }}</td>
		 		<td>{{ $studentFeeDetail->fee_amount }}</td>
		 		<td>{{ $studentFeeDetail->concession_amount }}</td>  
		 	</tr>
		@endforeach
		
	</tbody>
</table>