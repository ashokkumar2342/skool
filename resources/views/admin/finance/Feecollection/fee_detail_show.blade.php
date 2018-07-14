

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
		  			@foreach ($StudentFeeDetails as $StudentFeeDetail)
		  				<tr>
		  					<td style="width: 250px">{{ $StudentFeeDetail->feeStructureLastDates->feeStructures->name }}</td>
		  					<td><input type="text" name="" value="{{ $StudentFeeDetail->fee_amount}}"></td>
		  					 
		  				</tr> 
		  			@endforeach
		  			<tr>
		  				<td>Concession</td>
		  				<td>
		  					<input type="text" name="" value="{{ $StudentFeeDetails->sum('concession_amount') }}"> 
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Previous Balance
		  				</td>
		  				<td>
		  					<input type="text" name="" value="0"> 
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Net Amount 
		  				</td>
		  				<td>
		  					<input type="text" name="" value="{{ $StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount') }}"> 
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Amount Deposit 
		  				</td>
		  				<td>
		  					 <input type="text" name="amount_deposit" >
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Payment Mode 
		  				</td>
		  				<td>
		  					<select name="payment_mode">
		  						@foreach (App\Model\PaymentMode::all() as $mode)
		  							<option value="">{{ $mode->name }}</option> 
		  						@endforeach 
		  					</select>
		  				</td>
		  			</tr>
		  		</tbody>
		  	</table>
 		</div>
 		<div class="col-lg-6"> 
 			<input type="checkbox" name="sibling" id="siblig_chk" onclick="showHide()">
			 Sibling Details
			 <div id="siblig_div" style="display: none;">
			 		<table class="table border table-striped table-bordered"> 
			 	 		<thead>
			 	 			<tr>
			 	 				<th>Sr</th>
			 	 				<th>Registration No</th> 
			 	 				<th>Name</th> 
			 	 				<th>Amount</th> 
			 	 			</tr>
			 	 		</thead>
			 	 		<tbody>
			 	 			@php
			 	 			$sr=1; 
			 	 			@endphp
			 	 			@foreach ($siblings as $sibling)
			 	 				<td>{{ $sr++ }} </td>
			 	 				<td>{{ $sibling->siblings->registration_no  }}</td>
			 	 				<td>{{ $sibling->siblings->name  or ''}}</td>
			 	 				<td></td>
			 	 			@endforeach
			 	 			<tr>
			 	 				
			 	 			</tr>
			 	 		</tbody>
			 	 	</table>
			 </div>
			
 		</div>
 	 
  	
  </div>
  <div class="panel-footer">
   
  </div>
</div>
 
 
 