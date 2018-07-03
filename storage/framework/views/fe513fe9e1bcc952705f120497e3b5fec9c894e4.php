<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Certificate Issue Apply  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="<?php echo e(route('admin.student.certificateIssu.apply')); ?>" class="btn btn-info btn-sm" >Apply</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Sn. No</th>
                  <th>Registration No</th>
                  <th>Certificate type</th>
                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Reason</th> 
                  <th>attachment</th> 
                  <th>Status</th> 
                  <th>Remarks</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(++$loop->index); ?></td>                  
                  <td><?php echo e($certificate->students->registration_no); ?></td>               
                  <td><?php echo e($certificate->certificate_type); ?></td>               
                  <td><?php echo e($certificate->students->name); ?></td>               
                  <td><?php echo e($certificate->students->father_name); ?></td>               
                  <td><?php echo e($certificate->students->father_mobile); ?></td>               
                  <td><?php echo e($certificate->reason); ?></td>
                  <td><?php echo e($certificate->attachment?'Yes':'No'); ?></td>
                  <td> <?php if($certificate->status == 1): ?>
                          <button class="btn btn-primary btn-xs">On Active</button> 
                       <?php elseif($certificate->status == 2): ?>
                         <button class="btn btn-warning btn-xs">Pending</button> 
                       <?php elseif($certificate->status == 3): ?>
                        <button class="btn btn-success btn-xs">Approval</button>
                       <?php elseif($certificate->status == 4): ?>
                        <button class="btn btn-danger btn-xs">Cancel</button> 
                       <?php endif; ?> 
                 </td>
                  <td><button class="btn_add_remarks btn btn-success btn-xs" data-id="<?php echo e($certificate->id); ?>">Remarks</button></td>
                   
                  
                  <td width="200">
                   <a class="btn btn-warning btn-xs" title="View certificate" href="<?php echo e(route('admin.student.attachment.virify',$certificate->id)); ?>">Verify</a>
                   <a class="btn btn-success btn-xs" title="View certificate" href="<?php echo e(route('admin.student.attachment.approval',$certificate->id)); ?>">Approval</a>                   

                   <a class="btn btn-primary btn-xs" title="View certificate" href="<?php echo e(route('admin.student.attachment.download',$certificate->id)); ?>"><i class="fa fa-download"></i></a> 

                    <a class="btn btn-warning btn-xs"  title="Edit certificate" href="<?php echo e(route('admin.student.certificateIssu.edit',$certificate->id)); ?>"><i class="fa fa-edit"></i> 

                    <a class="btn btn-info btn-xs"  title="view certificate" href="<?php echo e(route('admin.student.certificateIssu.show',$certificate->id)); ?>" style="margin-left: 3px;"><i class="fa fa-sticky-note"></i>
                     
                   
                    
                  </td>

                 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button --> 
<?php echo $__env->make('admin.certificate.remarks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<?php $__env->stopPush(); ?>
 <?php $__env->startPush('scripts'); ?>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>