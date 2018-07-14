
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
    
    <select name="month" class="form-control">
      <option value="1">Jan</option>
      <option value="2">Feb</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">Jun</option>
      <option value="7">July</option> 
    </select>
     <select name="year" class="form-control">
      <option value="2018">2018</option>
      <option value="2019">2019</option> 
    </select>
  </div> 
  <button type="button" class="btn btn-warning" onclick="callAjax()">Show</button>
</form>
 
 