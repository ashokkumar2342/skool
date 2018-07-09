<?php $__env->startSection('body'); ?>
<section class="content-header">
    <h1>Student Fee Group Wise </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="student_fee_detail_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Student Name</th>
                                <th>Registration No</th>
                                 
                                <th>Old Fee Group</th>                               
                                <th>New Fee Group</th>                                                            
                            </tr>
                        </thead>
                        <tbody id="searchResult">
                          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->registration_no); ?></td> 
                            <td>
                              <input type="" name="old_fee_group" value="" class="form-control">
                             
                            </td>
                            <td>
                              <select name="old_fee_group" class="form-control">
                                <?php $__currentLoopData = $feeGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value=""><?php echo e($feeGroup->name); ?></option> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 
                              </select>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            
                        </tbody>
                        
                    </table>
                   

                </div>
            </div>    

          
 
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('links'); ?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?> 
 <?php $__env->startPush('scripts'); ?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script> 
    $( ".datepicker").datepicker({dateFormat:'dd-mm-yy'}); 
    $("#class_id").change(function(){
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
  <script>
    $('#btn_student_fee_detail_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '<?php echo e(route('admin.studentFeeGroupDetail.search')); ?>',
           type: 'POST',       
           data: $('#form_student_fee_group_detail').serialize() ,
      })
      .done(function(response) {
       if(response.length>0){
           $('#searchResult').html(''); 
           for (var i = 0; i < response.length; i++) {
             $('#searchResult').append(response[i]);
             
           } 
       }
       else{
           $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
       }
        // if (response.class === 'error') {                 
        //      $.each(response.errors, function(index, val) {
        //          toastr[response.class](val) 
        //      }); 
        // }
        //   else {                 
        //     toastr[response.class](response.message)  
            
        // } 
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