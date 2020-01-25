<table class="table" id="employee_bank_details_list_table">
	<thead>
		<tr>
			<th>SR.No.</th>
			<th class="text-nowrap">Designation</th>
			<th class="text-nowrap">Employee Name</th>
			<th class="text-nowrap">Bank Name</th>
			<th class="text-nowrap">IFSC Code</th>
			<th class="text-nowrap">Account No.</th>
			<th class="text-nowrap">Branch</th>
			<th class="text-nowrap">Bank Address</th>
			<th class="text-nowrap">DD Payable Address</th>
		</tr>
	</thead>
	<tbody>
		@php
			$arrayId=1;
		@endphp
		@foreach ($employees as $employee)
				<tr>
					<td>{{ $arrayId++ }}</td> 
					<td>{{ $employee->designations->name or '' }}</td> 
					<td>{{ $employee->employees->name or '' }}</td> 
					<td>{{ $employee->banks->name or '' }}</td> 
					<td>{{ $employee->ifsc_code }}</td> 
					<td>{{ $employee->account_no }}</td> 
					<td>{{ $employee->branch }}</td> 
					<td>{{ $employee->bank_address }}</td> 
					<td>{{ $employee->dd_payable_address }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>