<?php $__env->startSection('body'); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ISKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">OTP Verification</p>
    
    <?php if($parentRegistration->email_verify!=1): ?>
    <?php echo Form::open(['route'=>'student.resitration.verifyMobile']); ?>

       
      <div class="form-group has-feedback">
        <?php echo Form::hidden('mobile', $parentRegistration->mobile, ['class'=>'form-control', 'placeholder'=>'Mobile']); ?>

        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        
      </div>
       
      <div class="form-group has-feedback">
      <?php echo Form::text('mobile_otp', '',['class'=>'form-control', 'placeholder'=>'Mobile Otp']); ?>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger"><?php echo e($errors->first('mobile_otp')); ?></p>
      </div>
     
       
      <div class="row">
        <div class="col-xs-8">
           
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
        </div>
        <!-- /.col -->
      </div>
      <?php endif; ?>
    <?php echo Form::close(); ?>

    <?php if($parentRegistration->email_verify!=1): ?>
          <?php echo Form::open(['route'=>'student.resitration.verifyEmail']); ?>

          <div class="form-group has-feedback">
            <?php echo Form::hidden('email', $parentRegistration->email, ['class'=>'form-control', 'placeholder'=>'mail']); ?>

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            
          </div>
           
           <div class="form-group has-feedback">
          <?php echo Form::text('email_otp', '',['class'=>'form-control', 'placeholder'=>'Email Otp']); ?>

            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <p class="text-danger"><?php echo e($errors->first('email_otp')); ?></p>
          </div>
         
         
           
          <div class="row">
            <div class="col-xs-8">
               
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
            </div>
            <!-- /.col -->
          </div>
        <?php echo Form::close(); ?>

    <?php endif; ?>
      

 
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>

  <?php $__env->startPush('scripts'); ?> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php if(Session::has('message')): ?>
<script type="text/javascript">

    Command: toastr["<?php echo e(Session::get('class')); ?>"]("<?php echo e(Session::get('message')); ?>");
</script>

<?php endif; ?>
 
 <script src=<?php echo asset('admin_asset/dist/js/validation/common.js?ver=1'); ?>></script>
    <script src=<?php echo asset('admin_asset/dist/js/customscript.js?ver=1'); ?>></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>