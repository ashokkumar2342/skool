<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Cashbook </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body"> 
                <div class="row">  
                    <div class="col-md-12">  
                        <form  class="add_form" method="post" action="<?php echo e(route('admin.cashbook.daterange')); ?>" success-content-id="result_div_id" no-reset="true" data-table-without-pagination="result_table_id">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-2" style="padding-top: 20px;"> 
                          <div class="form-group">
                                       <?php echo e(Form::label('daterange','Date Range',['class'=>' control-label'])); ?>

                           <input type="text" name="daterange" class="form-control" />
                         </div>
                        </div> 
                        <div class="col-lg-2" style="padding-top: 20px;"> 
                           <div class="form-group">
                               <?php echo e(Form::label('class','Class',['class'=>' control-label'])); ?>

                               <?php echo Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class']); ?> 
                           </div>
                             
                                                                               
                           <div class="col-lg-1" style="padding-top: 20px;"> 
                           <input class="btn btn-success" type="submit">
                          </div>                     
                      </form> 
                       
                    </div> 

                 </div>  
            </div>
           
         </div>
          <!-- /.box -->
          <div class="box">             
              <!-- /.box-header -->
              <div class="box-body">   
                     
                  <div class="col-md-12" id="result_div_id" > 
                    
                  </div>  
                  
              </div>
              <!-- /.box-body -->
           </div>
            <!-- /.box -->

             
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
   
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 


<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="////cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
  
  <script> 
$(function() { 
  $('input[name="daterange"]').daterangepicker();
  $('#result_table_id').DataTable();
  $('#table').DataTable();
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>