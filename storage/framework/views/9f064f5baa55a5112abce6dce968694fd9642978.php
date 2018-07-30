 
 <div class="table-responsive">
  <table id="result_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;">
       <thead>
           <tr>
               <th> receipt no</th>
               <th>student name</th>
               <th>class</th>
               <th>roll no</th>
               <th>registration no</th>
               <th> father name</th>
               <th>receipt date</th>
               <th>receipt amount</th>
               <th>deposit amount</th>
               <th>balance amount</th>
               <th>payment mode</th>
               <th>payment mode date</th>
               <th>bank name</th>
               <th>on account</th>
               <th>Action</th>
              
           </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $cashbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashbook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                 <td><?php echo e($cashbook->receipt_no); ?></td>
                 <td><?php echo e($cashbook->student_name); ?></td>
                 <td><?php echo e($cashbook->class); ?></td>
                 <td><?php echo e($cashbook->roll_no); ?></td>
                 <td><?php echo e($cashbook->registration_no); ?></td>
                 <td><?php echo e($cashbook->father_name); ?></td>
                 <td><?php echo e($cashbook->receipt_date); ?></td>
                 <td><?php echo e($cashbook->receipt_amount); ?></td>
                 <td><?php echo e($cashbook->deposit_amount); ?></td>
                 <td><?php echo e($cashbook->balance_amount); ?></td>
                 <td><?php echo e($cashbook->payment_mode); ?></td>
                 <td><?php echo e($cashbook->payment_mode_date); ?></td>
                 <td><?php echo e($cashbook->bank_name); ?></td>
                 <td><?php echo e($cashbook->on_account); ?></td> 
                 <td>
                  <a href="<?php echo e(route('admin.cashbook.print',$cashbook->id)); ?>" target="blank" class="btn btn-success btn-xs" title="print"><i class="fa fa-print "></i></a>
                  <a onclick="callAjaxUrl('<?php echo e(route('admin.cashbook.cancel',$cashbook->id)); ?>')" href="javascript:"   class="btn btn-danger btn-xs" title="Reciept Cancel"><i class="fa fa-window-close "></i></a>
                 </td>
             </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
       </tbody>
   </table>
 </div>
   