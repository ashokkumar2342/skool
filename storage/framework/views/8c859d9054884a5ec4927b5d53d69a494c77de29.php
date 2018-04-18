<?php $__env->startSection('body'); ?>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account Register</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo e(route('admin.account.post')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">First Name</label>
                                  <input Name="first_name" class="form-control"  placeholder="Enter first name">
                                </div>                                
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Last Name</label>
                                  <input Name="last_name" class="form-control"  placeholder="Enter last name">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                 <label>Role</label>
                                 <select class="form-control" name="role_id">
                                 <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                                 </select>
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Id</label>
                                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="Password">Password</label>
                                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Mobile</label>
                                  <input type="text" Name="mobile" class="form-control"  placeholder="Enter name">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Date Of Birth</label>
                                  <input type="text" Name="dob" class="form-control"  placeholder="Enter name">
                                </div>                                
                            </div>
                        </div>                     
                                        
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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


<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>