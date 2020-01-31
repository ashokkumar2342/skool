<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Employee Name</th>
			<th>Basic Salary</th>
			<th>From Date</th>
			<th>To Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($EmployeeBasicSalarys as $EmployeeBasicSalary)
		<tr>
			<td>{{ $EmployeeBasicSalary->employees->name or ''}}</td>
			<td>{{ $EmployeeBasicSalary->basic_salary or ''}}</td>
			<td>{{ date('d-m-Y',strtotime($EmployeeBasicSalary->from_date))}}</td>
			<td>{{ date('d-m-Y',strtotime($EmployeeBasicSalary->to_date))}}</td>
		</tr>
			 
		@endforeach
	</tbody>
</table>