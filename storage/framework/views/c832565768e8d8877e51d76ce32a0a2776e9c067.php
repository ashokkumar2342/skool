<?php $__env->startSection('body'); ?>
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_class">Add Class</button></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

              </body>
              </html>
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Class id</th>                
                  <th>Class Name</th>
                  <th>Sort Name</th>
                  <th>Shorting Order No</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($class->id); ?></td>
                  <td><?php echo e($class->name); ?></td>
                  <td><?php echo e($class->alias); ?></td>
                  <td><?php echo e($class->shorting_id); ?></td>
                  <td align="center">
                    <?php if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->w_status == 1): ?>
                    <a class="btn btn-info btn-xs" href="<?php echo e(route('admin.class.edit',$class->id)); ?>"><i class="fa fa-pencil"></i></a>
                    <?php endif; ?>
                    <?php if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->d_status == 1): ?>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="<?php echo e(route('admin.class.delete',$class->id)); ?>"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
                  </td>
                 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="add_class" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <?php echo Form::open(['route'=>@($classType)?['admin.class.update',$classType->id]:'admin.class.add','class'=>"form-horizontal" ]); ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php if(@$classType): ?> Update <?php else: ?> Add <?php endif; ?> Class</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          <?php echo Form::label('className', 'Class Name : ', ['class'=>"col-sm-3 control-label"]); ?>            
            <div class="col-sm-9">
            <?php echo Form::text('className', @$classType->name, ['class'=>"form-control",'placeholder'=>"Class Name",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('className')); ?></p>
            </div>
          </div>
          <div class="form-group">
          <?php echo Form::label('shortName', 'Short Name :', ['class'=>"col-sm-3 control-label"]); ?>

            <div class="col-sm-9">
            <?php echo Form::text('shortName', @$classType->alias, ['class'=>"form-control",'placeholder'=>"Numeric Name",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('shortName')); ?></p>
            </div>
          </div> 
          <div class="form-group">
          <?php echo Form::label('shorting_id', 'Shorting Order No :', ['class'=>"col-sm-3 control-label"]); ?>

            <div class="col-sm-9">
            <?php echo Form::text('shorting_id', @$classType->shorting_id, ['class'=>"form-control",'placeholder'=>"Shorting id",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('shorting_id')); ?></p>
            </div>
          </div>    

                 
         </div>
         
         
      </div>
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary "><?php if(@$classType): ?> Update <?php else: ?> Save <?php endif; ?></button>

         </div>
         <?php echo Form::close(); ?>

       

  </div>
</div>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<?php $__env->stopPush(); ?>
 <?php $__env->startPush('scripts'); ?>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     <?php if(@$classType || $errors->first()): ?>
     $('#add_class').modal('show'); 
     <?php endif; ?>
 </script>
 <script type="text/javascript">
   $(document).ready(function () {
   
      $(document).on("click", '.whatsapp', function () {
   
         if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
   
           var sText = "Text to share";
   
           var sUrl = "Link to share";
   
           var sMsg = encodeURIComponent(sText) + " - " + encodeURIComponent(sUrl);
   
           var whatsapp_url = "whatsapp://send?text=" + sMsg;
   
           window.location.href = whatsapp_url;
   
        }
   
        else {
   
           alert("Whatsapp client not available.");
   
        }
   
     });
   
   });

 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>