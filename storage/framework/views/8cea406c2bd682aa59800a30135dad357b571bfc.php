<?php $__env->startSection('body'); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ISKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Registration Process</p>
    
    <?php echo Form::open(['route'=>'student.resitration.firststep.store']); ?>

      <div class="form-group has-feedback">
      	<?php echo Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'mail']); ?>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
      </div>
      <div class="form-group has-feedback">
        <?php echo Form::text('mobile', '', ['class'=>'form-control', 'placeholder'=>'Mobile']); ?>

        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger"><?php echo e($errors->first('mobile')); ?></p>
      </div>
      
      <div class="form-group has-feedback">
      <?php echo Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']); ?>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
      </div>
      <div class="form-group has-feedback">
      <?php echo Form::password('password_confirm', ['class'=>'form-control', 'placeholder'=>'Confirm Password']); ?>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger"><?php echo e($errors->first('password_confirm')); ?></p>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo Form::close(); ?>


   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>