 <div class="table-responsive"> 
 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
	<thead>
		<tr>
			<th class="text-nowrap">Sr.No.</th>
			<th class="text-nowrap">User Name</th>
			<th class="text-nowrap">Qualification</th>
			<th class="text-nowrap">Date of Joining</th>
			<th class="text-nowrap">Date of Resignation</th>
			<th class="text-nowrap">Date of Confirmation</th>
			<th class="text-nowrap">Group</th> 
			<th class="text-nowrap">Formalities</th>
			<th class="text-nowrap">Offer Acceptance</th>
			<th class="text-nowrap">Probation Period</th>
			<th class="text-nowrap">Salary</th>
			<th class="text-nowrap">Emergency No.</th>
			<th class="text-nowrap">Pan No.</th>
			<th class="text-nowrap">Date of Birth</th>
			 
		</tr>
	</thead>
	<tbody>
		@php
			$arryId=1;
		@endphp
		@foreach ($employees as $employee)
			 <tr>
			 	<td class="text-nowrap"></td>
			 	<td class="text-nowrap">{{$employee->qualification}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_joining}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_resignation}}</td>              
				<td class="text-nowrap">{{$employee->date_of_confirmation}}</td>                  
				<td class="text-nowrap">{{$employee->group_id}}</td>                 
				<td class="text-nowrap">{{$employee->formalities}}</td>                  
				<td class="text-nowrap">{{$employee->offer_acceptance}}</td>                 
				<td class="text-nowrap">{{$employee->probation_period}}</td>                  
				<td class="text-nowrap">{{$employee->salary}}</td>                  
				<td class="text-nowrap">{{$employee->emergency_number}}</td>                  
				<td class="text-nowrap">{{$employee->pan_number}}</td>                 
				<td class="text-nowrap">{{$employee->date_of_birth}}</td>
				<td class="text-nowrap">
					<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.employee.addform',Crypt::encrypt($employee->id))}}')"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('admin.hr.employee.delete',Crypt::encrypt($employee->id)) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
					
				</td>
				 
			 </tr>
		@endforeach
		 
	</tbody>
</table>
</div>