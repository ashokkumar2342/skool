<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Student Fee Assign </h1>
      <ol class="breadcrumb">
        <span class="pull-right">
        <a href="<?php echo e(route('admin.studentFeeAssign.list')); ?>" class="btn btn-success">Back</a>
      </span>
        <span class="pull-right" style="padding-right: 10px">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#student_fee_detail_model">Add New Fee Details</a>
      </span>
      </ol>

</section>
    <section class="content">
         

    <div class="box">             
      <!-- /.box-header -->
        <div class="box-body">
            <div class="row" style="border:solid #eee 1px;">
                <div class="col-lg-2">
                    <h4>Name : <b><?php echo e($student->name); ?></b></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Father's Name : <b><?php echo e($student->father_name); ?></b></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Mother's Name : <b><?php echo e($student->mother_name); ?></b></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Mobile: <b><?php echo e($student->father_mobile); ?></b></h4>
                </div>
                <div class="col-lg-2">
                    <h4>gender: <b><?php echo e($student->genders->genders); ?></b></h4>
                </div>
                <div class="col-lg-2">
                    <h4>Address: <b><?php echo e($student->p_address); ?> </b></h4>
                </div>
            </div>
            <div class="row" style="padding-top: 20px;">
                 <form action="<?php echo e(route('admin.studentFeeAssign.post')); ?>" method="post"> 
                 <?php echo e(csrf_field()); ?>

                     <table class="table table-responsive" id="student_fee_assign_show_table"> 
                         <thead>
                             <tr>
                                 <th>id</th> 
                                 <th>Fee Structure name</th> 
                                 <th>Fee Amount</th>
                                 <th>Concession</th>
                                 <th>Concession Amount</th>
                                 
                                 <th>Last Date</th> 
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                             <?php $__currentLoopData = $studentFeeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentFeeDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                               <tr>
                                  <td><?php echo e($studentFeeDetail->id); ?></td> 
                                  <td><?php echo e($studentFeeDetail->feeStructureLastDates->feeStructures->name); ?> </td> 
                                   
                                  <td><?php echo e($studentFeeDetail->fee_amount); ?></td> 
                                  <td>   <?php echo e($studentFeeDetail->concession_id); ?> </td> 
                                  <td><?php echo e($studentFeeDetail->concession_amount); ?></td>  
                                  <td><?php echo e(Carbon\Carbon::parse( $studentFeeDetail->last_date)->format(' F ')); ?> </td> <td>
                                     <a class="btn_delete btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')"   href="<?php echo e(route('admin.studentFeeDetail.delete', $studentFeeDetail->id  )); ?>"  ><i class="fa fa-trash"></i></a>
                                     <a href="#" data-id="<?php echo e($studentFeeDetail->feeStructureLastDates->id); ?>" id="add_show" class="btn btn-success btn-xs" data-toggle="modal" data-target="#student_fee_detail_model"><i class="fa fa-plus"></i></a>
                                 </td>  
                               </tr>   
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                         </tbody>
                     </table>
                     
                 </form>   
            </div>  
        </div>
    </div>    

    <!-- Modal -->
    <div id="student_fee_detail_model" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Fee Detail</h4>
          </div>
          <div class="modal-body">
             <?php echo e(Form::label('concession','Concession',['class'=>' control-label'])); ?>

            <?php echo Form::select('concession',$concession, null, ['class'=>'form-control concession','placeholder'=>'Select Concession','required','id'=>'con']); ?>

             <?php echo e(Form::label('concession_amount','Concession Amount',['class'=>' control-label'])); ?>

            <?php echo Form::text('concession_amount','', ['class'=>'form-control concession','placeholder'=>'Select Concession','required','id'=>'con_amount']); ?>

            <input type="hidden" name="" id="student_fee_details_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

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
   $('#student_fee_assign_show_table').on('click','#add_show', function(event) {      
       event.preventDefault();  
       
        $('#student_fee_details_id').val($(this).data('id'));         
           
        
        // $('#fee_structure_amount_model').modal('show');
  });
   $('#con').change(function(event) {
     $.ajax({
         url: '<?php echo e(route('admin.concession.search')); ?>',
         type: 'get', 
         data: {concession: $('#con').val()},
     })
     .done(function(data) {

         $("#con_amount").val(data.amount);
          
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