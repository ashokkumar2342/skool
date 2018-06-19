<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1> Student  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="<?php echo e(route('admin.student.form')); ?>" class="btn btn-info btn-sm" >Add Student</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>Registration No</th>
                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Father Mobile</th> 
                  <th>Mother Mobile</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($student->registration_no); ?></td>
               
                  <td><?php echo e($student->name); ?></td>
                  <td><?php echo e($student->father_name); ?></td>
                  <td><?php echo e($student->father_mobile); ?></td>
                  <td><?php echo e($student->mother_mobile); ?></td>
                   
                  <td align="center">
                   <a class="btn btn-primary btn-xs" title="View Student" href="<?php echo e(route('admin.student.view',$student->id)); ?>"><i class="fa fa-eye"></i></a> 
                    <a class="btn btn-warning btn-xs"  title="Edit Student" href="<?php echo e(route('admin.student.edit',$student->id)); ?>"><i class="fa fa-edit"></i> 
                    
                    <?php if(Auth::guard('admin')->user()->id == 1): ?>
                    <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="<?php echo e(route('admin.student.delete',$student->id)); ?>"><i class="fa fa-trash"></i></a> 
                    <?php endif; ?>
                    
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