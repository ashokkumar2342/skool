<?php $__env->startSection('body'); ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Add Section</button></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Section id</th>                
                  <th>Section Name</th>                   
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($section->id); ?></td>
                  <td><?php echo e($section->name); ?></td>                 
                  <td align="center">                    
                    <a class="btn btn-info btn-xs" href="<?php echo e(route('admin.section.edit',$section->id)); ?>"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="<?php echo e(route('admin.section.delete',$section->id)); ?>"><i class="fa fa-trash"></i></a>                     
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
<div id="add_section" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <?php echo Form::open(['route'=>@($sectionType)?['admin.section.update',$sectionType->id]:'admin.section.add','class'=>"form-horizontal" ]); ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php if(@$sectionType): ?> Update <?php else: ?> Add <?php endif; ?> Section</h4>
      </div>
      <div class="modal-body">
         <div class="col">             
          <div class="form-group">
          <?php echo Form::label('sectionName', 'Section Name : ', ['class'=>"col-sm-3 control-label"]); ?>            
            <div class="col-sm-9">
            <?php echo Form::text('sectionName', @$sectionType->name, ['class'=>"form-control",'placeholder'=>"Section Name",'autocomplete'=>'off']); ?>

            <p class="text-danger"><?php echo e($errors->first('sectionName')); ?></p>
            </div>
          </div>
           
          </div>   
 
     <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary "><?php if(@$sectionType): ?> Update <?php else: ?> Save <?php endif; ?></button>

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
     <?php if(@$sectionType || $errors->first()): ?>
     $('#add_section').modal('show'); 
     <?php endif; ?>
 </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>