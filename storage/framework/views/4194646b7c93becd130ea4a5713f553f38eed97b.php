<?php $__env->startPush('links'); ?>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
       <li><a href="<?php echo e(asset('sample.csv')); ?>"><i class="fa fa-download"></i> Download Sample</a></li>        
      </ol>
</section>
    <section class="content">        
        <?php echo e(Form::close()); ?>

      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        
                        <?php echo Form::open(array('route' => 'admin.student.excel.store','method'=>'POST','files'=>'true')); ?>                            
                             <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('class','Class',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('class',$classes, '', ['class'=>'form-control','placeholder'=>'Select Class','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('session')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('section','Section',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('session')); ?></p>
                                                </div>
                                            </div> 
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('excel_file','Excel File',['class'=>' control-label'])); ?>

                                                    <?php echo Form::file('excel_file', '', ['class'=>'form-control','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('excel_file')); ?></p>
                                                </div>
                                            </div>
                                            
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "<?php echo e(route('admin.manageSection.search')); ?>",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    });
    
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>