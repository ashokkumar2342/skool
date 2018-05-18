<?php if(Session::has('message')): ?>
<?php
$admin = Auth::guard('admin')->user();
$data = new App\Model\Activity();
$data->admin_id = $admin->id;
$data->message = Session::get('message');
$data->save();
?>
<script type="text/javascript">
    Command: toastr["<?php echo e(Session::get('class')); ?>"]("<?php echo e(Session::get('message')); ?>");
</script>
<?php endif; ?>