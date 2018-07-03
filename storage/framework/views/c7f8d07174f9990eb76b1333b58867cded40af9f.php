<?php $__env->startSection('body'); ?>
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Activity List</h3>
               


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              
              </form>

              </body>
              </html>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sn</th>                
                  <th>User Name</th>
                  <th>Message</th>
                  <th>Date And Time</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($activity->id); ?></td>
                  <td><?php echo e($activity->admins->first_name); ?></td>
                  <td><?php echo e($activity->message); ?></td>
                  <td><?php echo e($activity->created_at->diffForHumans()); ?></td>
                  <td align="center">  
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="<?php echo e(route('admin.activity.delete',$activity->id)); ?>"><i class="fa fa-trash"></i></a>
                    
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

 
       

  </div>
</div>

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