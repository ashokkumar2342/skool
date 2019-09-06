@php
	$paid=0;
	$concession_amount=0;
	$net_amount=0;
@endphp
<div class="table-responsive"> 
<table id="student_fee_history_show_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;"> 
	<thead>
		  			   <tr>
		  			   	    <th>Student Name</th>
			  				@foreach ($FeeDetails as $feeName =>$FeeDetail) 
					  			@php
					  				$concession_amount+=$FeeDetail->sum('concession_amount');
					  				$net_amount+=$FeeDetail->sum('fee_amount')+$FeeDetail->sum('concession_amount');
					  			@endphp
			  				 
			  				      <th class="text-nowrap">
			  						 	{{ $feeName}}  
			  					 </th>  
			  			        @endforeach
			  			        <th>Total Amount</th>
		  				</tr> 
		  			 
		  		</thead>
		  		<tbody>
		  		       <tr> 
		  		       	    <td></td>
				  			@foreach ($FeeDetails as $feeName =>$FeeDetail) 
				  			@php
				  				$concession_amount+=$FeeDetail->sum('concession_amount');
				  				$net_amount+=$FeeDetail->sum('fee_amount')+$FeeDetail->sum('concession_amount');
				  			@endphp
		  				  
					     		 <td> 
					 			    {{ $FeeDetail->sum('fee_amount')}}  
					 		     </td> 
		  			        @endforeach
					 		      <td> 
					 			    {{$net_amount }}
					 		     </td> 
		  				</tr> 
		  		</tbody>
	 
				
			 {{-- <a href="{{ route('admin.finance.report.fee.due.receipt',$StudentFeeDetail->student_id) }}" class="btn btn-success btn-xs" title="">Send Receipt</a> --}}
			 
			 
		 
	 
</table>
</div>