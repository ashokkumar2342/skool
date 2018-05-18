<?php $__env->startSection('body'); ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Manage Section</button></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th> id</th>                
                  <th>class Name</th>                   
                  <th>Section Name</th>                   
                  
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $manageSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manageSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($manageSection->id); ?></td>
                  <td><?php echo e($manageSection->classes->name); ?></td>                 
                  <td><?php echo e($manageSection->sectionTypes->name); ?></td>                 
                  
                    
                                   
                  
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
        <div class="col-md-12">             
            <div class="form-group">
                <?php echo e(Form::label('class','Class',['class'=>' control-label'])); ?>                         
                <?php echo Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'---choose Class---','required']); ?>

                <p class="text-danger"><?php echo e($errors->first('class')); ?></p>
            </div> 
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><input  class="checked_all" type="checkbox"> All</td>
                            <th>S.N</th>
                            <th>Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ($i=1); ?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox" name="section_id[]" value="<?php echo e($section->id); ?>"></td>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($section->name); ?></td>
                        </tr>
                        <?php ($i++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              
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
 <script type="text/javascript">
        $('.checked_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('.checked_all').prop('checked',true);
            }else{
                   $('.checked_all').prop('checked',false);
            }
        });       
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>