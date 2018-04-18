<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Homework  <small>List</small> </h1>
      <ol class="breadcrumb">
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
             
                 <div class="col-md-12">                                          
                   <div class="col-lg-2">                         
                      <div class="form-group">
                          <?php echo Form::select('class',$classes, '', ['class'=>'form-control', 'id'=>'class' ,'placeholder'=>'Select Class','required']); ?>

                          <p class="text-danger"><?php echo e($errors->first('session')); ?></p>
                      </div>
                       <div class="form-group">
                          <?php echo Form::select('section',[], null, ['class'=>'form-control','id'=>'section','placeholder'=>'Select Section','required']); ?>

                          <p class="text-danger"><?php echo e($errors->first('session')); ?></p>
                        </div>
                    </div>                     
                    <div class="col-lg-10">                         
                        <div class="form-group">
                          <?php echo e(Form::textarea('homework','',['class'=>'form-control','id'=>'homework','rows'=>4, 'placeholder'=>'Enter Homework'])); ?>

                          <p class="text-danger"><?php echo e($errors->first('homework')); ?></p>
                        </div>
                    </div>
                </div>  
            <div class="row">
                 <div class="col-md-12 text-center">
                     <button class="btn btn-success" type="submit" id="btn_homework">Create Homework</button>
                 </div>
             </div>                     
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">             
              <!-- /.box-header -->
              <div class="box-body">
                <table id="homework_table" class="display table">                     
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Time</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Homework</th>
                            <th>Action</th>                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $homeworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($homework->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($homework->classes->name); ?></td>
                                <td><?php echo e($homework->sectionTypes->name); ?></td>
                                <td><?php echo e($homework->homework); ?></td>
                                <td>
                                    <button type="button" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo e($homework->id); ?>" data-target="#image_parent"><i class="fa fa-eye"></i> </button>

                                    <button type="button" class="homework_edit btn btn-warning btn-xs" data-toggle="modal" data-id="<?php echo e($homework->id); ?>" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                                    <button class="btn_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="<?php echo e($homework->id); ?>"  ><i class="fa fa-trash"></i></button>
                                </td>
                            
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                         <?php echo e($homeworks->links()); ?> 

                </table>
              </div>
            </div>    

          <!-- Trigger the modal with a button --> 
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script type="text/javascript"> 
    // $(document).ready( function () {
    //     $('#homework_table').DataTable();
       
    // } )
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
    $('#btn_homework').on('click',function(event) {
        $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
            url: '<?php echo e(route('admin.homework.post')); ?>',
            type: 'POST',       
            data: {class:$('#class').val(),section:$('#section').val(),homework:$('#homework').val()},
        })
        .done(function(data) {
            if (data.class === 'error') {                 
                 $.each(data.errors, function(index, val) {
                     toastr[data.class](val) 
                 });                 
            }
              else {                 
                toastr[data.class](data.message)  
                $("#homework").val('');
                $("#class").val('');
                $("#section").val('');
                $("#homework_table").load(location.href + ' #homework_table'); 
            } 
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
         
    });

    $('#homework_table').on('click', '.btn_delete', function(event) {
        event.preventDefault();  
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });      
        $.ajax({
            url: '<?php echo e(route('admin.homework.delete')); ?>',
            type: 'delete',
            data: {id: id},
        })
        .done(function(data) {
            toastr[data.class](data.message)  
             
            $("#homework_table").load(location.href + ' #homework_table'); 
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