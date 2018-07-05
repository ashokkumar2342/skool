<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Student Fee Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
         

    <div class="box">             
      <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-responsive"> 
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Concession</th>
                        <th>Concession Amount</th>  
                        <th>Fee Amount</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Last Date</th>
                        <th>Refundable</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $studentFeeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentFeeDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                         <td><input type="checkbox" name="id" value="<?php echo e($studentFeeDetail->id); ?>"></td>
                         <td>
                            <?php echo Form::select('concession',$concession, null, ['class'=>'form-control concession','placeholder'=>'Select Concession','required']); ?> 
                         </td>
                         <td><input type="text" class="form-control" name="concession_amount" id="concession_amount" value="<?php echo e($studentFeeDetail->concession_amount); ?>"></td> 
                         <td><input type="text" class="form-control" name="fee_amount" value="<?php echo e($studentFeeDetail->fee_amount); ?>"> </td> 
                         <td><input type="text" class="form-control" name="from_date" value="<?php echo e($studentFeeDetail->from_date); ?>"></td>
                         <td><input type="text" class="form-control" name="to_date" value="<?php echo e($studentFeeDetail->to_date); ?>"></td>
                         <td><input type="text" class="form-control" name="last_date" value="<?php echo e($studentFeeDetail->last_date); ?>"> </td> 
                         <td><input type="checkbox" <?php echo e($studentFeeDetail->refundable==1?'checked':''); ?> value="<?php echo e($studentFeeDetail->refundable); ?>" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="default"></td>
                         <td><input type="checkbox" <?php echo e($studentFeeDetail->paid==1?'checked':''); ?> value="<?php echo e($studentFeeDetail->paid); ?>" data-toggle="toggle" data-on="Paid" data-off="Unpaid" data-onstyle="success" data-offstyle="default"></td>
                           
                      </tr>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody>
            </table>

        </div>
    </div>    

           
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
 <script> 
    $( ".datepicker").datepicker();   
 
   $('.concession').change(function(event) {
     
     event.preventDefault();
   
     $.ajax({
         url: '<?php echo e(route('admin.concession.search')); ?>',
         type: 'get', 
         data: {concession: $('.concession').val()},
     })
     .done(function(data) {

         $("#concession_amount").val(data.amount);
          
     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
   
   });
     
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>