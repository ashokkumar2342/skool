<?php $__env->startPush('links'); ?>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo e(route('admin.defaultValue.list')); ?>" class="btn btn-success"> Add Default Value</a></li>        
      </ol>
</section>
    <section class="content">        
        <?php echo e(Form::close()); ?>

      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        <?php echo e(Form::open(['route'=>'admin.student.post'])); ?>                            
                             <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('class','Class',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('class',$classes, $default->class_id, ['class'=>'form-control','placeholder'=>'Select Class','required']); ?>

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
                                                    <?php echo e(Form::label('registration_no','Registration no',['class'=>' control-label '])); ?>                         
                                                    <?php echo e(Form::text('registration_no','',['class'=>'form-control',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('registration_no')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('admission_no','Admission No',['class'=>' control-label'])); ?>

                                                    <?php echo e(Form::text('admission_no','',['class'=>'form-control',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('admission_no')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('roll_no','Roll No',['class'=>' control-label'])); ?>

                                                    <?php echo e(Form::text('roll_no','',['class'=>'form-control',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('roll_no')); ?></p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('date_of_admission','Date of Admission',['class'=>' control-label'])); ?>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    <?php echo e(Form::text('date_of_admission','',array('class' => 'form-control datepicker',' required' ))); ?>

                                                    </div>
                                                    <p class="text-danger"><?php echo e($errors->first('date_of_admission')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('date_of_leaving','Date of Leaving',['class'=>' control-label'])); ?>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    <?php echo e(Form::text('date_of_leaving','',array('class' => 'form-control datepicker' ))); ?>

                                                    </div>
                                                    <p class="text-danger"><?php echo e($errors->first('date_of_leaving')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('date_of_activation','Date of Activation',['class'=>' control-label'])); ?>   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    <?php echo e(Form::text('date_of_activation','',array('class' => 'form-control datepicker',' required' ))); ?>

                                                    </div>
                                                    <p class="text-danger"><?php echo e($errors->first('date_of_activation')); ?></p>
                                                </div>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                             </div> 
                             <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('student_name','Student Name',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('student_name','',['class'=>'form-control',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('student_name')); ?></p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('nick_name','Nick Name',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('nick_name','',['class'=>'form-control'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('nick_name')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('father_name','Father Name',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('father_name','',['class'=>'form-control',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('father_name')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('mother_name','Mother Name',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('mother_name','',['class'=>'form-control ',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('mother_name')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('father_mobile','Father Mobile Number',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('father_mobile','',['class'=>'form-control ',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('father_mobile')); ?></p>
                                                     
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('mother_mobile','Mother Mobile Number',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('mother_mobile','',['class'=>'form-control ',' required'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('mother_mobile')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('email','Email Id',['class'=>' control-label'])); ?>

                                                    <?php echo e(Form::text('email','',['class'=>'form-control'])); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('date_of_birth','Date of Birth',['class'=>' control-label'])); ?>      
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                   
                                                        <?php echo e(Form::text('date_of_birth','',['class'=>'form-control datepicker','required'])); ?>

                                                    </div>
                                                   
                                                    <p class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></p>
                                                </div>
                                            </div> 
                                              <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('gender','Gender',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('gender',$genders, $default->genders->id, ['class'=>'form-control','placeholder'=>'Select Gender','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('gender')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('religion','Religion',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('religion',$religions, $default->religions->id, ['class'=>'form-control','placeholder'=>'Select Religion','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('religion')); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('category','Category',['class'=>' control-label'])); ?>

                                                    <?php echo Form::select('category',$categories,$default->categories->id, ['class'=>'form-control','placeholder'=>'Select Religion','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('category')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('state','State',['class'=>' control-label'])); ?>

                                                    <?php echo Form::text('state', $default->state, ['class'=>'form-control','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('state')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            
                             <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('city','City',['class'=>' control-label'])); ?>

                                                    <?php echo Form::text('city',$default->city, ['class'=>'form-control','required']); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('city')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('p_address','Permanent Address',['class'=>'control-label'])); ?>

                                                     <?php echo e(Form::textarea('p_address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none'])); ?>

                                                     <p class="text-danger"><?php echo e($errors->first('p_address')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('c_address',' Correspondence Address',['class'=>'control-label'])); ?>

                                                     <?php echo e(Form::textarea('c_address','',['class'=>'form-control', 'rows'=>2 ,'style'=>'resize:none'])); ?>

                                                     <p class="text-danger"><?php echo e($errors->first('c_address')); ?></p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    <?php echo e(Form::label('pincode','Pincode',['class'=>' control-label'])); ?>                         
                                                    <?php echo e(Form::text('pincode',$default->pincode,array('class' => 'form-control' ))); ?>

                                                    <p class="text-danger"><?php echo e($errors->first('pincode')); ?></p>
                                                </div>
                                            </div>  
                                            
                                        </div>
                                    </div>
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

    $("#class").change(function(){
        sectionSearch($(this).val());
    });     
    
    if ($("#class").val() > 0) {
        sectionSearch($("#class").val(),<?php echo e($default->section_id); ?>); 
    }
    
     
    function sectionSearch (value,selectVal=null){
        var selected = null;
        $('#section').html('<option value="">Searching ...</option>'); 
      
        $.ajax({
          method: "get",
          url: "<?php echo e(route('admin.manageSection.search2')); ?>",
          data: { id: value }
        })
        .done(function(response ) {            
             if(response.section.length>0){
                $('#section').html('<option value="">Select section</option>');
               for (var i = 0; i < response.section.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response.section[i].id)?'selected':''; 
                    }
                    $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
                }
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            } 
                   
        });
    }
    
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>