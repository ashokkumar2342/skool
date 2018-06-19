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
                <div class="col-md-12"> 
                  
                    <form  action="<?php echo e(route('admin.studentFeeDetail.post')); ?>" class="add_form" method="post" autocomplete="off" no-reset="true" >
                      <?php echo e(csrf_field()); ?>

                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('academic_year_id','Academic Year',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('class_id','Class',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('class_id',$classess,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('from_date','From Date',['class'=>' control-label'])); ?>

                               <?php echo e(Form::text('from_date','',['class'=>'form-control datepicker'])); ?>

                               <p class="from_date text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> 
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('to_date','To Date',['class'=>' control-label '])); ?>

                               <?php echo e(Form::text('to_date','',['class'=>'form-control datepicker'])); ?>

                               <p class="to_date text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>                                                                     
                       <div class="col-lg-2" style="padding-top: 20px;">                                             
                       
                       <input type="submit" name="submit" class="btn btn-success mr-10 mb-30" id="submit" value="Update"/>
                      </div>                     
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="student_fee_detail_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Student</th>
                                <th>Fee Structure</th>
                                <th>Amount</th>
                                <th>Amount</th>
                                <th>Concession Amount</th>
                                                                                          
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $studentFeeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentFeeDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td width="30px"><?php echo e(++$loop->index); ?>  </td>
                            <td><?php echo e($studentFeeDetail->feeStructures->name); ?></td>
                            <td><?php echo e($studentFeeDetail->academicYears->name); ?></td>
                                
                                <td><?php echo e($studentFeeDetail->amount); ?></td>
                                <td><?php echo e(Carbon\Carbon::parse($studentFeeDetail->last_date)->format('d-m-Y')); ?></td>
                                <td> <?php echo e(Carbon\Carbon::parse($studentFeeDetail->last_date)->format(' F ')); ?> </td>
                            <td> <?php echo e($studentFeeDetail->forSessionMonths->name); ?> </td>
                            <td> 
                              

                              <button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($studentFeeDetail->id); ?>"  ><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                            
                        </tbody>
                        
                    </table>
                    <?php echo e($studentFeeDetails->links()); ?>


                </div>
            </div>    

          
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>