 
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
		  			 <input type="checkbox" checked name="student_id[]" value="<?php echo e($student->id); ?>" style="display: none"> 
		  				 
		  			 
		  			<?php $__currentLoopData = $StudentFeeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $StudentFeeDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  				<tr>
		  					<td style="width: 250px"><?php echo e($StudentFeeDetail->feeStructureLastDates->feeStructures->name); ?></td>
		  					<td><?php echo e($StudentFeeDetail->fee_amount); ?></td> 
		  				</tr> 
		  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			<tr>
		  				<td>Concession</td>
		  				<td><?php echo e($StudentFeeDetails->sum('concession_amount')); ?></td>
		  			</tr>
		  			<tr>
		  				<td>Previous Balance </td>
		  				<td>0 </td>
		  			</tr>
		  			<tr>
		  				<td>Net Amount </td>
		  				<td><input type="hidden" name="net_amount" value="<?php echo e($netamount=$StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount')); ?>"><?php echo e($netamount=$StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount')); ?>

		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Amount Deposit 
		  				</td>
		  				<td>
		  					 <input type="text" name="deposit_amount" value="<?php echo e($StudentFeeDetails->sum('fee_amount') - $StudentFeeDetails->sum('concession_amount')); ?>">
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					Payment Mode 
		  				</td>
		  				<td>
		  					<select name="payment_mode" id="payment_mode" onchange="paymentmode($('#payment_mode').val())">
		  						<?php $__currentLoopData = App\Model\PaymentMode::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  							<option value="<?php echo e($mode->name); ?>"><?php echo e($mode->name); ?></option> 
		  						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
		 	 			<?php
		 	 			$sr=1; 
		 	 			$sib =0;
		 	 			?>
		 	 			<input type="hidden" name="month" value="<?php echo e($request->month); ?>">
		 	 			<input type="hidden" name="year" value="<?php echo e($request->year); ?>">
		 	 			<?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		 	 			<?php $studentSiblingFee =App\model\StudentFeeDetail::where('student_id',$sibling->siblings->id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get(); ?>
		 	 			<tr> 
		 	 				<td><input type="checkbox"  class="checkbox" name="student_id[]" value="<?php echo e($sibling->siblings->id); ?>"  > </td>
		 	 				<td> <?php echo e($sr++); ?> </td>
		 	 				<td><?php echo e($sibling->siblings->registration_no); ?></td>
		 	 				<td><?php echo e(isset($sibling->siblings->name) ? $sibling->siblings->name : ''); ?></td>
		 	 				<td><input type="hidden" name="" value="<?php echo e($sib +=$studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount')); ?>">
		 	 					<?php echo e($studentSiblingFee->sum('fee_amount')-$studentSiblingFee->sum('concession_amount')); ?>

		 	 				</td> 
		 	 			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		 	 			</tr>
		 	 		</tbody>
		 	 	</table>
		 	 	<h4>Grand Total : <?php echo e($netamount + $sib); ?></h4>
			 </div> 
 		</div> 
  </div>
  <div class="panel-footer text-center">
  	 <?php if($StudentFeeDetail->paid==0): ?>
  	 	 <button type="button" class="btn btn-success" onclick="feeCollectionSubmit()">Submit</button> 
   	
   	  
   	    <input type="checkbox" name="print" autocomplete="off"> Print

   	  </label>
   	  <?php else: ?>
   	   <button type="button" disabled="" class="btn btn-success">Paid</button>
  	 <?php endif; ?>
   	
   	  
  </div>
</div>
 	 
</form>
 
 