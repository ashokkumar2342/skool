 
 <div class="table-responsive">
  <table id="result_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;">
       <thead>
           <tr>
                
               <th>student name</th>
               <th>class</th>
               <th>roll no</th>
               <th>registration no</th>
               <th> father name</th>
               
               <th>Fee Amount</th>
          
              
           </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $feeDues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeDue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                 
                 <td><?php echo e($feeDue->students->name); ?></td>
                 <td><?php echo e($feeDue->students->classes->name); ?></td>
                 <td><?php echo e($feeDue->students->roll_no); ?></td>
                 <td><?php echo e($feeDue->students->registration_no); ?></td>
                 <td><?php echo e($feeDue->students->father_name); ?></td> 
                 <td><?php echo e($feeDue->fee_amount); ?></td>
                  
                
             </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
       </tbody>
   </table>
 </div>
   