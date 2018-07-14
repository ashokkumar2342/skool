<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  
	<tr onclick="studentDetail(<?php echo e($student->id); ?>)">
		<td><?php echo e($student->id); ?></td>
		<td><?php echo e($student->name); ?></td>
		<td><?php echo e($student->registration_no); ?></td>
		<td><?php echo e($student->father_name); ?></td>
		<td><?php echo e($student->mother_name); ?></td>
		<td> <button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button> </td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>