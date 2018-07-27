
<table class="table border table-striped table-bordered">
	 
	<thead>
		<tr>
			<th>name</th>
			<th>Registration No</th>
			<th>Father's Name</th>
			<th>Mother's Name</th>
			<th>Address</th>
			 
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo e($student->name); ?></td>
			<td><?php echo e($student->registration_no); ?></td>
			<td><?php echo e($student->father_name); ?></td>
			<td><?php echo e($student->mother_name); ?></td>
			<td><?php echo e($student->p_address); ?></td>
		</tr>
	</tbody>
</table>
<form class="form-inline" id="show_fee_detail_form">
  <?php echo e(csrf_field()); ?>  
  <div class="form-group">
    <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
    <label for="email">Fee Paid Upto:</label> 
    <?php echo Form::select('month',[
    	'1'=>'Jan',
    	'2'=>'Feb',
    	'3'=>'March',
    	'4'=>'April',
    	'5'=>'May',
    	'6'=>'Jun',
    	'7'=>'July',
    	'8'=>'Aug',
    	'9'=>'Sep',
    	'10'=>'Oct',
    	'11'=>'Nov',
    	'12'=>'Dec',
    	], $defultDate->month, ['class'=>'form-control','placeholder'=>'Select Month','required']); ?>

   
      
    <?php echo Form::select('year',[
    	'2018'=>'2018',
    	'2019'=>'2019',
    	
    	], $defultDate->year, ['class'=>'form-control','placeholder'=>'Select Year','required']); ?>

  </div> 
  <button type="button" class="btn btn-warning" onclick="callAjax()">Show</button>
</form>
 
 