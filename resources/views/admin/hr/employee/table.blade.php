 <div class="table-responsive"> 
 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
	<thead>
		<tr>
			<th class="text-nowrap">Sr.No.</th>
			<th class="text-nowrap">User Name</th>
			<th class="text-nowrap">Qualification</th>
			<th class="text-nowrap">Experience</th>
			<th class="text-nowrap">Date of Joining</th>
			<th class="text-nowrap">Date of Resignation</th>
			<th class="text-nowrap">Date of Confirmation</th>
			<th class="text-nowrap">Department</th> 
			<th class="text-nowrap">Group</th>
			<th class="text-nowrap">Probation Period</th>
			<th class="text-nowrap">Notice Period</th>
			<th class="text-nowrap">Salary</th>
			<th class="text-nowrap">Emergency No.</th>
			<th class="text-nowrap">Pan No.</th>
			<th class="text-nowrap">Account No.</th>
			<th class="text-nowrap">Bank Name</th>
			<th class="text-nowrap">Ifsc Code</th>
			<th class="text-nowrap">PF Account No.</th>
			<th class="text-nowrap">Universal Account No.</th>
			<th class="text-nowrap">Father Name</th>
			<th class="text-nowrap">Current Address</th>
			<th class="text-nowrap">Permanent Address</th>
			<th class="text-nowrap">Action</th>
			
			 
		</tr>
	</thead>
	<tbody>
		@php
			$arryId=1;
		@endphp
		@foreach ($employees as $employee)
			 <tr>
			 	<td class="text-nowrap">{{ $arryId++ }}</td>
			 	<td class="text-nowrap">{{$employee->admins->first_name or ''}}</td>                  
			 	<td class="text-nowrap">{{$employee->qualification}}</td>                  
			 	<td class="text-nowrap">{{$employee->experiences->name or ''}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_joining}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_resignation}}</td>              
				<td class="text-nowrap">{{$employee->date_of_confirmation}}</td>                  
				<td class="text-nowrap">{{$employee->departments->name or ''}}</td>                  
				<td class="text-nowrap">{{$employee->groups->name or ''}}</td>                 
				<td class="text-nowrap">{{$employee->probation_period}}</td>                  
				<td class="text-nowrap">{{$employee->notice_period}}</td>                  
				<td class="text-nowrap">{{$employee->salary}}</td>                  
				<td class="text-nowrap">{{$employee->emergency_number}}</td>                  
				<td class="text-nowrap">{{$employee->pan_number}}</td>                 
				<td class="text-nowrap">{{$employee->account_number}}</td>                 
				<td class="text-nowrap">{{$employee->bank_name}}</td>                 
				<td class="text-nowrap">{{$employee->ifsc_code}}</td>                 
				<td class="text-nowrap">{{$employee->pf_account_number}}</td>                 
				<td class="text-nowrap">{{$employee->un_number}}</td>                 
				<td class="text-nowrap">{{$employee->father_name}}</td>                  
				<td class="text-nowrap">{{$employee->current_address}}</td>                 
				<td class="text-nowrap">{{$employee->permanent_address}}</td> 
				<td class="text-nowrap">
					<a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.employee.addform',Crypt::encrypt($employee->id))}}')"><i class="fa fa-edit"></i></a>

                    <a onclick="callAjax(this,'{{ route('admin.hr.employee.delete',Crypt::encrypt($employee->id)) }}')" button-click="btn_event_type_table_show" success-popup="true" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					
				</td>
				 
			 </tr>
		@endforeach
		 
	</tbody>
</table>
</div>