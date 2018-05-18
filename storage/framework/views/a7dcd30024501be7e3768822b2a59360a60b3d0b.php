<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Fee Structure Last Date </h1>
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
                              <?php echo e(Form::label('fee_structure_id','Fee Structure',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fee_structure_id',$feeStructur,null,['class'=>'form-control'])); ?>

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
                     

	                    <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('for_session_month_id','For Session/Month',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('for_session_month_id',$forSessionMonth,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
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
                        <?php $__currentLoopData = $feeStructureLastDstes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeStructureLastDste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                        		<td width="30px"><?php echo e(++$loop->index); ?>  </td>
                        		<td><?php echo e($feeStructureLastDste->feeStructures->name); ?></td>
                        		<td><?php echo e($feeStructureLastDste->academicYears->name); ?></td>
                                
                                <td><?php echo e($feeStructureLastDste->amount); ?></td>
                                <td><?php echo e(Carbon\Carbon::parse($feeStructureLastDste->last_date)->format('d-m-Y')); ?></td>
                                <td> <?php echo e(Carbon\Carbon::parse($feeStructureLastDste->last_date)->format(' F ')); ?> </td>
                        		<td> <?php echo e($feeStructureLastDste->forSessionMonths->name); ?> </td>
                        		<td> 
                        			

                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($feeStructureLastDste->id); ?>"  ><i class="fa fa-trash"></i></button>
                        		</td>
                        	</tr>  	 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                                            
                        </tbody>
                        
                    </table>
                    <?php echo e($feeStructureLastDstes->links()); ?>


                </div>
            </div>    

          <!-- Trigger the modal with a button --> 
          <!--- Model parents      -->     
              <!-- Modal -->
             <div id="fee_structure_last_date_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_fee_structure"> 
                        		<input type="hidden" name="id" id="edit_id">
                               <div class="form-group">
                                <?php echo e(Form::label('code','Code',['class'=>' control-label'])); ?>

                                 <?php echo e(Form::text('code','',['class'=>'form-control','id'=>'edit_code', 'placeholder'=>'Enter fee structure code'])); ?>

                                 <p class="errorCode text-center alert alert-danger hidden"></p>
                               </div>       
                               <div class="form-group">
                                <?php echo e(Form::label('name','Name',['class'=>' control-label'])); ?>                                
                                 <?php echo e(Form::text('name','',['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee structure name'])); ?>

                                 <p class="errorName text-center alert alert-danger hidden"></p>
                               </div>      
                               <div class="form-group">
                                <?php echo e(Form::label('fee_account','Fee Account',['class'=>' control-label'])); ?>

                                <?php echo e(Form::select('fee_account',$feeStructur,null,['class'=>'form-control','id'=>'edit_fee_account'])); ?>

                               </div>  
                                <div class="form-group">
                                <?php echo e(Form::label('fine_scheme','Fine Scheme',['class'=>' control-label'])); ?>

                                <?php echo e(Form::select('fine_scheme',$acardemicYear,null,['class'=>'form-control','id'=>'edit_fine_scheme'])); ?>

                               </div> 
                               <div class="form-group">
                                <?php echo e(Form::label('is_refundable','Is Refundable',['class'=>' control-label'])); ?>

                                 <?php echo e(Form::select('is_refundable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control','id'=>'edit_Is_refundable'])); ?>

                                 <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                               </div>   
                                                      
                            </form> 
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <button type="button" class="btn_update btn btn-success">Update</button>
                            
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