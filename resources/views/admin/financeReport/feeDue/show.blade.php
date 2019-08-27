<div class="table-responsive"> 
<table id="student_fee_history_show_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Class/Section</th> 
			<th class="text-nowrap">Registration No</th>
			<th class="text-nowrap">Mobile No</th>
			<th class="text-nowrap">Father Name</th>
			{{-- <th class="text-nowrap">Admission fee</th>
			<th class="text-nowrap">Tuition Fee</th>
			<th class="text-nowrap">Registration Fees</th>
			<th class="text-nowrap">Admission Form Fees</th>
			<th class="text-nowrap">Bus Fees</th>
			<th class="text-nowrap">Meal</th>
			<th class="text-nowrap">Annual Charge</th>
	        <th class="text-nowrap">Activity Charges</th> --}}
			<th class="text-nowrap">Fee Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($StudentFeeDetails as $StudentFeeDetail)
			<tr>
				<td>{{ $StudentFeeDetail->students->name or '' }}</td>
				<td>{{ $StudentFeeDetail->students->classes->name or '' }}/{{ $StudentFeeDetail->students->sectionTypes->name or '' }}</td> 
				<td>{{ $StudentFeeDetail->students->registration_no or '' }}</td>
				<td>{{ $StudentFeeDetail->students->father_mobile or '' }}</td>
				<td>{{ $StudentFeeDetail->students->father_name or '' }}</td>
				{{-- <td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td> --}}
				 
				<td>@php
					$studentAmount=App\Model\StudentFeeDetail::where('student_id',$StudentFeeDetail->student_id)->whereMonth('last_date',$month)->get();
				    @endphp
				    {{$studentAmount->sum('fee_amount') }}
			</td>
			<td>
				
			 <a href="{{ route('admin.finance.report.fee.due.receipt',$StudentFeeDetail->student_id) }}" class="btn btn-success btn-xs" title="">Send Receipt</a>
			</td>
			</tr> 
		@endforeach
	</tbody>
</table>
</div>