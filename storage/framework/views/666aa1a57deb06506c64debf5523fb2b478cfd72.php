<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Class Fee Structure </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vertical" id="form_class_fee_structure">
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('fee_structure_id','Fee Structure',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('fee_structure_id',$feeStructur,null,['class'=>'form-control'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('class_id','Class',['class'=>' control-label'])); ?>

                               <?php echo e(Form::select('class_id',$classess,null,['class'=>'form-control','placeholder'=>'Select Class'])); ?>

                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div> 
                        <div class="col-lg-2">                           
                             <div class="form-group">
                              <?php echo e(Form::label('is_applicable','Is Applicable',['class'=>' control-label'])); ?>

                                <?php echo e(Form::select('is_applicable',['0'=>'No','1'=>'yes'],null,['class'=>'form-control','id'=>'edit_is_applicable'])); ?> 
                             </div>    
                        </div>
                         
                                         
	                     <div class="col-lg-2" style="padding-top: 20px;">                                             
	                     <button class="btn btn-success" type="button" id="btn_class_fee_structure_create">Create</button> 
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
                    <table id="class_fee_structure_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                 
                                <th>Fee Structure</th>
                                <th>Class</th>
                                <th>Is Applicable</th>                                        
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $classFeeStructures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classFeeStructure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                        		<td><?php echo e(++$loop->index); ?></td>
                        		<td><?php echo e($classFeeStructure->feeStructures->name); ?></td>
                        		  
                            <td><?php echo e($classFeeStructure->classess->alias); ?></td>
                        		<td><button class="btn_is_applicable btn <?php echo e($classFeeStructure->is_applicable == 1 ? 'btn-success':'btn-danger'); ?>  btn-xs" data-id="<?php echo e($classFeeStructure->id); ?>"><?php echo e($classFeeStructure->is_applicable == 1 ? 'Yes':'No'); ?></button></td>
                        		<td> 
                                    <button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($classFeeStructure->id); ?>"><i class="fa fa-trash"></i></button>
                                </td>
                        		
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
  	$('#btn_class_fee_structure_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.classFeeStructure.post')); ?>',
           type: 'POST',       
           data: $('#form_class_fee_structure').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_class_fee_structure")[0].reset(); 
  			    $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////isapplicable///////////////////
    $('#class_fee_structure_table').on('click', '.btn_is_applicable', function(event) { 
         event.preventDefault();  
         console.log('test');
         var id = $(this).data("id");
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });      
         $.ajax({
             url: '<?php echo e(route('admin.classFeeStructure.isApplicable')); ?>',
             type: 'post',
             data: {id: id},
         })
         .done(function(data) {
             toastr[data.class](data.message)
             $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });  
    });
    /////////////////delete///////////////////
  	$('#class_fee_structure_table').on('click', '.btn_delete', function(event) {
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
  		         url: '<?php echo e(route('admin.classFeeStructure.delete')); ?>',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#class_fee_structure_table").load(location.href + ' #class_fee_structure_table'); 
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