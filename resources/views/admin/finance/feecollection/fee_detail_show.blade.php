 
@php
	$paid=0;
	$concession_amount=0;
	$net_amount=0;
@endphp
<form  method="post" id="fee_collection_submit_form" accept-charset="utf-8">

<div class="panel panel-default" style="margin-top: 20px">
  <div class="panel-heading">Fee Details</div>
  <div class="panel-body">
 	<div class="row">
 		<div class="col-lg-6">
 			<table class="table border table-striped table-bordered"> 
		  		<thead>
		  			<tr>
		  				<th>Fee Name</th>
		  				<th>Amount</th> 
		  			</tr>
		  		</thead>
		  		<tbody>
		  			 <input type="checkbox" checked name="student_id[]" value="{{ $student->id }}" style="display: none">  
		  			 <input type="hidden"  name="toDate" value="{{ $toDate }}">  
		  			  
		  			@foreach ($FeeDetails as $feeName =>$FeeDetail) 
		  			@php
		  				$concession_amount+=$FeeDetail->sum('concession_amount');
		  				$net_amount+=$FeeDetail->sum('fee_amount')-$FeeDetail->sum('concession_amount');
		  			@endphp
		  				<tr>  
		  				  <td style="width: 250px">
		  						 	{{ $feeName}}  
		  					 </td>  
					     			<td> 
					 			    {{ $FeeDetail->sum('fee_amount')}}  
					 		     </td> 
		  				</tr> 
		  				 
		  			@endforeach
		  			@php
		  				$net_amount+=$BalanceAmount;
		  			@endphp
		  			<tr>
		  				<td>Concession</td>
		  				<td>
		  					<input type="hidden" name="concession" value="{{ $concession_amount }}">{{ $concession_amount }}
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>Previous Balance </td>
		  				<td>{{ $BalanceAmount }}
		  					<input type="hidden" name="previous_balance" value="{{ $BalanceAmount }}">
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Fine Scheme
		  				</td>
		  				<td>
		  					<select name="fine_amount" id="fine_amount" onchange="($('#net_amount').val(parseInt({{ $net_amount }})+parseInt(this.value)),$('#deposit_amount').val(parseInt({{ $net_amount }})+parseInt(this.value)))">
		  						<option disabled selected>Select </option> 
		  						@foreach ($FineSchemes as $FineScheme)
		  							<option value="{{ $FineScheme->fine_amount1 }}">Days After {{ $FineScheme->day_after1 }}</option> 
		  						@endforeach 
		  					</select> 
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>Net Amount </td>
		  				<td> 
		  					<input type="text" name="net_amount" id="net_amount" value="{{ $net_amount }}" readonly>
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Amount Deposit 
		  				</td>
		  				<td>
		  					 <input type="text" name="deposit_amount" id="deposit_amount" onkeyup="$('#fee_balance').val({{ $net_amount }}-this.value)" value="{{ $net_amount }}" >
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Balance 
		  				</td>
		  				<td>
		  					 <input type="text" name="fee_balance" value="0" id="fee_balance" readonly="">
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Payment Mode 
		  				</td>
		  				<td>
		  					<select name="payment_mode" id="payment_mode" onchange="paymentmode($('#payment_mode').val())">
		  						@foreach ($paymentModes as $mode)
		  							<option value="{{ $mode->name }}">{{ $mode->name }}</option> 
		  						@endforeach 
		  					</select> 
		  				</td>
		  			</tr>
		  			<tr id="payment_mode_detail" style="display: none" colspan="2">
		  				 
		  				<td colspan="2">
		  					<input type="text" name="refrence_no" placeholder="Refrence No">
		  					<input type="text" name="payment_mode_date" placeholder="Date">
		  					<input type="text" name="bank_name" placeholder="Bank Name">
		  				</td>
		  				 
		  			</tr>
		  		</tbody>
		  	</table>
 		</div>
 		<div class="col-lg-6"> 
 			<input type="checkbox" class="checked_all" name="sibling" id="siblig_chk" onclick="showHide()">
			 Sibling Details
			 <div id="siblig_div" style="display: none;">
		 		<table class="table border table-striped table-bordered"> 
		 	 		<thead>
		 	 			<tr>
		 	 				<th>#</th>
		 	 				<th>Sr</th>
		 	 				<th>Registration No</th> 
		 	 				<th>Name</th> 
		 	 				<th>Amount</th> 
		 	 			</tr>
		 	 		</thead>
		 	 		<tbody>
		 	 			@php
		 	 			$sr=1; 
		 	 			$sib =0;
		 	 			@endphp
		 	 			<input type="hidden" name="month" value="{{ $request->month }}">
		 	 			<input type="hidden" name="year" value="{{ $request->year }}">
		 	 			@foreach ($siblings as $sibling) 
		 	 			@php
	 	 				$StudentFeeDetail = new App\model\StudentFeeDetail(); 
	 	 				$studentSiblingFee = $StudentFeeDetail->getFeeDetailsByUpTodate($toDate,$sibling->studentSiblings->id); 
		 	 			@endphp 
		 	 			<tr> 
		 	 				<td><input type="checkbox"  class="checkbox" name="student_id[]" value="{{ $sibling->studentSiblings->id }}"  > </td>
		 	 				<td> {{ $sr++ }} </td>
		 	 				<td>{{ $sibling->studentSiblings->registration_no or '' }}</td>
		 	 				<td>{{ $sibling->studentSiblings->name  or ''}}</td>
		 	 				<td><input type="hidden" name="" value="{{ $sib +=$studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount') }}">
		 	 					{{ $studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount') }}
		 	 				</td> 
		 	 			@endforeach	
		 	 			</tr>
		 	 		</tbody>
		 	 	</table>
		 	 	<h4>Grand Total : {{ $net_amount + $sib }}</h4>
			 </div> 
 		</div> 
  </div>
  <div class="panel-footer text-center">
  	 @if ($paid==0)
  	 	 <button type="button" id="feeCollectionSubmit_btn" class="btn btn-success" onclick="feeCollectionSubmit()">Submit</button> 
   	{{-- <button type="button" class="btn btn-success" onclick="feeCollectionPrint()">Print</button>  --}}
   	  {{-- <label style="margin-left: 10px;" class="btn btn-default"> --}}
   	    <input type="checkbox" name="print" checked autocomplete="off" style="margin-left: 20px"> Print

   	  </label>
   	  @else
   	   <button type="button" disabled="" class="btn btn-success">Paid</button>
  	 @endif
   	
   	  
  </div>
</div>
 	 
</form>
 
 