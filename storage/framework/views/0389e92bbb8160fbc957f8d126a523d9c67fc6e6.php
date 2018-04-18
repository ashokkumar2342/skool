<?php $__env->startSection('body'); ?>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <div class="row">
                  <div class="col-md-6">
                   <h3 class="box-title">Minu List</h3>                    
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="<?php echo e(route('admin.account.list')); ?>" title="back" class="btn btn-success">Back</a>                    
                  </div>
              </div>       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>                  
                  <th>Minu Name</th>                   
                  <th>R - W - D</th>                  
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $minus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $minu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($minu->id); ?></td>
                  <td><?php echo e($minu->minutypes->name); ?></td>                  
                  <td>                   
                  <a href="<?php echo e(route('admin.minu.r_status',$minu->id)); ?>" data-parent="tr" class="label <?php echo e(($minu->r_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($minu->r_status == 1)? 'A' : 'D'); ?></a>
                  <a href="<?php echo e(route('admin.minu.w_status',$minu->id)); ?>" data-parent="tr" class="label <?php echo e(($minu->w_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($minu->w_status == 1)? 'A' : 'D'); ?></a>
                  <a href="<?php echo e(route('admin.minu.d_status',$minu->id)); ?>" data-parent="tr" class="label <?php echo e(($minu->d_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($minu->d_status == 1)? 'A' : 'D'); ?></a>
                   
                  </td>
                  <td>
                    <a href="<?php echo e(route('admin.minu.status',$minu->id)); ?>" data-parent="tr" class="label <?php echo e(($minu->status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($minu->status == 1)? 'Active' : 'Inactive'); ?></a>
                  </td>                  
                   
                </tr> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
//  $( "#status" ).click(function() {
//   $.ajax({
//     method:"post",
//     url:"";
//     data:
//   })
//     $.ajax({
//           method: "get",
//           url: "",
//           data: { id: $(this).val() }
//         })
//         .done(function( response ) {            
//             if(response.length>0){
//                 $('#class').html('<option value="">Select Class</option>');
//                 for (var i = 0; i < response.length; i++) {
//                     $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
//                 } 
//             }
//             else{
//                 $('#class').html('<option value="">Not found</option>');
//             }
            
//         });
//     });
// });
 
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>