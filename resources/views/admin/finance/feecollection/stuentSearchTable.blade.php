@foreach ($students as $student)
	  
	<tr>
		 
		<td class="text-left">{{ $student->name }}</td>
		<td class="text-left">{{ $student->registration_no }}</td>
		<input type="hidden" name="registration_no" id="registration_no{{ $student->id }}" value="{{ $student->registration_no }}">
		<td class="text-left">{{ $student->parents[0]->parentInfo->name or ''  }}</td>
		<td class="text-left">{{ $student->addressDetails->address->primary_mobile or ''}}</td>
		<td>
			<button type="button" class="btn btn-success btn-xs" button-click="btn_close" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentFeeCollection.showFeeDetail') }}'+'?registration_no='+$('#registration_no{{ $student->id }}').val()+'&fee_paid_upto='+$('#fee_paid_upto').val(),'fee_collection_detail');RegistrationNoFill('{{ $student->registration_no }}')"><i class="fa fa-eye"></i></button> 
		</td>
	</tr>
@endforeach