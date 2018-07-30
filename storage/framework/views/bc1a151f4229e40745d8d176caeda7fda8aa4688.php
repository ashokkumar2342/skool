<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Fee Structure </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vertical" id="form_fee_structure">                                                     
	                   <div class="col-lg-2">                                             
	                       <div class="form-group">
                           <?php echo e(Form::label('code','Code',['class'=>'form-label'])); ?>

	                         <?php echo e(Form::text('code','',['class'=>'form-control','id'=>'code', 'placeholder'=>'Enter Fee Structure Code'])); ?>

	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-2">                                             
	                       <div class="form-group">
                           <?php echo e(Form::label('name','name',['class'=>'form-label'])); ?>                          
	                         <?php echo e(Form::text('name','',['class'=>'form-control','id'=>'name','rows'=>4, 'placeholder'=>'Enter Fee Structure Name'])); ?>

	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('fee_account_id','Fee Account',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fee_account_id',$feeAccount,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
	                    </div>
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('fine_scheme_id','Fine Scheme',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fine_scheme_id',$fineScheme,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('is_refundable','Is Refundable',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('is_refundable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
	                     <div class="col-lg-2" style="padding-top: 20px;">                                             
	                     <button class="btn btn-success" type="button" id="btn_fee_structure_create">Create</button> 
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
                    <table id="fee_structure_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Fee Account</th>
                                <th>Fine Scheme</th>
                                <th>Refundable</th>                                                            
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $feeStructures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeStructure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                        		<td><?php echo e(++$loop->index); ?></td>
                        		<td><?php echo e($feeStructure->code); ?></td>
                        		<td><?php echo e($feeStructure->name); ?></td>
                                <td><?php echo e($feeStructure->feeAccounts->name); ?></td>
                                <td><?php echo e($feeStructure->fineSchemes->name); ?></td>
                        		<td><?php echo e($feeStructure->is_refundable == 1 ?'yes':'No'); ?></td>
                        		<td> 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="<?php echo e($feeStructure->id); ?>"  data-code="<?php echo e($feeStructure->code); ?>" data-name="<?php echo e($feeStructure->name); ?>" data-feeaccount="<?php echo e($feeStructure->fee_account_id); ?>" data-finescheme="<?php echo e($feeStructure->fine_scheme_id); ?>" data-refundable="<?php echo e($feeStructure->is_refundable); ?>"><i class="fa fa-edit"></i> </button>

                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($feeStructure->id); ?>"  ><i class="fa fa-trash"></i></button>
                        		</td>
                        	</tr>  	 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                           
                        </tbody>
                             

                    </table>
                </div>
            </div>    

          <!-- Trigger the modal with a button --> 
          <!--- Model parents      -->     
              <!-- Modal -->
             <div id="fee_structure_model" class="modal fade" role="dialog">
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

                                <?php echo e(Form::select('fee_account',$feeAccount,null,['class'=>'form-control','id'=>'edit_fee_account'])); ?>

                               </div>  
                                <div class="form-group">
                                <?php echo e(Form::label('fine_scheme','Fine Scheme',['class'=>' control-label'])); ?>

                                <?php echo e(Form::select('fine_scheme',$fineScheme,null,['class'=>'form-control','id'=>'edit_fine_scheme'])); ?>

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
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
  <script>
  	$('#btn_fee_structure_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.feeStructure.post')); ?>',
           type: 'POST',       
           data: $('#form_fee_structure').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_fee_structure")[0].reset(); 
  			    $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#fee_structure_table').on('click', '.btn_delete', function(event) {
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
  		         url: '<?php echo e(route('admin.feeStructure.delete')); ?>',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
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
  	 $('#fee_structure_table').on('click', '.btn_edit', function(event) {
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
           url: '<?php echo e(route('admin.feeStructure.update')); ?>',
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
  			    $("#form_model_fee_structure")[0].reset();
  			    $('#fee_structure_model').modal('hide');

  			    $("#fee_structure_table").load(location.href + ' #fee_structure_table'); 
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