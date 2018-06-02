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
                  <form class="form-vertical" id="form_fee_structure_last_date">
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('academic_year_id','Academic Year',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('fee_structure_id','Fee Structure Last Date',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fee_structure_id',$feeStructurLastDate,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('fee_structure_id','Concession',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fee_structure_id',$concession,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> 
                       <div class="col-lg-2">                                             
                         <div class="form-group">
                           <?php echo e(Form::label('amount','Amount',['class'=>'form-label'])); ?>                          
                           <?php echo e(Form::text('amount','',['class'=>'form-control','id'=>'amount','rows'=>4, 'placeholder'=>'Enter Amount'])); ?>

                           <p class="errorName text-center alert alert-danger hidden"></p>
                         </div>                                         
                      </div>                                               
                       <div class="col-lg-2" style="padding-top: 20px;">                                             
                       <button class="btn btn-success" type="button" id="btn_fee_structure_last_date_create">Create</button> 
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
                    <table id="fee_structure_last_date_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Academic Year</th>
                                <th>Fee Structure</th>
                                <th>Amount</th>
                                <th>Last Date</th>
                                <th>Month</th>                                                            
                                <th>For Session/Month</th>                                                            
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
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script>
 
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    
 
 </script>
  <script>
    $('#btn_fee_structure_last_date_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '<?php echo e(route('admin.feeStructureLastDate.post')); ?>',
           type: 'POST',       
           data: $('#form_fee_structure_last_date').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_fee_structure_last_date")[0].reset(); 
            $("#fee_structure_last_date_table").load(location.href + ' #fee_structure_last_date_table'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    });/////////////////delete///////////////////
    $('#fee_structure_last_date_table').on('click', '.btn_delete', function(event) {
      var cm = confirm("Are you Sure Delete!");
      if (cm == true) {
           event.preventDefault();  
           var id = $(this).data("id");
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });      
           $.ajax({
               url: '<?php echo e(route('admin.feeStructureLastDate.delete')); ?>',
               type: 'delete',
               data: {id: id},
           })
           .done(function(data) {
               toastr[data.class](data.message)
               $("#fee_structure_last_date_table").load(location.href + ' #fee_structure_last_date_table'); 
           })
           .fail(function() {
               console.log("error");
           })
           .always(function() {
               console.log("complete");
           });
      } else {
          console.log("cancel");
      }
        
    });///////////////////edit//////////// 
     $('#fee_structure_last_date').on('click', '.btn_edit', function(event) {
         event.preventDefault();  
         $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
        $('#edit_fee_account').val($(this).data('feeaccount'));   
         $('#edit_fine_scheme').val($(this).data('finescheme'));        
         $('#edit_Is_refundable').val($(this).data('refundable')); 
         $('#fee_structure_model').modal('show');
    });////////////////update/////////////
   $('#fee_structure_model').on('click', '.btn_update', function(event) {
       event.preventDefault(); 
       $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '<?php echo e(route('admin.feeStructureLastDate.update')); ?>',
           type: 'put',       
           data: $('#form_model_fee_structure').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_model_fee_structure_last_date")[0].reset();
            $('#fee_structure_last_date_model').modal('hide');

            $("#fee_structure_last_date_table").load(location.href + ' #fee_structure_last_date_table'); 
        } 
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