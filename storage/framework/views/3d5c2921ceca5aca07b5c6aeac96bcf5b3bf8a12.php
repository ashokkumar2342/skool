<?php $__env->startSection('body'); ?>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account List</h3>
            </div>
              

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Role</th>
                  <th>Email Id</th>
                  <th>R - W - D</th>                  
                  <th>Status</th>                  
                  <th>Menu</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($account->id); ?></td>
                  <td> <?php echo e($account->created_at->format('d-m-Y')); ?> </td>
                  <td><?php echo e($account->first_name); ?> <?php echo e($account->first_last); ?></td>
                  <td><?php echo e($account->mobile); ?></td>
                  <td><?php echo e($account->roles->name); ?></td>
                  <td><?php echo e($account->email); ?></td>
                  <td>
                   
                  <a href="<?php echo e(route('admin.account.r_status',$account->id)); ?>" data-parent="tr" class="label <?php echo e(($account->r_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($account->r_status == 1)? 'A' : 'D'); ?></a>
                  <a href="<?php echo e(route('admin.account.w_status',$account->id)); ?>" data-parent="tr" class="label <?php echo e(($account->w_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($account->w_status == 1)? 'A' : 'D'); ?></a>
                  <a href="<?php echo e(route('admin.account.d_status',$account->id)); ?>" data-parent="tr" class="label <?php echo e(($account->d_status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($account->d_status == 1)? 'A' : 'D'); ?></a>
                   
                  </td>
                  <td>
                    <a href="<?php echo e(route('admin.account.status',$account->id)); ?>" data-parent="tr" class="label <?php echo e(($account->status == 1) ?'btn-success':'btn-danger'); ?> btn btn-xs"><?php echo e(($account->status == 1)? 'Active' : 'Inactive'); ?></a>
                  </td>  
                  <td>
                  <a href="<?php echo e(route('admin.account.minu',[$account->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-bars"></i></a>
                  </td>                
                  <td>
                  <?php if(Auth::guard('admin')->user()->w_status == 1): ?>
                  <a href="<?php echo e(route('admin.account.edit',[$account->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                  <?php endif; ?>
                  <?php if(Auth::guard('admin')->user()->d_status == 1): ?>

                  <a  href="<?php echo e(route('admin.account.delete',$account->id)); ?>" onclick="return confirm('Are you sure to delete this data ?')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                  <?php endif; ?>
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