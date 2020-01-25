 <div class="table-responsive"> 
 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
	<thead>
		<tr>
			<th class="text-nowrap">Sr.No.</th>
			<th class="text-nowrap">Code</th>
			<th class="text-nowrap">Date of Joining</th>
			<th class="text-nowrap">Department</th> 
			<th class="text-nowrap">Designation</th> 
			<th class="text-nowrap">Group</th>
			<th class="text-nowrap">Qualification</th>
			<th class="text-nowrap">Experience</th> 
			<th class="text-nowrap">Role</th>
			<th class="text-nowrap">Name</th>
			<th class="text-nowrap">Last Name</th>
			<th class="text-nowrap">Date of Birth</th>
			<th class="text-nowrap">Gender</th>
			<th class="text-nowrap">Aadhaar No.</th>
			<th class="text-nowrap">Pan No.</th>
			<th class="text-nowrap">PF Account No.</th>
			<th class="text-nowrap">ESI</th>
			<th class="text-nowrap">Mobile No.</th>
			<th class="text-nowrap">Contact No.</th>
			<th class="text-nowrap">Email</th>
			<th class="text-nowrap">Country</th>
			<th class="text-nowrap">State</th>
			<th class="text-nowrap">City</th>
			<th class="text-nowrap">Current Address</th>
			<th class="text-nowrap">Permanent Address</th>
			<th class="text-nowrap">Pincode</th>
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
			 	<td class="text-nowrap">{{$employee->code}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_joining? date('d-M-Y', strtotime($employee->date_of_joining)) : null}}</td>                  
				<td class="text-nowrap">{{$employee->departments->name or ''}}</td>                  
				<td class="text-nowrap">{{$employee->designations->name or ''}}</td>                  
				<td class="text-nowrap">{{$employee->groups->name or ''}}</td>                 
			 	<td class="text-nowrap">{{$employee->qualification}}</td>                  
			 	<td class="text-nowrap">{{$employee->experiences->name or ''}}</td> 
			 	<td class="text-nowrap">{{$employee->admins->name or ''}}</td>                  
			 	<td class="text-nowrap">{{$employee->name or ''}}</td>                  
			 	<td class="text-nowrap">{{$employee->last_name or ''}}</td>                  
				<td class="text-nowrap">{{$employee->date_of_birth? date('d-M-Y', strtotime($employee->date_of_birth)) : null}}
				</td>          
				<td class="text-nowrap">{{$employee->gender_id}}</td>                  
				<td class="text-nowrap">{{$employee->aadhaar_no}}</td>                  
				<td class="text-nowrap">{{$employee->pan_number}}</td>                  
				<td class="text-nowrap">{{$employee->pf_account_number}}</td>                  
				<td class="text-nowrap">{{$employee->esi}}</td>                 
				<td class="text-nowrap">{{$employee->mobile_no}}</td>                 
				<td class="text-nowrap">{{$employee->contact_no}}</td>                 
				<td class="text-nowrap">{{$employee->email}}</td>                 
				<td class="text-nowrap">{{$employee->country==1?'India':'Other Country'}}</td>                 
				<td class="text-nowrap">{{$employee->state}}</td>                 
				<td class="text-nowrap">{{$employee->city}}</td>                  
				<td class="text-nowrap">{{$employee->pincode}}</td>                  
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