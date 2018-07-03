<?php $__env->startSection('body'); ?>
    <section class="content">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Class List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_class">Add Subject</button></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Subject id</th>                
                  <th>Subject Name</th>
                  <th>Subject Code</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(++$loop->index); ?></td>
                  <td><?php echo e($subject->name); ?></td>
                  <td><?php echo e($subject->code); ?></td>
                  <td >                    
                    <a class="btn btn-info btn-xs col-md-4 col-md-offset-2" href="<?php echo e(route('admin.subjectType.edit',$subject->id)); ?>"><i class="fa fa-pencil"></i></a>
                    <?php echo Form::open(['method' => 'delete', 'route' => ['admin.subjectType.delete', $subject->id]]); ?>

                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs col-md-4', 'onclick'=>"return confirm('Are you sure to delete this data ?')"]); ?>

                    <?php echo Form::close(); ?>

                    
            
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
     <div class="modal-content">
    <?php echo Form::open(['route'=>@($subjectType)?['admin.subjectType.update',$subjectType->id]:'admin.subjectType.add','class'=>"form-horizontal" ]); ?>

      <div class="modal-header">
        
          <a class="close" type="button" href="<?php echo e(route('admin.subjectType.list')); ?>"  >&times;</a>

        <h4 class="modal-title"><?php echo e(@($subjectType)? 'Subject Update' : 'Subject add'); ?></h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          <?php echo Form::label('SubjectName', 'Subjcet Name : ', ['class'=>"col-sm-3 control-label"]); ?>            
            <div class="col-sm-9">
            <?php echo Form::text('subjectName',@$subjectType->name, ['class'=>"form-control",'placeholder'=>"Subject Name",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('subjectName')); ?></p>
            </div>
          </div>
          <div class="form-group">
          <?php echo Form::label('Code', 'Code :', ['class'=>"col-sm-3 control-label"]); ?>

            <div class="col-sm-9">
            <?php echo Form::text('code', @$subjectType->code, ['class'=>"form-control",'placeholder'=>"Subject Code",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('code')); ?></p>
            </div>
          </div>   
         </div>
      </div>
     <div class="modal-footer">
            
            <a class="btn btn-default" href="<?php echo e(route('admin.subjectType.list')); ?>"  >Close</a>
            <button type="submit" class="btn btn-primary "><?php echo e(@($subjectType)? 'Update' : 'Save'); ?></button>

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
     <?php if(@$subjectType || $errors->first()): ?>
     $('#add_class').modal('show'); 
     <?php endif; ?>
     
 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>