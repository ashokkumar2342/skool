<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Concession </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-horizontal" id="form_concession">                                                     
	                   
	                     <div class="col-lg-3">                                             
	                       <div class="form-group">
	                         <?php echo e(Form::text('name','',['class'=>'form-control','id'=>'name','rows'=>4, 'placeholder'=>'Enter  Name'])); ?>

	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>                     
	                    <div class="col-lg-3">                         
	                        <div class="form-group">
	                          <?php echo e(Form::text('amount','',['class'=>'form-control','id'=>'amount','rows'=>1, 'placeholder'=>'Enter Amount'])); ?>

	                          <p class="errorDescription text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
                      <div class="col-lg-3">                         
                          <div class="form-group">
                            <?php echo e(Form::text('percentage','',['class'=>'form-control','id'=>'percentage','rows'=>1, 'placeholder'=>'Enter Percentage'])); ?>

                            <p class="errorDescription text-center alert alert-danger hidden"></p>
                          </div>
                      </div>

	                     <div class="col-lg-3">                                             
	                     <button class="btn btn-success" type="button" id="btn_concession_create">Create</button> 
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
                    <table id="concession_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>                                 
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Percentage</th>
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $concessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                        		<td><?php echo e(++$loop->index); ?></td>                        		 
                        		<td><?php echo e($concession->name); ?></td>
                            <td><?php echo e($concession->amount); ?></td>
                        		<td><?php echo e($concession->percentage?$concession->percentage.'%':''); ?></td>
                        		<td> 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="<?php echo e($concession->id); ?>"   data-name="<?php echo e($concession->name); ?>" data-amount="<?php echo e($concession->amount); ?>" data-percentage="<?php echo e($concession->percentage); ?>" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($concession->id); ?>"  ><i class="fa fa-trash"></i></button>
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
             <div id="concession_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_concession"> 
                            		<input type="hidden" name="id" id="edit_id">
                                         
                                   <div class="form-group">
                                     <?php echo e(Form::text('name','',['class'=>'form-control','id'=>'edit_name','rows'=>4, 'placeholder'=>'Enter fee account name'])); ?>

                                     <p class="errorName text-center alert alert-danger hidden"></p>
                                   </div>      
                                  <div class="form-group">
                                      <?php echo e(Form::text('amount','',['class'=>'form-control','id'=>'edit_amount','rows'=>1, 'placeholder'=>'Enter Amount'])); ?>

                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
                                  </div>
                                  <div class="form-group">
                                      <?php echo e(Form::text('percentage','',['class'=>'form-control','id'=>'edit_percentage','rows'=>1, 'placeholder'=>'Enter percentage'])); ?>

                                      <p class="errorDescription text-center alert alert-danger hidden"></p> 
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
  	$('#btn_concession_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.concession.post')); ?>',
           type: 'POST',       
           data: $('#form_concession').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_concession")[0].reset(); 
  			    $("#concession_table").load(location.href + ' #concession_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#concession_table').on('click', '.btn_delete', function(event) {
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
  		         url: '<?php echo e(route('admin.concession.delete')); ?>',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#concession_table").load(location.href + ' #concession_table'); 
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
  	 $('#concession_table').on('click', '.btn_edit', function(event) {
  	     event.preventDefault();  
  	     $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
                 
         $('#edit_name').val($(this).data('name'));        
         $('#edit_amount').val($(this).data('amount'));        
         $('#edit_percentage').val($(this).data('percentage'));        
               
         $('#concession_model').modal('show');
  	});////////////////update/////////////
 	 $('#concession_model').on('click', '.btn_update', function(event) {
 	     event.preventDefault(); 
 	     $.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.concession.update')); ?>',
           type: 'put',       
           data: $('#form_model_concession').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_model_concession")[0].reset();
  			    $('#concession_model').modal('hide');

  			    $("#concession_table").load(location.href + ' #concession_table'); 
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