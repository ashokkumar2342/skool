@foreach ($students as $student)
	  
	<tr>
		 
		<td class="text-left">{{ $student->name }}</td>
		<td class="text-left">{{ $student->registration_no }}</td>
		<input type="hidden" name="registration_no" id="registration_no_{{ $student->id }}" value="{{ $student->registration_no }}">
		<td class="text-left">{{ $student->parents[0]->parentInfo->name or ''  }}</td>
		<td class="text-left">{{ $student->addressDetails->address->primary_mobile or ''}}</td>
		<td>
			<button type="button" class="btn btn-success btn-xs" data-table="student_fee_assign_show_table" button-click="btn_close" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentFeeAssign.search.list.select',App\Helper\MyFuncs::menuPermission()->id) }}'+'?registration_no='+$('#registration_no_{{ $student->id }}').val()+'&academic_year_id='+$('#academic_year_id').val(),'student_fee_assign_show')"><i class="fa fa-eye"></i></button> 
		</td>
	</tr>
@endforeach