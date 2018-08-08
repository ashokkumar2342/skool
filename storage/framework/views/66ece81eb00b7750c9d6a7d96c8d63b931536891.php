
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISKOOL</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <meta name="_token" content="<?php echo csrf_token(); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_asset/dist/css/skins/_all-skins.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style type="text/css" media="screen">
    th {
    text-transform: uppercase;
     }
  </style>

  <?php echo $__env->yieldPushContent('links'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" id="body_id">

<?php echo $__env->yieldContent('body'); ?>
<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('admin_asset/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('admin_asset/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('admin_asset/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin_asset/dist/js/app.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('admin_asset/dist/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('admin_asset/dist/js/toastr.min.js')); ?>"></script>
<script src=<?php echo asset('admin_asset/dist/js/validation/common.js?ver=1'); ?>></script>
<script src=<?php echo asset('admin_asset/dist/js/customscript.js?ver=1'); ?>></script>

<?php echo $__env->yieldPushContent('scripts'); ?>
 
</body>
</html>
