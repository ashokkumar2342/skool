<?php $__env->startPush('links'); ?>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <style type="text/css" media="screen">
       #bloodgroup{
        display:none;
       }
        #category{
        display:none;
       } 
        #religion{
        display:none;
       }
         #gender{
        display:none;
       }
        #class{
        display:none;
       }
        #section{
        display:none;
       }
   </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1> Student Report</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        <?php echo e(Form::close()); ?>

      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        
                        
                        <form action="<?php echo e(route('admin.student.report.post')); ?>" method="get" accept-charset="utf-8" id="report_form">
                        <div class="col-md-12">  
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('report_for','Report For',['class'=>' control-label'])); ?>

                                    <?php echo Form::select('report_for',[                                               
                                                        1=>'Blood Group',
                                                        2=>'Category',
                                                        3=>'Religion',
                                                        4=>'Gender',
                                                        5=>'City',
                                                        6=>'State',
                                        ], null, ['class'=>'form-control','placeholder'=>'Select','required']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('report_for')); ?></p>
                                </div>
                                 
                            </div>
                            <div class="col-lg-3" id="blood">                         
                                <div class="form-group">  
                                  <?php echo e(Form::label('bloodgroup','BloodGroup',['class'=>' control-label'])); ?>

                                <select name="bloodgroup" id="bloodgroup" class="form-control">
                                        <option value="">Select</option>                                    
                                    <?php $__currentLoopData = App\model\BloodGroup::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bloodgroup->id); ?>"><?php echo e($bloodgroup->name); ?></option>                                  
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select> 
                                </div>
                            </div>
                            <div class="col-lg-3" id="cate" style="display:none">                                                   
                                <div class="form-group">
                                    <?php echo e(Form::label('category','Category',['class'=>' control-label'])); ?>

                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select</option>
                                      <?php $__currentLoopData = App\model\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>                                  
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>                                    
                                </div>
                            </div> 
                             <div class="col-lg-3" id="rel" style="display:none">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('religion','Religion',['class'=>' control-label'])); ?>

                                    <select name="religion" id="religion" class="form-control">
                                     <?php echo e(Form::label('religion','Religion',['class'=>' control-label'])); ?>

                                     <?php $__currentLoopData = App\model\Religion::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                           <option value="<?php echo e($religion->id); ?>"><?php echo e($religion->name); ?></option>                                  
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                 </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="gen" style="display:none">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('gender','Gender',['class'=>' control-label'])); ?>

                                    <select name="gender" id="gender" class="form-control">
                                     <?php echo e(Form::label('gender','gender',['class'=>' control-label'])); ?>

                                     <?php $__currentLoopData = App\model\Gender::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                           <option value="<?php echo e($gender->id); ?>"><?php echo e($gender->genders); ?></option>                                  
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select> 
                                 </div>
                             </div>
                        
                            <div class="col-lg-3" id="school_class1">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('school_class','All Student/Class',['class'=>' control-label'])); ?>

                                    <?php echo Form::select('school_class',[                                               
                                                        1=>'All Student',
                                                        2=>'Class',
                                                        
                                        ], null, ['class'=>'form-control','required']); ?>

                                    <p class="text-danger"><?php echo e($errors->first('school_class')); ?></p>
                                </div>
                            </div>                             
                             <div class="col-lg-3" id="cl" style="display:none">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('class','Class',['class'=>' control-label'])); ?>

                                      <select name="class" id="class" class="form-control">
                                            <option value="">Select</option>                                 

                                      <?php $__currentLoopData = App\model\ClassType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>                                  
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>                              
                                </div>
                            </div>
                            <div class="col-lg-3" id="se" style="display:none">                         
                                <div class="form-group">
                                    <?php echo e(Form::label('section','Section',['class'=>' control-label'])); ?>

                                      <select name="section" id="section" class="form-control"> 
                                    </select>
                                   
                                </div>
                            </div>
                             <div class="col-lg-3" style="padding-top: 20px;">                         
                                <div class="form-group">
                                  <button class="btn btn-success" type="submit">Show</button>
                                    
                                </div>
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
    $(document).ready(function() {
       $("#blood").hide();
       $("#cate").hide();
        $("#cl").hide();        
        $("#se").hide(); 
    });
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
    
    $( "#report_for" ).change(function() { 
        var report = $("#report_for").val();                
         
        switch (report) {
            case '1':
            console.log('1'); 
                $("#blood").show(); 
                $("#cate").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#bloodgroup").show();              
                $("#category").hide();  
                break;
            case '2': 
            console.log('2'); 
                 $("#cate").show(); 
                 $("#blood").hide();
                $("#bloodgroup").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#category").show(); 
                break;
            case '3':
               $("#cate").hide(); 
                $("#blood").hide();
                $("#bloodgroup").hide();  
                $("#category").show(); 
                $("#rel").show(); 
                $("#gen").hide();
                $("#religion").show(); 
                $("#gender").hide(); 

                 
                break;
            case '4':
                $("#cate").hide(); 
                 $("#blood").hide();
                 $("#bloodgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").show();
                 $("#religion").hide(); 
                 $("#gender").show();
                break;
            case '5':
                day = "Thursday";
                break;
            case '6':
                day = "Friday";
                break;
            case '7':
                day = "Saturday";
        }    
       // if($("#report_for").val() == 1){
       //   $("#blood").show(); 
       //   $("#cate").remove();
       // }
       // else if($("#report_for").val() == 2){
       //  $("#blood").remove();
       //  $("#cate").show(); 
       // }
         
    });
    $( "#report_form" ).on( "click", "#school_class", function() { 
       if($("#school_class").val() == 1){                  
        $("#cl").hide('slow');        
        $("#se").hide('slow');
        $("#class").hide('slow');        
        $("#section").hide('slow');
       }
       else if($("#school_class").val() == 2){   

        $("#cl").show('slow');        
        $("#se").show('slow');
         $("#class").show('slow');        
        $("#section").show('slow');  
       }
       else{ 
       } 
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>