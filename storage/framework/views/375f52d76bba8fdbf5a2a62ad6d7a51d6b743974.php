 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_document" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form action="<?php echo e(route('admin.document.add')); ?>" id="document-form" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                         <?php echo e(Form::label('document_type_id','Document Type',['class'=>' control-label'])); ?>

                         <?php echo Form::select('document_type_id',$documentTypes, null, ['class'=>'form-control','placeholder'=>'Select Document Type','required']); ?>

                         <p class="text-danger"><?php echo e($errors->first('parents')); ?></p>
                    </div>
                     <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                    <div class="form-group">
                        <?php echo e(Form::label('file','File/ ONLY PDF',['class'=>' control-label'])); ?>                         
                        <?php echo e(Form::file('file','',['class'=>'form-control',' required'])); ?>

                        <p class="text-danger"><?php echo e($errors->first('file')); ?></p>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="save">
                    
                </div>
             </form>  
            </div>
       </div>
    </div>
 <?php $__env->startPush('scripts'); ?>
  
 
  
<?php $__env->stopPush(); ?>