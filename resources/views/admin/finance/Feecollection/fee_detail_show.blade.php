 
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
		  				 
		  			 
		  			@foreach ($StudentFeeDetails as $StudentFeeDetail)
		  				<tr>
		  					<td style="width: 250px">{{ $StudentFeeDetail->feeStructureLastDates->feeStructures->name }}</td>
		  					<td>{{ $StudentFeeDetail->fee_amount}}</td> 
		  				</tr> 
		  			@endforeach
		  			<tr>
		  				<td>Concession</td>
		  				<td>{{ $StudentFeeDetails->sum('concession_amount') }}</td>
		  			</tr>
		  			<tr>
		  				<td>Previous Balance </td>
		  				<td>0 </td>
		  			</tr>
		  			<tr>
		  				<td>Net Amount </td>
		  				<td><input type="hidden" name="net_amount" value="{{ $netamount=$StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount') }}">{{ $netamount=$StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount') }}
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Amount Deposit 
		  				</td>
		  				<td>
		  					 <input type="text" name="deposit_amount" value="{{ $StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount') }}">
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Payment Mode 
		  				</td>
		  				<td>
		  					<select name="payment_mode" id="payment_mode" onchange="paymentmode($('#payment_mode').val())">
		  						@foreach (App\Model\PaymentMode::all() as $mode)
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
		 	 			<?php $studentSiblingFee =App\model\StudentFeeDetail::where('student_id',$sibling->siblings->id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get(); ?>
		 	 			<tr> 
		 	 				<td><input type="checkbox"  class="checkbox" name="student_id[]" value="{{ $sibling->siblings->id }}"  > </td>
		 	 				<td> {{ $sr++ }} </td>
		 	 				<td>{{ $sibling->siblings->registration_no  }}</td>
		 	 				<td>{{ $sibling->siblings->name  or ''}}</td>
		 	 				<td><input type="hidden" name="" value="{{ $sib +=$studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount') }}">
		 	 					{{ $studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount') }}
		 	 				</td> 
		 	 			@endforeach	
		 	 			</tr>
		 	 		</tbody>
		 	 	</table>
		 	 	<h4>Grand Total : {{ $netamount + $sib }}</h4>
			 </div> 
 		</div> 
  </div>
  <div class="panel-footer text-center">
  	 @if ($StudentFeeDetail->paid==0)
  	 	 <button type="button" class="btn btn-success" onclick="feeCollectionSubmit()">Submit</button> 
   	{{-- <button type="button" class="btn btn-success" onclick="feeCollectionPrint()">Print</button>  --}}
   	  {{-- <label style="margin-left: 10px;" class="btn btn-default"> --}}
   	    <input type="checkbox" name="print" autocomplete="off"> Print

   	  </label>
   	  @else
   	   <button type="button" disabled="" class="btn btn-success">Paid</button>
  	 @endif
   	
   	  
  </div>
</div>
 	 
</form>
 
 