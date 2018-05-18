<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Fine Scheme </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form-vartical" id="form_fine_scheme">                                                     
	                   <div class="col-lg-3">                                             
	                       <div class="form-group">
                            <?php echo e(Form::label('code','Fine Schme Code',['class'=>' control-label'])); ?>

	                         <?php echo e(Form::text('code','',['class'=>'form-control', 'placeholder'=>'Fine Schme Code'])); ?>

	                         <p class="errorCode text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
	                     <div class="col-lg-3">                                             
	                       <div class="form-group">
                            <?php echo e(Form::label('name','Fine Schme Name',['class'=>' control-label'])); ?>                            
	                         <?php echo e(Form::text('name','',['class'=>'form-control', 'placeholder'=>'Fine Schme Name'])); ?>

	                         <p class="errorName text-center alert alert-danger hidden"></p>
	                       </div>                                         
	                    </div>
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                            <?php echo e(Form::label('fine_amount1','Fine Amount 1',['class'=>' control-label'])); ?>                            
                             <?php echo e(Form::text('fine_amount1','',['class'=>'form-control', 'placeholder'=>'Fine Amount 1'])); ?>

                             <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                            <?php echo e(Form::label('fine_amount2','Fine Amount 2',['class'=>' control-label'])); ?>

                             <?php echo e(Form::text('fine_amount2','',['class'=>'form-control', 'placeholder'=>'Fine Amount 2'])); ?>

                             <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>                        
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                             <?php echo e(Form::label('fine_amount3','Fine Amount 3',['class'=>' control-label'])); ?>

                             <?php echo e(Form::text('fine_amount3','',['class'=>'form-control', 'placeholder'=>'Fine Amount 3'])); ?>

                             <p class="errorAmount3 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                            <?php echo e(Form::label('day_after1','Day After 1',['class'=>' control-label'])); ?>

                             <?php echo e(Form::text('day_after1','',['class'=>'form-control', 'placeholder'=>'Day After 1'])); ?>

                             <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                            <?php echo e(Form::label('day_after2','Day After 2',['class'=>' control-label'])); ?>

                             <?php echo e(Form::text('day_after2','',['class'=>'form-control', 'placeholder'=>'Day After 2'])); ?>

                             <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>
                         <div class="col-lg-3">                                             
                           <div class="form-group">
                            <?php echo e(Form::label('fine_period','Fine Period',['class'=>' control-label'])); ?>

                             <?php echo e(Form::select('fine_period',$finePeriod,null,['class'=>'form-control'])); ?>

                             <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                           </div>                                         
                        </div>                     
	                   
	                     <div class="col-lg-12 text-right">                                             
	                     <button class="btn btn-success" type="button" id="btn_fine_scheme_create">Create</button> 
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
                    <table id="fine_scheme_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Amount 1</th>
                                <th>Amount 2</th>
                                <th>Amount 3</th>
                                <th>Days After 1</th>
                                <th>Days After 2</th>
                                <th>Fine Period</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $fineSchemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fineScheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                        		<td><?php echo e(++$loop->index); ?></td>
                        		<td><?php echo e($fineScheme->code); ?></td>
                        		<td><?php echo e($fineScheme->name); ?></td>
                                <td><?php echo e($fineScheme->fine_amount1); ?></td>
                                <td><?php echo e($fineScheme->fine_amount2); ?></td>
                                <td><?php echo e($fineScheme->fine_amount2); ?></td>
                                <td><?php echo e($fineScheme->day_after1); ?></td>
                                <td><?php echo e($fineScheme->day_after2); ?></td>
                        		<td><?php echo e($fineScheme->finePeriods->name); ?></td>
                        		<td> 
                        			<button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="<?php echo e($fineScheme->id); ?>"  data-code="<?php echo e($fineScheme->code); ?>" data-name="<?php echo e($fineScheme->name); ?>" data-amount1="<?php echo e($fineScheme->fine_amount1); ?>" data-amount2="<?php echo e($fineScheme->fine_amount2); ?>" data-amount3="<?php echo e($fineScheme->fine_amount3); ?>" data-after1="<?php echo e($fineScheme->day_after1); ?>" data-after2="<?php echo e($fineScheme->day_after2); ?>" data-period="<?php echo e($fineScheme->fine_period_id); ?>"  data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                        			<button class="btn_delete btn btn-danger btn-xs"  data-id="<?php echo e($fineScheme->id); ?>"  ><i class="fa fa-trash"></i></button>
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
             <div id="fine_scheme_model" class="modal fade" role="dialog">
                 <div class="modal-dialog">
                  <!-- Modal content-->
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"> Update</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_model_fine_scheme"> 
                            		<input type="hidden" name="id" id="edit_id">
                                   <div class="col-lg-12">                                             
                                       <div class="form-group">
                                           <?php echo e(Form::label('code','Fine Schme Code',['class'=>' control-label'])); ?>

                                         <?php echo e(Form::text('code','',['class'=>'form-control','id'=>'edit_code'])); ?>

                                         <p class="errorCode text-center alert alert-danger hidden"></p>
                                       </div>                                         
                                    </div>
                                     <div class="col-lg-12">                                             
                                       <div class="form-group">
                                           <?php echo e(Form::label('name','Fine Schme Name',['class'=>' control-label'])); ?>                            
                                         <?php echo e(Form::text('name','',['class'=>'form-control','id'=>'edit_name'])); ?>

                                         <p class="errorName text-center alert alert-danger hidden"></p>
                                       </div>                                         
                                    </div>
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                           <?php echo e(Form::label('fine_amount1','Fine Amount 1',['class'=>' control-label'])); ?>                            
                                            <?php echo e(Form::text('fine_amount1','',['class'=>'form-control','id'=>'edit_amount1'])); ?>

                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                           <?php echo e(Form::label('fine_amount2','Fine Amount 2',['class'=>' control-label'])); ?>

                                            <?php echo e(Form::text('fine_amount2','',['class'=>'form-control','id'=>'edit_amount2'])); ?>

                                            <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>                        
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                            <?php echo e(Form::label('fine_amount3','Fine Amount 3',['class'=>' control-label'])); ?>

                                            <?php echo e(Form::text('fine_amount3','',['class'=>'form-control','id'=>'edit_amount3'])); ?>

                                            <p class="errorAmount3 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                           <?php echo e(Form::label('day_after1','Day After 1',['class'=>' control-label'])); ?>

                                            <?php echo e(Form::text('day_after1','',['class'=>'form-control','id'=>'edit_day_after1'])); ?>

                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                           <?php echo e(Form::label('day_after2','Day After 2',['class'=>' control-label'])); ?>

                                            <?php echo e(Form::text('day_after2','',['class'=>'form-control','id'=>'edit_day_after2' ])); ?>

                                            <p class="errorAmount2 text-center alert alert-danger hidden"></p>
                                          </div>                                         
                                       </div>
                                        <div class="col-lg-12">                                             
                                          <div class="form-group">
                                           <?php echo e(Form::label('fine_period','Fine Period',['class'=>' control-label'])); ?>

                                            <?php echo e(Form::select('fine_period',$finePeriod,null,['class'=>'form-control','id'=>'edit_period'])); ?>

                                            <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                          </div>                                         
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
  	$('#btn_fine_scheme_create').click(function(event) {  		  
  		$.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.fineScheme.post')); ?>',
           type: 'POST',       
           data: $('#form_fine_scheme').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_fine_scheme")[0].reset(); 
  			    $("#fine_scheme_table").load(location.href + ' #fine_scheme_table'); 
  			} 
  		})
  		.fail(function() {
  			console.log("error");
  		})
  		.always(function() {
  			console.log("complete");
  		}); 
  	});/////////////////delete///////////////////
  	$('#fine_scheme_table').on('click', '.btn_delete', function(event) {
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
  		         url: '<?php echo e(route('admin.fineScheme.delete')); ?>',
  		         type: 'delete',
  		         data: {id: id},
  		     })
  		     .done(function(data) {
  		         toastr[data.class](data.message)
  		         $("#fine_scheme_table").load(location.href + ' #fine_scheme_table'); 
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
  	 $('#fine_scheme_table').on('click', '.btn_edit', function(event) {
  	     event.preventDefault();  
  	     $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
         $('#edit_amount1').val($(this).data('amount1'));        
         $('#edit_amount2').val($(this).data('amount2'));        
         $('#edit_amount3').val($(this).data('amount3'));        
         $('#edit_day_after1').val($(this).data('after1'));        
         $('#edit_day_after2').val($(this).data('after2'));        
         $('#edit_period').val($(this).data('period'));        
                
               
         $('#fine_scheme_model').modal('show');
  	});////////////////update/////////////
 	 $('#fine_scheme_model').on('click', '.btn_update', function(event) {
 	     event.preventDefault(); 
 	     $.ajaxSetup({
  		          headers: {
  		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		          }
  		      });
	     $.ajax({
           url: '<?php echo e(route('admin.fineScheme.update')); ?>',
           type: 'put',       
           data: $('#form_model_fine_scheme').serialize() ,
	    })
  		.done(function(data) {
  			if (data.class === 'error') {                 
  			     $.each(data.errors, function(index, val) {
  			         toastr[data.class](val) 
  			     }); 
  			}
  			  else {                 
  			    toastr[data.class](data.message)  
  			    $("#form_model_fine_scheme")[0].reset();
  			    $('#fine_scheme_model').modal('hide');

  			    $("#fine_scheme_table").load(location.href + ' #fine_scheme_table'); 
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