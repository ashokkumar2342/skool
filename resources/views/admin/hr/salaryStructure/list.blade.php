<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Employee Name</th>
			<th>Allowance</th>
			<th>Amount</th>
			<th>Fix/Percent</th>
			<th>From Date</th>
			<th>To Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($EmployeeSalaryStructures as $EmployeeSalaryStructure)
		<tr>
			<td>{{ $EmployeeSalaryStructure->employees->name or ''}}</td>
			<td>{{ $EmployeeSalaryStructure->allowances->allowance or ''}}</td>
			<td>{{ $EmployeeSalaryStructure->amount or ''}}</td>
			<td>{{ $EmployeeSalaryStructure->fix_or_percent==1?'Fix':'Percent'}}</td>
			<td>{{ date('d-m-Y',strtotime($EmployeeSalaryStructure->from_date))}}</td>
			<td>{{ date('d-m-Y',strtotime($EmployeeSalaryStructure->to_date))}}</td>
		</tr>
			 
		@endforeach
	</tbody>
</table>